<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\StaticFactory;

require_once __DIR__ . "/StaticFactory.php";
use DesignPatterns\Creational\StaticFactory\StaticFactory;

try {
    $format = StaticFactory::factory('number');
    var_dump($format->format('123'));
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
