<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Site</title>

    <!-- ✅ Thêm CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header,
        footer {
            background: #f0f0f0;
            padding: 10px;
        }

        main {
            padding: 20px;
        }
    </style>

    <!-- Nếu muốn cho view con override thêm CSS -->
    <?php $this->yield('css'); ?>


</head>

<body>
    <header>Header chung</header>

    <main>
        <?php $this->yield('content'); ?>
    </main>

    <footer>Footer chung</footer>
</body>

</html>