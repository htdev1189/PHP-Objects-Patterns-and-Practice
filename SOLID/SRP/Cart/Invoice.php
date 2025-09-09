<?php
declare(strict_types=1);
namespace Solid\SRP;

require_once __DIR__ . "/Product.php";

class Invoice
{
    public function __construct(private Product $product, private int $quantity) {}
    public function caculateTotal()
    {
        return $this->product->getPrice() * $this->quantity;
    }
    public function updateQuantity(int $bonus)
    {
        $this->quantity += $bonus;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getProduct()
    {
        return $this->product;
    }
}