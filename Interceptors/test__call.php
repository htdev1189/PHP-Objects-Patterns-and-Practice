<?php 
namespace Intercaptors\call;


require_once __DIR__ . "/Info.php";
use Intercaptors\info\Info;

class Person{
    private $name;
    private $info;
    public function __construct()
    {
        $this->info = new Info;
    }
    private function test(){
        return "private info";
    }
    public function __call($nameMethod, $arguments)
    {
        // if (method_exists($this,$nameMethod)) {
        //     return call_user_func_array([$this, $nameMethod], $arguments);
        // }
        // return $nameMethod;

        if (method_exists($this->info, $nameMethod)) {
            return $this->info->$nameMethod();
        }
    }
}
