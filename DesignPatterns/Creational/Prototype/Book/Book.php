<?php
namespace DesignPatterns\Creational\Prototype;
class Book{
    public $title;
    public $author;
    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function __clone()
    {
        
    }
}