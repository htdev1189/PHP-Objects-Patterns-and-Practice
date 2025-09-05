<?php

define('BASE_URL', '/php-online/DesignPatterns/Structural/FluentInterface/Builder');


require_once 'core/Database.php';
require_once 'core/QueryBuilder.php';
require_once 'core/view.php';

$query = new QueryBuilder();

$users = $query->table('user')
    ->where('age', '=', 20)
    // ->where('country', '=', 'Vietnam')
    // ->orderBy('name')
    ->get();

// echo view('users', ['users' => $users]);


require_once __DIR__ . "/core/Template.php";

$template = new Template();
echo $template->render('home', array(
    "username" => "Admin",
    "users" => $users
));
