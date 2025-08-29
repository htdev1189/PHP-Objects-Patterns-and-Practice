<?php

declare(strict_types=1);

namespace App\Domain;

// Domain Layer: lớp User không biết gì về DB
class User
{
    private ?int $id;
    private string $name;
    private string $email;
    private int $age;
    private string $status;

    public function __construct(?int $id, string $name, string $email, int $age = 20, int $status = 1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->status = match ($status) {
            1 => "active",
            default => "deactive",
        };
    }

    // getter
    function getId(): int
    {
        return $this->id;
    }
    function getName(): string
    {
        return $this->name;
    }
    function getEmail(): string
    {
        return $this->email;
    }
    function getAge(): int
    {
        return $this->age;
    }
    function getStatus(): string
    {
        return $this->status;
    }

    // setter
    public function setName(string $name){
        $this->name = $name;
    }
    public function setId(int $id){
        $this->id = $id;
    }


    public function __toString()
    {
        return "================== INFO ==================</br>"
            . " ID : {$this->getId()} <br>"
            . " Name : {$this->getName()} <br>"
            . " Email : {$this->getEmail()} <br>"
            . " Age : {$this->getAge()} <br>"
            . " Status : {$this->getStatus()} <br>";
    }
}
