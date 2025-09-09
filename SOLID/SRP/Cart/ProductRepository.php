<?php
declare(strict_types=1);
namespace Solid\SRP;

require_once __DIR__ . "/DB.php";
require_once __DIR__ . "/Product.php";

class ProductRepository {
    private $connection;
    public function __construct()
    {
        $this->connection = DB::getInstance()->getConnection();
    }
    public function findAll() {
        $result = $this->connection->query("SELECT * FROM products");
        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = new Product((int)$row['id'], $row['name'], $row['color'], (int)$row['price']);
        }

        return $products;
    }
    public function findById(int $id){
        $stmt = $this->connection->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($row = $res->fetch_assoc()) {
            return new Product($row['id'], $row['name'], $row['color'], (int)$row['price']);
        }
        return null;
    }
}