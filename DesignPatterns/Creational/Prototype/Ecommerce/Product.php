<?php 

namespace DesignPatterns\Creational\Prototype;
class Product{
    public $title;
    public $ram;
    public $cpu;

    public function __construct($title, $ram, $cpu)
    {
        $this->title = $title;
        $this->ram = $ram;
        $this->cpu= $cpu;
    }

    public function __clone()
    {
        //
    }

    // to string
    public function __toString()
    {
        return "----------- INFO --------------</br>"
        . " Title : $this->title</br>"
        . " Ram : $this->ram</br>"
        . " CPU : $this->cpu</br>" 
        . "----------- INFO --------------</br>"; 
    }
}

