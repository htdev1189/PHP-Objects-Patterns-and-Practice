<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\Prototype;
class Department {
    public $name;
    public $location;

    public function __construct($name, $location)
    {
        $this->name = $name;
        $this->location = $location;
    }
}