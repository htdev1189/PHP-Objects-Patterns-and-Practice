<?php
namespace BuilderPattern\no;
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
