<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Database\Database;
use App\Builder\QueryBuilder;
use App\Domain\User;

// Chuyển đổi dữ liệu từ DB sang domain object (ở đây là User)
class UserMapper
{
    private $connection;
    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    // query
    public function findByConditions(array $conditions)
    {
        $queryBuilder = new QueryBuilder();
        $builder = $queryBuilder->select(['id', 'name', 'email', 'age', 'status'])
            ->from('user');
        foreach ($conditions as $cond) {
            $builder->where($cond);
        }
        $sql = $builder->build();
        $result = $this->connection->query($sql);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            // nếu theo constructer sẽ thiếu id
            // $user = new User($row['name'],$row['email'],(int)$row['age'],(int)$row['status']);

            // thuc hien chuyen dổi
            $user = User::fromArray($row); // này có chứa ID

            // add to arr obj
            $users[] = $user;
        }

        return $users;
    }



    // insert
    public function insert(User $user): bool
    {
        if ($this->findByConditions(["name = '{$user->getName()}'", "email = '{$user->getEmail()}'"])) {
            return false;
        } else {
            $sql = "insert into user (name, email, age, status) values (?,?,?,?)";
            $stmt = $this->connection->prepare($sql);
            $name = $user->getName();
            $email = $user->getEmail();
            $age = $user->getAge();
            $status = $user->getStatus();
            $stmt->bind_param("ssii", $name, $email, $age, $status);
            return $stmt->execute();
        }
    }
    // update
    public function update(User $user): bool
    {
        $stmt = $this->connection->prepare("UPDATE user SET name = ?, email = ?, age = ?, status = ? WHERE id = ?");
        $name = $user->getName();
        $email = $user->getEmail();
        $age = $user->getAge();
        $status = $user->getStatus();
        $id = $user->getId();
        $stmt->bind_param("ssiii", $name, $email, $age, $status, $id);
        return $stmt->execute();
    }
}
