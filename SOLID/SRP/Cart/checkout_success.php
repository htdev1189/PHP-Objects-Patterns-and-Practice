<?php
session_start();
$orderId = $_SESSION['last_order_id'] ?? null;
unset($_SESSION['last_order_id']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thanh toán thành công</title>
</head>

<body>
    <h2>✅ Thanh toán thành công!</h2>
    <?php if ($orderId): ?>
        <p>Mã đơn hàng của bạn là <strong>#<?= $orderId ?></strong></p>
        <p>Cảm ơn bạn đã mua hàng. Đơn hàng đã được ghi nhận vào hệ thống.</p>
    <?php else: ?>
        <p>Không tìm thấy thông tin đơn hàng.</p>
    <?php endif; ?>
    <a href="index.php">🔙 Quay lại trang chủ</a>
</body>

</html>