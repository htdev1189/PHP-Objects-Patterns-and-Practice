<?php 
require_once __DIR__ . "/Book.php";
use DesignPatterns\Creational\Prototype\Book;

// tạo 1 đối tượng gốc
$originalBook = new Book("Designer pattern in PHP", "Anonymous");

// Clone object
$copiedBook1 = clone $originalBook;
// setter
$copiedBook1->title = "Designer pattern in JAVA";

$copiedBook2 = clone $originalBook;
$copiedBook2->title = "Designer pattern in Ruby";


// same instance
// var_dump($copiedBook1 == $copiedBook2);//true

// show info
echo $originalBook->title . "<br>";
echo $copiedBook1->title . "<br>";
echo $copiedBook2->title . "<br>";