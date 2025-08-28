<?php 
declare(strict_types=1);
namespace DesignPatterns\Structural\Bridge1;
/**
 * Truong hop khong dùng pattern
 */
class Circle{
    public function drawWithPrinter(){
        echo "drawing circle with printer<br>";
    }
    public function drawWithScreen(){
        echo "drawing circle on screen<br>";
    }
}

// run test
$circle = new Circle();
$circle->drawWithPrinter();
$circle->drawWithScreen();

/**
 * Vấn đề xảy ra khi người dùng muốn vẽ thêm 1 hình trên 1 thiết bị mới
 * lúc này mình sẽ phải chỉnh sửa lại các class như Circle để hàm vẽ trên thiết bị mới
 * hoặc phải thêm class để miêu tả hình dạng mới
 */