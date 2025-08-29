<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database\Database;

$db = Database::getInstance();
echo "Autoload hoạt động!";
