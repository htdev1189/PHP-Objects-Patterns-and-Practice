<?php

declare(strict_types=1);

namespace Solid;

/**
 * Product : chỉ quản lý thông tin sản phẩm
 * Invoice : chỉ tính toán hóa đơn
 * Cart : quản lý giỏ hàng
 */
class Product
{
    public function __construct(private int $id, private string $name, private string $color, private int $price) {}
    public function getName()
    {
        return $this->name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function __toString()
    {
        return "============ INFO ==============" . "</br>"
            . " Id => {$this->id} " . "</br>"
            . " Name => {$this->name} " . "</br>"
            . " Color => {$this->color} " . "</br>"
            . " Price => {$this->price} " . "</br>"
            . " ============ END ==============" . "</br>";
    }
}
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
class Cart
{
    private array $items = [];

    // them san pham vao gio hang
    public function addProduct(Product $product, int $quantity)
    {
        if (!isset($this->items[$product->getId()])) {
            $this->items[$product->getId()] = new Invoice($product, $quantity);
        } else {
            $invoice = $this->items[$product->getId()];
            // update quantity
            $invoice->updateQuantity($quantity);
            $this->items[$product->getId()] = $invoice;
        }
    }

    // tính tổng tiền giỏ hàng
    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->caculateTotal();
        }
        return $total;
    }

    // show cart
    // public function __toString()
    // {
    //     $result =  "============ Cart ==============" . "</br>"
    //         . "===== ID ======== Product ============ Quantity ========= Price ============" . "<br>";
    //         foreach ($this->items as $id => $item) {
    //             $result .= "=====  {$id} ======== {$item->getProduct()->getName()} ============ {$item->getQuantity()} ========= {$item->getProduct()->getPrice()} ============" . "<br>";
    //         }
    //     $result.= " ============ END ==============" . "</br>";
    //     return $result;


    // }

    public function __toString()
    {
        $result = "<h3>🛒 Giỏ hàng</h3>";
        $result .= "<table border='1' cellpadding='8' cellspacing='0'>";
        $result .= "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>";
        $result .= "<tbody>";

        foreach ($this->items as $id => $item) {
            $product = $item->getProduct();
            $quantity = $item->getQuantity();
            $price = $product->getPrice();
            $total = $price * $quantity;

            $result .= "<tr>
                        <td>{$id}</td>
                        <td>{$product->getName()}</td>
                        <td>{$quantity}</td>
                        <td>" . number_format($price, 0, ',', '.') . "₫</td>
                        <td>" . number_format($total, 0, ',', '.') . "₫</td>
                    </tr>";
        }
        $result .= "
        <tr>
                        <td colspan='4'>Total</td>
                        <td>" . number_format($this->getTotal(), 0, ',', '.') . "₫</td>
                    </tr>
        ";

        $result .= "</tbody></table>";
        return $result;
    }
}
// client code
// $product1 = new Product("product1", "red", 100);
// $product2 = new Product("product2", "yellow", 200);
// $invoice = new Invoice($product1, 10);
// echo "Total: " . $invoice->caculateTotal() . "$</br>";

// update cart
$product1 = new Product(1, "Áo thun", "Đỏ", 200000);
$product2 = new Product(2, "Quần jeans", "Xanh", 350000);

$cart = new Cart();
$cart->addProduct($product1, 5);
$cart->addProduct($product2, 2);
$cart->addProduct($product1, 2);

echo $cart;
