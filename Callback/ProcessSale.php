<?php
class ProcessSale
{
    private $callbacks = [];

    // đăng ký callback
    public function registerCallback($callback)
    {
        if (is_callable($callback)) {
            $this->callbacks[] = $callback;
        } else {
            throw new Exception("Callback không hợp lệ!");
        }
    }

    // xử lý bán hàng, gọi callback
    public function sale($product)
    {
        echo "Bán sản phẩm: {$product->name}, giá: {$product->price} <br>";

        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}
