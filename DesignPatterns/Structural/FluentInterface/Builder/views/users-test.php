<!DOCTYPE html>
<html>
<head>
    <title>Danh sách người dùng</title>
</head>
<body>
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
</body>
</html>
