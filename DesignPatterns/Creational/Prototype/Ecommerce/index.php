<?php 

require_once __DIR__ . "/Product.php";
use DesignPatterns\Creational\Prototype\Product;

// original instance
$originalProduct = new Product("Dell","32Gb","Core I7");

// clone
$customProduct = clone $originalProduct;
$customProduct->ram = "16Gb";
echo $customProduct;
var_dump($customProduct);
