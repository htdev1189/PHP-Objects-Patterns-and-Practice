<?php
declare(strict_types=1);
namespace Solid\LSP;

interface Shape{
    public function area();
}
class Rectangle implements Shape{

    public function __construct(private float $w, private float $h)
    {
        
    }

    public function area(){
        return $this->w * $this->h . "\n";
    }
}

class Square implements Shape{
    public function __construct(private float $side)
    {
        
    }
    public function area(){
        return $this->side * $this->side . "\n";
    }
}

// Composition
class ShapeComposition {
    public function __construct(private Shape $shape)
    {
        
    }
    public function calcArea(){
        return $this->shape->area();
    }
}

// luc chưa sử dụng interface
// $rect = new Rectangle(10,20);
// echo $rect->area();
// $square = new Square(10);
// echo $square->area();

$rect = new ShapeComposition(new Rectangle(10,20));
echo $rect->calcArea();

$square = new ShapeComposition(new Square(20));
echo $square->calcArea();