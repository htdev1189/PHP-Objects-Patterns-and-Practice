<?php
namespace DesignPatterns\Creational\Pool;

class ObjectPool{

    // khởi tạo 1 mảng để lưu trữ instance <một biến được tạo từ NEW>
    private $instance = [];

    // thêm object vào instance
    public function add($object, $key){
        $this->instance[$key] = $object;
    }

    // get object
    public function get($key){
        return $this->instance[$key];
    }

    // nâng câp get khi không tồn tại
    // du dung ham an danh
    // khi gọi hàm phải thêm 1 hàm ẩn danh vào tham số thứ 2
    public function getOrCreate($key, callable $creator){
        if(!isset($this->instance[$key])){
            $this->instance[$key] = $creator(); // ban đấu thiều ()
        }
        return $this->instance[$key];
    }
}

// doi tuong co the tai su dung
class ReusableObject{
    public function doSomeThing(){
        echo "hello <br>";
    }
}

// client code
$pool = new ObjectPool();
$reusableObj = new ReusableObject();

// add to pool
$pool->add($reusableObj, "reusable_key");

// get
$result = $pool->get("reusable_key");
$result->doSomeThing();

// test hàm ẩn danh

$result2 = $pool->getOrCreate("new_key", function(){
    return new ReusableObject();
});
$result2->doSomeThing();

$result3 = $pool->get("new_key");
var_dump($result3 === $result2); // true vì nó đã được lưu trữ