<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\Bridge;

// interface dùng chung cho việc vẽ
interface DrawingShape{
    public function draw($shape);
}

// trien khai interface
class Printer implements DrawingShape{
    public function draw($shape)
    {
        echo "drawing {$shape} with printer<br>";
    }
}
class Scrren implements DrawingShape{
    public function draw($shape)
    {
        echo "drawing {$shape} with screen<br>";
    }
}

// tach rieng phan truu tuong
abstract class Shape{
    protected $devide;
    public function __construct($devide) {
        $this->devide = $devide;
    }

    // abstruct method // ko viet than ham
    abstract public function draw();
}

class Circle extends Shape{
    public function draw()
    {
        $this->devide->draw("Cirlce");
    }
}

class Rectangle extends Shape{
    public function draw()
    {
        $this->devide->draw("Rectangle");
    }
}

// client code
$circleOnPrinter = new Circle(new Printer());
$circleOnScreen = new Circle(new Scrren());
$circleOnPrinter->draw();
$circleOnScreen->draw();

$rectangleOnPrinter = new Rectangle(new Printer());
$rectangleOnPrinter->draw();


/**
 * Việc thêm thiết bị hoặc hình dạng mà không cần chỉnh sửa những class đã có, tuân theo nguyên tắc đóng mở 
 * $rectangleOnPrinter = new Rectangle(new Printer());
 * $rectangleOnPrinter->draw();
 * Tách phần trừu tượng (shape) và phần thực thi (draw) ra giúp code nhìn rõ ràng hơn
 */