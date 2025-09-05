<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<h1>Trang chủ</h1>
<p>Xin chào, <?php echo $username ?>!</p>


<h2>Danh sách người dùng</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['age']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>


<?php $this->endSection(); ?>