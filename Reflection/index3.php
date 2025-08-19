<?php
require_once __DIR__ . '/controller/UserController.php';
require_once __DIR__ . '/controller/ProductController.php';

// Load routes
$routes = require __DIR__ . '/router.php';

// Lấy URL hiện tại (ví dụ index.php?url=/user/show&id=5)
// $_GET['url'] = "/user/show&id=5";
$path = isset($_GET['url']) ? $_GET['url'] : '/';
$params = $_GET;
var_dump($params);

// Kiểm tra route
if (!isset($routes[$path])) {
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

// Lấy thông tin controller + method
[$controllerClass, $method] = $routes[$path];
// var_dump($routes[$path]);
// var_dump($controllerClass);
// var_dump($method);
// exit();
// list($controllerClass, $method) = $routes[$path]; php 5.6

// Dùng Reflection để kiểm tra method có tồn tại
$reflector = new ReflectionClass($controllerClass);
// var_dump($reflector);exit();
if (!$reflector->hasMethod($method)) {
    http_response_code(500);
    echo "Method $method not found in $controllerClass";
    exit;
}

// Tạo instance và gọi method
$controller = new $controllerClass();
$reflectionMethod = $reflector->getMethod($method);
var_dump($reflectionMethod->getParameters());
// Lấy danh sách tham số method để map từ $_GET
$args = [];
foreach ($reflectionMethod->getParameters() as $param) {
    $name = $param->getName();
    if (isset($params[$name])) {
        $args[] = $params[$name];
    } elseif ($param->isDefaultValueAvailable()) {
        $args[] = $param->getDefaultValue();
    } else {
        $args[] = null;
    }
}
var_dump($args);exit();

// Gọi method
echo $reflectionMethod->invokeArgs($controller, $args);
