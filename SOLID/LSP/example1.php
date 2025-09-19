<?php
declare(strict_types=1);
namespace Solid\LSP;

class Rectangle {
    protected float $width;
    protected float $height;
    public function setWidth(float $width){
        $this->width = $width;
    }
    public function setHeight(float $height){
        $this->height = $height;
    }
    public function area(){
        return $this->width * $this->height;
    }
}

class Square extends Rectangle{
    public function setWidth(float $width)
    {
        $this->width = $width;
        $this->height = $width;
    }
    public function setHeight(float $height)
    {
        $this->width = $height;
        $this->height = $height;
    }
}

// client code
function test(Rectangle $rectangle){
    $rectangle->setWidth(10);
    $rectangle->setHeight(20);
    $type = $rectangle instanceof Square ? "Square" : "Rectangle";
    echo " ================= " . $type . " ======================== \n"
       . " ======== Kỳ Vọng ============== Thực Tế ============ \n"
       . " ========  200    ============== " . $rectangle->area() . " ============ \n";
}

$rect = new Rectangle();
test($rect);

$square = new Square();
test($square);

/*

 Thay đổi distance vào làm thay đổi giá trị -- vi phạm LSP
 ================= Rectangle ==================== 
 ======== Kỳ Vọng ============== Thực Tế ======== 
 ========  200    ============== 200 ============ 
 ================================================    
 ================= Square ======================= 
 ======== Kỳ Vọng ============== Thực Tế ======== 
 ========  200    ============== 400 ============  


*/

