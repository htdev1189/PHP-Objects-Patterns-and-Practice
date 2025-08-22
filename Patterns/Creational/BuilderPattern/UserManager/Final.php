<?php

/**
 * Xây dựng builder pattern với đầy đủ cấu trúc
 */
namespace BuilderPattern\full;

// Phần Product <lớp được hướng tới>
class Employe{
    private $id;
    private $name;
    private $email;
    private $department;
    private $salary;

    // setter
    public function setID($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setDepartment($department){
        $this->department = $department;
    }
    public function setSalary($salary){
        $this->salary = $salary;
    }

    public function showInfo(){
        return "user with id : $this->id, name : $this->name, email : $this->email, department : $this->department, salary : $this->salary" . "</br>" ;
    }
}

// Phần Builder (interface)

interface EmployeBuilder{
    public function buildInfo($info);
    public function buildDepartment();
    public function buildSalary($salary);
}

// phần Concrete Builder <xây dựng các phần nhỏ bằng các class inplement interface>
class CodeBuilder implements EmployeBuilder{
    private $employe;
    public function __construct()
    {
        $this->employe = new Employe();
    }

    public function buildInfo($info){
        $this->employe->setID($info['id']);
        $this->employe->setName($info['name']);
        $this->employe->setEmail($info['email']);
    }
    public function buildDepartment(){
        $this->employe->setDepartment("Coder");
    }
    public function buildSalary($salary){
        $this->employe->setSalary($salary);
    }
    public function get(){
        return $this->employe;
    }
}

class ContentBuilder implements EmployeBuilder{
    private $employe;
    public function __construct()
    {
        $this->employe = new Employe();
    }

    public function buildInfo($info){
        $this->employe->setID($info['id']);
        $this->employe->setName($info['name']);
        $this->employe->setEmail($info['email']);
    }
    public function buildDepartment(){
        $this->employe->setDepartment("Content");
    }
    public function buildSalary($salary){
        $this->employe->setSalary($salary);
    }
    public function get(){
        return $this->employe;
    }
}

// Director  -- tùy chọn chuyển đổi-- có thể bỏ qua
class Director{
    private $builder;

    public function __construct($EmployeBuilder){
        $this->builder = $EmployeBuilder;
    }

    public function construct($info, $salary){
        $this->builder->buildInfo($info);
        $this->builder->buildDepartment();
        $this->builder->buildSalary($salary);
    }
}

