<?php 
declare(strict_types=1);
namespace DesignPatterns\Structural\Proxy;
/**
 * Ví dụ về chức năng tải và hiển thị hình ảnh từ ổ cứng
 */

class RealImage{
    private string $filename;

    private function loadFromDisk(){
        echo "Loading image from Disk: {$this->filename} <br>";
    }
    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->loadFromDisk();
    }
    public function display(){
        echo "Displaying: {$this->filename} <br>";
    }
}

/**
 * truong hop khong dung proxy
 * Mỗi khi tạo object RealImage thì hình ảnh luôn luôn được load từ disk, 
 * tốn thời gian/tài nguyên ngay cả khi không sử dụng.
 */
// client code
// $image1 = new RealImage("photo1.jpg");
// $image1->display();

// $image2 = new RealImage("photo2.jpg");
// $image2->display();

/**
 * truong hop dung proxy
 */
class ProxyImage{
    private string $filename;
    private ?RealImage $realImage = null;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function display(){
        // chỉ khi nào gọi display thì nó mới load image từ disk
        if($this->realImage == null){
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}

// client code

$image1 = new ProxyImage("photo1.jpg"); // lúc này chưa load
$image2 = new ProxyImage("photo2.jpg"); // lúc này chưa load
$image1->display();


