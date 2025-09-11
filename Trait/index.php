<?php

//example 1

// require_once __DIR__ . '/example1.php';
// use PHP\Trait\User;
// use PHP\Trait\Product;
// $user = new User("Tuan");
// $product = new Product("iPhone");

//example 2

// require_once __DIR__ . '/example2.php';
// use PHP\Trait\Notification;
// $notification = new Notification();
// $notification->sendNotification("Hello World");

// example 3
require_once __DIR__ . '/example3.php';
use PHP\Trait\User;
use PHP\Trait\Product;

// ---------------- TEST DEMO ----------------
$user = new User("Tuan");
sleep(1);
$user->updateName("Tuan Nguyen");
print_r($user->getTimestamps());

echo "\n";

$product = new Product("Laptop");
sleep(1);
$product->updateTitle("Gaming Laptop");
print_r($product->getTimestamps());
