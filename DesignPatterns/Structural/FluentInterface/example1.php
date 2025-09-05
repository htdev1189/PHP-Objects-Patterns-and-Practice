<?php 
/**
 * không dùng fluent Interface
 * cần rất nhiều dòng code ở client
 */
declare(strict_types=1);
namespace DesignPatterns\Structural\FluentInterface;

class User{
    private $name;
    private $age;
    private $email;

    // setter
    public function setName(string $name){
        $this->name = $name;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function setAge(int $age){
        $this->age = $age;
    }

    // print
    public function __toString()
    {
        return "Name: {$this->name}, Email: {$this->email}, Age: {$this->age}";
    }
}

// client code
$user = new User();
$user->setName("name");
$user->setEmail("admin@localhost");
$user->setAge(30);
echo $user; // toString :)