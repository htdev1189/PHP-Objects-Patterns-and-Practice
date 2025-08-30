<?php 
declare(strict_types=1);// khong tu dong chuyen doi kieu
namespace DesignPatterns\Structural\Decorator;

/**
 * Trường hợp không sủ dụng decorator
 */

// giả sử có 1 lớp cà phê 
class Coffee{
    public function getCost(){
        return 50;
    }
    public function getDescription(){
        return "Cafe đen"; // không có gì cả
    }
}

// thiết lập 1 lớp cafe sữa
class MilkCoffee extends Coffee{
    public function getCost()
    {
        return parent::getCost() + 15;
    }
    public function getDescription()
    {
        return parent::getDescription() . " (thêm sữa)";
    }
}

// thiết lập 1 lớp cafe
class SugarCoffee extends Coffee{
    public function getCost()
    {
        return parent::getCost() + 10;
    }
    public function getDescription()
    {
        return parent::getDescription() . " (thêm đường)";
    }
}

// client code
$milkCoffee = new MilkCoffee();
echo " {$milkCoffee->getDescription()} " . " giá " . " {$milkCoffee->getCost()} " . "<br>";
$sugarCoffee = new SugarCoffee();
echo " {$sugarCoffee->getDescription()} " . " giá " . " {$sugarCoffee->getCost()} " . "<br>";

/**
 * Vấn đề xảy ra là khi muốn thêm 1 biến thể như đường, kem thì phải thêm 1 lớp coffee đường hoặc kem
 * điều này làm bùng nổ class kế thừa
 * ví dụ như khách hàng muốn gọi 1 cafe có cả đường cả sữa thì sao ??
 * lúc này sẽ cần đến decorator để tiêm phụ thuộc vào
 */
