<?php
require_once __DIR__ . "/Product.php";
require_once __DIR__ . "/ProcessSale.php";
// Tạo đối tượng
$processor = new ProcessSale();

// Đăng ký callback 1: ghi log
$processor->registerCallback(function($product) {
    echo "   [LOG] Đã bán: {$product->name} <br>";
});

// Đăng ký callback 2: kiểm tra giá cao
$processor->registerCallback(function($product) {
    if ($product->price > 1000) {
        echo "   [CẢNH BÁO] Giá cao bất thường: {$product->price} <br>";
    }
});

// Thực hiện bán hàng
$processor->sale(new Product("Laptop", 1500));
$processor->sale(new Product("Chuột", 200));