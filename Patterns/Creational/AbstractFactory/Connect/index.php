<?php 

require_once __DIR__ . "/HasPattern.php";

function test(DBFactory $factory){
    $connect = $factory->createConnection();
    $builder = $factory->createQueryBuilder();

    echo $connect->connect() . "</br>";
    echo $builder->select("user", array("id","name","email")) . "</br>";
}

$dbType = "pgsql";
if ($dbType == "mysql") {
    $factory = new MySQLFactory();
}else{
    $factory = new PgSQLFactory();
}

test($factory);