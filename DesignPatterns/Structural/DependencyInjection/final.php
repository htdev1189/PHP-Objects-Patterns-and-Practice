<?php
interface Database{
    public function query($sql);
}

class MySQLDatabase implements Database{
    public function query($sql)
    {
        return "[MySQL] Executing : {$sql}";
    }
}

class MongoDatabase implements Database{
    public function query($sql)
    {
        return "[MongoDB] Executing : {$sql}";
    }
}

// repository nhận database thông qua DI
class UserRepository{
    private $db;
    public function __construct(Database $database)
    {
        $this->db = $database;
    }
    public function findUser($id){
        return $this->db->query("users.find({id:{$id}})");
    }
}

// service nhận repository thông qua DI
class UserService{
    private $repository;
    public function __construct(UserRepository $repo)
    {
        $this->repository = $repo;
    }
    public function getUserInfo($id){
        return $this->repository->findUser($id);
    }
}

// controller nhận các service thông qua DI
class UserController{
    private $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function showUser($id){
        return $this->service->getUserInfo($id);
    }
}

// client code
// Nếu dùng MySQL
$mysqlDb = new MySQLDatabase();
$userRepo = new UserRepository($mysqlDb);
$userService = new UserService($userRepo);
$controller = new UserController($userService);
echo $controller->showUser(1);

echo "<br>";

// Nếu đổi sang MongoDB → KHÔNG sửa 3 class kia, chỉ đổi lúc khởi tạo
$mongoDb = new MongoDatabase();
$userRepo2 = new UserRepository($mongoDb);
$userService2 = new UserService($userRepo2);
$controller2 = new UserController($userService2);
echo $controller2->showUser(2);