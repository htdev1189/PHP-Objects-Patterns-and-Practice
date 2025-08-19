<?php 
require_once __DIR__ . "/Person.php";
use ReflectionTest\Person;

/**
 * Lấy thông tin class
 * nếu không sử dụng use thì
 * $reflector = new ReflectionClass('ReflectionTest\\Person');
 * Nếu như sử dụng use thì
 * $reflector = new ReflectionClass(Person::class); 
 */

$reflector = new ReflectionClass(Person::class);
echo $reflector->getName() . PHP_EOL;
var_dump($reflector->getMethods());


/**
 * Lấy thông tin method và parameter
 */

$reflector2 = new ReflectionMethod(Person::class, 'setAge');
echo "Method name : " . $reflector2->getName();
var_dump($reflector2->getParameters());

/**
 * Gọi method thông qua Reflector 
 */
$person = new Person("hkt");
$reflector3 = new ReflectionMethod(Person::class, 'setAge');
$reflector3->invoke($person,100);
echo $person->name . PHP_EOL;
echo $person->age . PHP_EOL;

/**
 * Truy cập property private
 * Khong can thay doi class Person sang public hoac them getPass
 */
$reflector4 = new ReflectionClass(Person::class);
$property = $reflector4->getProperty("pass");
$property->setAccessible(true);
$person1 = new Person("hkt1");
echo $property->getValue($person1);