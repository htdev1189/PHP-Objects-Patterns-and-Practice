<?php 
namespace ReflectionTest;
class Person{
    private $pass = "123";
    private $name;
    private $age;
    public function __construct($name) {
        $this->name = $name;
    }
    public function sayHello(){
        return "Hello $this->name";
    }
    public function setAge(int $age){
        $this->age = $age;
    }
    public function __get($name)
    {
        // check property exists
            if (property_exists($this, $name)) {
                return $this->$name;
            }
            return "Property not found in class";
    }
}