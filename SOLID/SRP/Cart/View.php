<h2>Thêm sản phẩm vào giỏ</h2>
<form method="post">
    <select name="product_id">
        <?php foreach ($products as $index => $product): ?>
            <option value="<?= $index + 1 ?>">
                <?= $product->getName() ?> - <?= $product->getColor() ?> - <?= number_format($product->getPrice(), 0, ',', '.') ?>₫
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Số lượng:</label>
    <input type="number" name="quantity" value="1" min="1"><br><br>

    <button type="submit" name="add">Thêm vào giỏ hàng</button>
</form>

<hr>
<?php echo $cart ?>

<form method="post">
    <button type="submit" name="checkout" onclick="return confirm('Bạn có chắc muốn thanh toán giỏ hàng này?')">
        ✅ Thanh toán
    </button>
</form>

