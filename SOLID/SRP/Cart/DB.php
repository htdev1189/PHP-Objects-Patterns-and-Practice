<?php

declare(strict_types=1);

namespace Solid\SRP;

class DB
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $this->connection = new \mysqli("localhost", "root", "", "test_db");
        if ($this->connection->connect_error) {
            die("Kết nối thất bại");
        }
    }

    public static function getInstance()
    {
        // đảm bảo tính duy nhất của instance
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
