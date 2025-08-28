<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\StaticFactory;

require_once __DIR__ . "/interface/Formatter.php";
use DesignPatterns\Creational\StaticFactory\Formatter;

class FormatString implements Formatter{
    public function format(string $input){
        return $input;
    }
}