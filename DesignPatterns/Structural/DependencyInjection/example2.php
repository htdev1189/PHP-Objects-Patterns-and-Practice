<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\DependencyInjection;

// interface để trừu tượng hóa database
interface Database {
    public function connect();
}

class MySQLDatabase implements Database{
    public function connect(){
        return "connected to MySQL";
    }
}
class MongoDatabase implements Database{
    public function connect(){
        return "connected to MongoDB";
    }
}

class UserRepository{

    private $database;

    // tiêm trực tiếp vào khởi tạo
    public function __construct(Database $db)
    {
        $this->database = $db;
    }

    public function getUser($id){
        return $this->database->connect() . " - Getting user with ID : {$id}";
    }

}

// client code
$user1 = new UserRepository(new MySQLDatabase());
echo $user1->getUser(10) . "<br>";

$user2 = new UserRepository(new MongoDatabase());
echo $user2->getUser(10) . "<br>";