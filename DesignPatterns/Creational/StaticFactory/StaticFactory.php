<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\StaticFactory;

require_once __DIR__ . "/FormatNumber.php";
require_once __DIR__ . "/FormatString.php";
use DesignPatterns\Creational\StaticFactory\FormatNumber;
use DesignPatterns\Creational\StaticFactory\FormatString;

class StaticFactory{
    public static function factory(string $type){
        return match ($type) {
            "number" => new FormatNumber(),
            "string" => new FormatString(),
            default => throw new \Exception("Unknow format given"),
        };
    }
}