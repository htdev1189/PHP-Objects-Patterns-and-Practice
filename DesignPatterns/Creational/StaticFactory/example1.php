<?php

namespace DesignPatterns\Creational\StaticFactory;

class User
{
    private $name;
    private $age;

    // Ngăn khởi tạo trực tiếp từ bên ngoài -- bên ngoài không thể new 
    private function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    // static factory mothod
    public static function createFromArray($arr)
    {
        return new User($arr['name'], $arr['age']);
    }
    public static function createDefault()
    {
        return new User("anonymous", 0);
    }

    public function __toString()
    {
        return "{$this->name} -- {$this->age}";
    }
}

// client code
$user1 = User::createDefault();
$user2 = User::createFromArray(
    array(
        "name" => "Hoang Tuan",
        "age" => 35
    )
);

echo $user1 . "<br>";
echo $user2 . "<br>";
