<?php
declare(strict_types=1);
namespace Solid\SRP;


require_once __DIR__ . '/DB.php';

class OrderRepository {

    private $connection;
    public function __construct()
    {
        $this->connection = DB::getInstance()->getConnection();
    }

    public function saveOrder(Cart $cart): int {
        $this->connection->begin_transaction();

        try {
            $stmt = $this->connection->prepare("INSERT INTO orders (created_at, total) VALUES (?, ?)");
            $now = date('Y-m-d H:i:s');
            $total = $cart->getTotal();
            $stmt->bind_param("si", $now, $total);
            $stmt->execute();
            $orderId = $stmt->insert_id;

            $itemStmt = $this->connection->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
            foreach ($cart->getItems() as $key => $item) {
                $product = $item->getProduct();
                $itemStmt->bind_param(
                    "iii",
                    $orderId,
                    $key,
                    $item->getQuantity()
                );
                $itemStmt->execute();
            }

            $this->connection->commit();
            return $orderId;
        } catch (\Exception $e) {
            $this->connection->rollback();
            throw $e;
        }
    }
}
