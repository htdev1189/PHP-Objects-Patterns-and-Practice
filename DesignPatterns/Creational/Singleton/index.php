<?php
class Singleton {
    // Biến static lưu instance duy nhất
    private static $instance;

    // Constructor private để ngăn tạo instance từ bên ngoài
    private function __construct() {
        echo "Khởi tạo Singleton\n";
    }

    // Ngăn clone đối tượng
    private function __clone() {}

    // Phương thức truy cập instance duy nhất
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function sayHello() {
        echo "Xin chào từ Singleton!\n";
    }
}

// Sử dụng Singleton
$obj1 = Singleton::getInstance();
$obj2 = Singleton::getInstance();

$obj1->sayHello();

// Kiểm tra xem có phải cùng một instance không
var_dump($obj1 === $obj2); // bool(true)
?>
