<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\DataMapper;

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/QueryBuilder.php";
require_once __DIR__ . "/User.php";
use DesignPatterns\Structural\DataMapper\Database;
use DesignPatterns\Structural\DataMapper\QueryBuilder;
use DesignPatterns\Structural\DataMapper\User;

// Chuyển đổi dữ liệu từ DB sang domain object (ở đây là User)
class UserMapper {
    private $connection;
    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    // query
    public function findByConditions(array $conditions){
        $queryBuilder = new QueryBuilder();
        $builder = $queryBuilder->select(['id','name','email'])
                    ->from('user');
        foreach ($conditions as $cond) {
            $builder->where($cond);
        }
        $sql = $builder->build();
        $result = $this->connection->query($sql);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            // add to arr obj
            $users[] = new User($row['name'], $row['email']);
        }

        return $users;
    }

    // insert
    public function insert(User $user): bool{
        $sql = "insert into user (name, email) values (?,?)";
        $stmt = $this->connection->prepare($sql);
        $name = $user->getName();
        $email = $user->getEmail();
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }
    // update
    public function update(User $user): bool {
        $stmt = $this->connection->prepare("UPDATE user SET name = ?, email = ? WHERE id = ?");
        $name = $user->getName();
        $email = $user->getEmail();
        $id = $user->getId();
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

}