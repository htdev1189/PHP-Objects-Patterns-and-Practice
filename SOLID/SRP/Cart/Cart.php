<?php

declare(strict_types=1);

namespace Solid\SRP;

require_once __DIR__ . "/Invoice.php";

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

    public function removeProduct(int $id): void
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            // $this->items = array_values($this->items); // reset index
        }
    }

    public function updateProduct(Product $product, int $newQuantity)
    {
        if (isset($this->items[$product->getId()])) {
            $this->items[$product->getId()] = new Invoice($product, $newQuantity);
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

    // ✅ Lấy danh sách hóa đơn trong giỏ
    public function getItems() {
        return $this->items;
    }

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
                        <th>Action</th>
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
                        <td>
                            <a  href='?remove={$id}' onclick=\"return confirm('Bạn có chắc muốn xóa sản phẩm này?')\">🗑️ Xóa</a>
                            <form method='post' style='display:inline'>
                                <input type='hidden' name='update_id' value='{$id}'>
                                <input type='number' name='new_quantity' value='{$quantity}' min='1' style='width:60px'>
                                <button type='submit'>🔄</button>
                            </form>
                        </td>
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
