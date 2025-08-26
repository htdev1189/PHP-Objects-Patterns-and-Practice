<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\SingleTon;
/**
 * Kết hợp Singleton và Abstract Factory
 * Singleton: Đảm bảo mỗi loại kết nối chỉ có một instance duy nhất.
 * Abstract Factory: Tạo ra các đối tượng kết nối mà không cần biết chi tiết lớp cụ thể.
 */

// interface cho kết nối
interface DBConnectionInterface{
    public function connect();
}

// SingleTon cho từng loại kết nối

class MySQLConnection implements DBConnectionInterface{

    // Biến static lưu trữ instance duy nhất
    private static $instance;

    // không cho tạo instance ngoài hàm
    private function __construct()
    {
        
    }

    // điểm truy cập toàn cục đến instance
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Override 
    public function connect(){
        echo "Connected by MySQL";
    }
}

class PostgreSQLConnection implements DBConnectionInterface {
    private static $instance;

    private function __construct() {}

    public static function getInstance(): PostgreSQLConnection {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        echo "Kết nối PostgreSQL\n";
    }
}

// xây dựng Abstract Factory
interface ConnectionFactory{
    // phuong thuc tao connect
    public function createConnection();
}

// xây dựng các factory con 
class MySQLFactory implements ConnectionFactory{
    public function createConnection()
    {
        return MySQLConnection::getInstance();
    }
}
class PostgreSQLFactory implements ConnectionFactory{
    public function createConnection()
    {
        return PostgreSQLConnection::getInstance();
    }
}

// client code
function getDatabaseConnection(ConnectionFactory $factory){
    return $factory->createConnection();
}
$mysqlFactory = new MySQLFactory();
$mysqlConnect = getDatabaseConnection($mysqlFactory);
$mysqlConnect->connect();
