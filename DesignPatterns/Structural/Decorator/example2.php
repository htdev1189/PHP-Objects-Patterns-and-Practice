<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\Decorator;

interface CoffeeInterface
{
    public function getCost();
    public function getDescription();
}

class SimpleCoffee implements CoffeeInterface
{
    public function getCost()
    {
        return 50;
    }

    public function getDescription()
    {
        return "Cà phê đen";
    }
}

class CoffeeDecorator implements CoffeeInterface
{
    protected $coffee;

    public function __construct(CoffeeInterface $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost()
    {
        return $this->coffee->getCost();
    }

    public function getDescription()
    {
        return $this->coffee->getDescription();
    }
}

class MilkDecorator extends CoffeeDecorator
{
    public function getCost()
    {
        return parent::getCost() + 20;
    }

    public function getDescription()
    {
        return parent::getDescription() . ", thêm sữa";
    }
}

class SugarDecorator extends CoffeeDecorator
{
    public function getCost()
    {
        return parent::getCost() + 10;
    }

    public function getDescription()
    {
        return parent::getDescription() . ", thêm đường";
    }
}

// tính giá bán theo size
class SizeDecorator extends CoffeeDecorator{
    private $size; // small. medium, large

    public function __construct(CoffeeInterface $coffee, string $size) {
        parent::__construct($coffee);
        $this->size = $size;
    }

    public function getCost()
    {
        // cost default
        $costDefault = parent::getCost(); 
        return match ($this->size) {
            "small" => $costDefault,
            "medium" => $costDefault + 10,
            "large" => $costDefault + 20,
            default => $costDefault
        };
    }

    public function getDescription()
    {
        return parent::getDescription() . ", size " . $this->size;
    }
}

// client code
function makeCoffee($option = [])
{
    $coffee = new SimpleCoffee();

    // check size
    if (isset($option['size'])) {
        $coffee = new SizeDecorator($coffee,$option['size']);
    }

    if (!empty($option['toppings'])) {
        foreach ($option['toppings'] as $topping) {
            $coffee = match ($topping) {
                "milk" => new MilkDecorator($coffee),
                "sugar" => new SugarDecorator($coffee),
                default => $coffee 
            };
        }
    }
    return $coffee;
}

// Sử dụng
// $coffee1 = makeCoffee();
// echo $coffee1->getDescription() . " giá " . $coffee1->getCost() . "<br>"; // Cà phê đen

// $coffee2 = makeCoffee(['milk']);
// echo $coffee2->getDescription() . " giá " . $coffee2->getCost() . "<br>"; // Cà phê đen, thêm sữa
// $coffee3 = makeCoffee(['milk', 'sugar']);
// echo $coffee3->getDescription() . " giá " . $coffee3->getCost() . "<br>"; // Cà phê đen, thêm sữa


$orders = [
    'Khách A' => ['size' => 'large', 'toppings' => ['milk', 'sugar']],
    'Khách B' => ['size' => 'medium', 'toppings' => ['ice']], // ice này chưa viết
    'Khách C' => ['size' => 'small', 'toppings' => []],
    'Khách D' => ['size' => 'large', 'toppings' => ['milk']],
];
foreach ($orders as $customer => $config) {
    $coffee = makeCoffee($config);
    echo "{$customer} : {$coffee->getDescription()}, price : {$coffee->getCost()}$" . "</br>";
}