<?php
namespace App\Controllers;

class UserController {
    public function show($id) {
        return "User #" . $id;
    }

    public function list() {
        return "List all users";
    }
}
