<?php
declare(strict_types=1);
namespace Solid\SRP;

require_once __DIR__ . '/CartController.php';

$controller = new CartController();
$controller->handleRequest();

