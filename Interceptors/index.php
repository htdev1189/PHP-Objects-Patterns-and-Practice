<?php 
require_once __DIR__ . "/test__get.php";
use Intercaptors\get\Person as Person1;

require_once __DIR__ . "/test__set.php";
use Intercaptors\set\Person as Person2;

require_once __DIR__ . "/test__call.php";
use Intercaptors\call\Person as Person3;



// test __get
$person1 = new Person1("tuan");
echo ($person1->name) . "<br>";

// test __set
$person2 = new Person2();
$person2->name = "tuan2";
$person2->age = "30";
echo ($person2->name) . "<br>";
echo ($person2->age) . "<br>";

// test __call
$person3 = new Person3();
// echo $person3->test();
echo $person3->getInfo(); // chạy method từ class khác thông qua __call


