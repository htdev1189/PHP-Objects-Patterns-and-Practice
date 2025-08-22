<?php 
/**
 * Bài toán giải quyết về việc kết nối database
 * Giả sử bạn viết một hệ thống PHP có thể chạy trên nhiều loại database: MySQL hoặc PostgreSQL.
 * Mỗi DB có cách tạo Connection, QueryBuilder, Record riêng. Nếu code trực tiếp, bạn sẽ phải if...else khắp nơi → rất rối.
 * Abstract Factory sẽ giúp gom nhóm các “sản phẩm” liên quan vào cùng một Factory.
 */

/**
 * b1: Abstract Product (Connection)
 */

interface Connection{
    public function connect();
}
interface QueryBuilder{
    public function select($table, $fields);
}

/**
 * b2: Concrete Factory (Triển khai các interface Abstract Product để tạo ra các đối tượng cụ thể)
 */

// MySQL
class MySqlConnection implements Connection{
    // overriding
    public function connect()
    {
        echo "Connected by MySQL" . PHP_EOL;
    }
}
class MySQLBuilder implements QueryBuilder{
    public function select($table, $fields){
        return "select " . implode(", ", $fields) . " from " . $table . " (MySQL query)";
    }
}

// PostgreSQL
class PostgreSQLConnection implements Connection{
    // overriding
    public function connect()
    {
        echo "Connected by PostgreSQL" . PHP_EOL;
    }
}
class PostgreSQLBuilder implements QueryBuilder{
    public function select($table, $fields){
        return "select " . implode(", ", $fields) . " from " . $table . " (PgSQL query)";
    }
}


/**
 * b3: Abstract Factory (định nghĩa interface cho các factory con.)
 */
interface DBFactory{
    public function createConnection();
    public function createQueryBuilder();
}


/**
 * b4: Concrete Product: triển khai Abstract Factory và  tạo ra các class cụ thể từ Concrete Factory (ở đây là DankButton và LightButton) 
 */
class MySQLFactory implements DBFactory{
    public function createConnection(){
        return new MySqlConnection();
    }
    public function createQueryBuilder(){
        return new MySQLBuilder();
    }
}
class PgSQLFactory implements DBFactory{
    public function createConnection(){
        return new PostgreSQLConnection();
    }
    public function createQueryBuilder(){
        return new PostgreSQLBuilder();
    }
}



