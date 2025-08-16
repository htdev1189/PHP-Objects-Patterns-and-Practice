<?php

namespace Intercaptors\set;

class Person
{
    private $name;
    protected $age;
    public function __set($property, $value)
    {
        $this->$property = $value;
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
