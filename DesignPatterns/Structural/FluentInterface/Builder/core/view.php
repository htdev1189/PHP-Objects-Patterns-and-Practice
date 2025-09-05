<?php

function view($name, $data = []){
    extract($data); // biến mảng thành biến riêng lẻ
    ob_start();
    include "views/{$name}.php";
    return ob_get_clean();
}