<?php
namespace BuilderPattern\yes;


// 1 : Product -- đối tượng cần builder
class User
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $address;
    private $age;

    public function __construct($id, $name, $email, $phone, $address, $age) {
        $this->id      = $id;
        $this->name    = $name;
        $this->email   = $email;
        $this->phone   = $phone;
        $this->address = $address;
        $this->age     = $age;
    }

    public function showInfo() {
        return "User: {$this->name}, Email: {$this->email}, Phone: {$this->phone}"."<br>";
    }
    
}


// 2: Builder -- xây dựng interface/abstract định nghĩa các bước builder
class UserBuilder{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $address;
    private $age;

    // setter các propeties, sau đó trả về chính instance đó
    public function setId($id) { $this->id = $id; return $this; }
    public function setName($name) { $this->name = $name; return $this; }
    public function setEmail($email) { $this->email = $email; return $this; }
    public function setPhone($phone) { $this->phone = $phone; return $this; }
    public function setAddress($address) { $this->address = $address; return $this; }
    public function setAge($age) { $this->age = $age; return $this; }

    // trả về instance cuối cùng
    public function build(){
        return new User($this->id,$this->name,$this->email,$this->phone,$this->address,$this->age);
    }
}
