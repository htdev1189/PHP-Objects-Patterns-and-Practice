<?php

// khong su dung Abstruct Factory Pattern

/*
require_once __DIR__ . "/NoFactory.php";
$theme = "dark"; // input
if ($theme == "dark") {
    $button = new DarkButton();
} else {
    $button = new LightButton();
}
echo $button->render();
*/


/**
 * su dung abstract factory pattern
 * Client code (tiêm Abstract Factory để tạo các Concrete Product)
 * Tiêm: khái niệm về lấy 1 class làm tham số truyền vào trong hàm khởi tại của 1 class khác
 * Abstract Factory ở đây là : ThemeFactory
 * Concrete Product : ở đây là DankThemeFactory và LightThemeFactory
 */
require_once __DIR__ . "/HasPattern.php";
function renderUI($factory){
    $button = $factory->createButton("Click Me");
    echo $button->render();
}

// Giả sử user chọn theme
$userTheme = "dark";

if ($userTheme === "light") {
    $factory = new LightThemeFactory();
} else {
    $factory = new DarkThemeFactory();
}
renderUI($factory);