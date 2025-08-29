<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\DataMapper;

use mysqli;

class Database {
    // instance
    private static $instance = null;
    private $connection;
    private function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "test_db");
        if ($this->connection->connect_error) {
            die("Connection failed, " . $this->connection->connect_error);
        }
    }

    // get instance
    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
}