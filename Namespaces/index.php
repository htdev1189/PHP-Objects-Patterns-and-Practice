<?php 

require __DIR__ . "/A.php";
require __DIR__ . "/B.php";

use A\User;
use B\User as User2;

$user = new User;
$user2 = new User2;

echo $user->getInfo()."<br>";
echo $user2->getInfo();

echo User::testStatic();