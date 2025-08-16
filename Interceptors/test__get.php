<?php 
namespace Intercaptors\get;

    class Person{
        private $name;

        public function __construct($name)
        {
            $this->name = $name;
        }
        public function __get($name)
        {
            // check property exists
            if (property_exists($this, $name)) {
                return $this->name;
            }
            return "Property not found in class";
        }
    }
?>