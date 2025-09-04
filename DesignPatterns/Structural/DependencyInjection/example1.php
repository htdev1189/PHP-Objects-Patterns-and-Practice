<?php
/** 
 * ví dụ không dùng dependancy injection 
 * 
*/

declare(strict_types=1);
namespace DesignPatterns\Structural\DependencyInjection;

class MySQLDatabase{
    public function connect(){
        return "connected to MySQL";
    }
}
class MongoDatabase{
    public function connect(){
        return "connected to MongoDB";
    }
}

class UserRepository{

    private $database;

    public function __construct()
    {
        // tự tạo dependency bên trong
        // $this->database = new MySQLDatabase();

        // phải thay đổi chỗ này nếu thay kết nối
        $this->database = new MongoDatabase();
    }

    public function getUser($id){
        return $this->database->connect() . " - Getting user with ID : {$id}";
    }

}

// client code
$repository = new UserRepository();
echo $repository->getUser(10);

// vấn đề xảy ra khi không dùng mysql nữa mà dùng 1 kiểu kết nối khác
// thì mình phải chỉnh lại class user repository 
// điều này vi phạm SOLID về nguyên tắc đóng đối với thay đổi, mở đổi với mở rộng
// qua ví dụ 2