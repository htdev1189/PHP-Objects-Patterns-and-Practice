<?php

// function __autoload($classname) {
//     include $classname . ".php";
// }


//using an anonymous function
// spl_autoload_register(function($className){
//     $path = __DIR__ . "/classes/" . $className . ".php";
//     if (file_exists($path)) {
//         require_once $path;
//     }
// });

function my_autoloader($class)
{
    $path = __DIR__ . "/classes/" . $class . ".php";
    if (file_exists($path)) {
        require_once $path;
    }
}
spl_autoload_register("my_autoloader");


$post = new Post;
$user = new User;
$product = new Product;
