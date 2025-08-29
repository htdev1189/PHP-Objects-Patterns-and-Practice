<?php
declare(strict_types=1);
namespace App\Mapper;

use App\Database\Database;
use App\Builder\QueryBuilder;
use App\Domain\User;

// Chuyển đổi dữ liệu từ DB sang domain object (ở đây là User)
class UserMapper {
    private $connection;
    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    // query
    public function findByConditions(array $conditions){
        $queryBuilder = new QueryBuilder();
        $builder = $queryBuilder->select(['id','name','email','age','status'])
                    ->from('user');
        foreach ($conditions as $cond) {
            $builder->where($cond);
        }
        $sql = $builder->build();
        $result = $this->connection->query($sql);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            // add to arr obj
            $users[] = new User($row['id'],$row['name'], $row['email'],$row['age'], $row['status']);
        }

        return $users;
    }



    // insert
    public function insert(User $user): bool{
        $sql = "insert into user (name, email, age, status) values (?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $name = $user->getName();
        $email = $user->getEmail();
        $age = $user->getAge();
        $status = $user->getStatus();
        $stmt->bind_param("ssis", $name, $email, $age, $status);
        return $stmt->execute();
    }
    // update
    public function update(User $user): bool {
        $stmt = $this->connection->prepare("UPDATE user SET name = ?, email = ?, age = ?, status = ? WHERE id = ?");
        $name = $user->getName();
        $email = $user->getEmail();
        $age = $user->getAge();
        $status = $user->getStatus();
        $id = $user->getId();
        $stmt->bind_param("ssi", $name, $email, $age, $status, $id);
        return $stmt->execute();
    }

}