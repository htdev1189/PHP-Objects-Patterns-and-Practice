<?php
declare(strict_types=1);
namespace Solid\SRP;

class Product
{
    public function __construct(private int $id, private string $name, private string $color, private int $price) {}
    public function getName()
    {
        return $this->name;
    }
    public function getColor(){
        return $this->color;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function __toString()
    {
        return "============ INFO ==============" . "</br>"
            . " Id => {$this->id} " . "</br>"
            . " Name => {$this->name} " . "</br>"
            . " Color => {$this->color} " . "</br>"
            . " Price => {$this->price} " . "</br>"
            . " ============ END ==============" . "</br>";
    }
}