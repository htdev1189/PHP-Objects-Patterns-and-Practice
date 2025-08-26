<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\Prototype;

require_once __DIR__ . "/Department.php";
use DesignPatterns\Creational\Prototype\Department;

class Employee{
    public $name;
    public $age;
    public $salary;
    public $department;

    public function __construct(string $name,int $age,float $salary,Department $department)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->department = $department;
    }

    public function __clone()
    {
        // Clone phòng ban để tránh chia sẻ tham chiếu
        $this->department = clone $this->department;
    }

    public function __toString()
    {
        return "----------- EMPLOYEE --------------</br>"
        . " Name : $this->name</br>"
        . " Age : $this->age</br>"
        . " Salary : $this->salary</br>" 
        . " Department</br>" 
        . "      Name : {$this->department->name}</br>" 
        . "      Location : {$this->department->location}</br>" 
        . " Salary : $this->salary</br>" 
        . "----------- INFO --------------</br>"; 
    }
}