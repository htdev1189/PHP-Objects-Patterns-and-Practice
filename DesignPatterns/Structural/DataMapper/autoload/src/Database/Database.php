<?php
declare(strict_types=1); //PHP sẽ không tự động chuyển đổi kiểu.
namespace App\Database;// cẩn thận chỗ này

class Database {
    // instance
    private static $instance = null;
    private $connection;
    private function __construct()
    {
        $this->connection = new \mysqli("localhost", "root", "", "test_db");
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