<?php
use App\Controllers\UserController;
use App\Controllers\ProductController;

return [
    '/user/show'   => [UserController::class, 'show'],
    '/user/list'   => [UserController::class, 'list'],
    '/product/all' => [ProductController::class, 'index'],
];
