<?php
require_once __DIR__ . '/vendor/autoload.php';

// echo "<pre>";
// print_r(get_declared_classes());
// echo "</pre>";


use App\Database\Database;
use App\Mapper\UserMapper;
use App\Domain\User;

// Khởi tạo mapper
$mapper = new UserMapper();

// insert
$mapper->insert(new User("admin1", "admin1@gmail.com", 30));
$mapper->insert(new User("admin2", "admin1@gmail.com", 20));
$mapper->insert(new User("admin2", "admin2@gmail.com", 20));
// $mapper->insert(new User("admin1", "admin1@gmail.com", 25, 0));
// $mapper->insert(new User("admin2", "admin2@gmail.com"));

// $users = $mapper->findByConditions(["status = 'active'", "age > 25"]);


// update
// $userList = $mapper->findByConditions(["id = 14"]);
// $userData = $userList[0] ?? null;
// if ($userData) {
//     $userData->setName("htdev"); // ví dụ cập nhật
//     $mapper->update($userData);
//     echo "Cập nhật thành công!";                                                                                                                                                                                                
// }else{
//     echo "Không tìm thấy user.<br>";
// }


$all = $mapper->findByConditions([]);
foreach ($all as $user) {
    echo $user->getName() . " - " . $user->getEmail() . "<br>";
}
