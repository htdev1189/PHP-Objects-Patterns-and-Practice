<?php 
// client code
declare(strict_types=1);
namespace DesignPatterns\Structural\DataMapper;

require_once __DIR__ . "/UserMapper.php";
require_once __DIR__ . "/User.php";

$mapper = new UserMapper();

// insert 
$mapper->insert(new User("tuan","tuan@localhost"));

$users = $mapper->findByConditions([
    "status = 'active'",
    "age > 25"
]);
foreach($users as $user){
    echo $user;
}
