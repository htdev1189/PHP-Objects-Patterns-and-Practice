<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\DataMapper;

// Domain Layer: lớp User không biết gì về DB
class User{
    private int $id;
    private string $name;
    private string $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    // getter
    function getId() : int {
        return $this->id;
    }
    function getName() : string {
        return $this->name;
    }
    function getEmail() : string {
        return $this->email;
    }

    public function __toString()
    {
        return $this->getName() . " - " . $this->getEmail() . "<br>";
    }
}