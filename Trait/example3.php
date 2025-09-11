<?php
namespace PHP\Trait;
// Trait ghi log
trait Logger {
    public function log($message) {
        echo "[LOG] " . date("Y-m-d H:i:s") . " - $message\n";
    }
}

// Trait quản lý thời gian
trait Timestampable {
    private $createdAt;
    private $updatedAt;

    public function setCreatedAt() {
        $this->createdAt = date("Y-m-d H:i:s");
    }

    public function setUpdatedAt() {
        $this->updatedAt = date("Y-m-d H:i:s");
    }

    public function getTimestamps() {
        return [
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt
        ];
    }
}

// ---------------- CLASS USER ----------------
class User {
    use Logger, Timestampable;

    private $name;

    public function __construct($name) {
        $this->name = $name;
        $this->setCreatedAt();
        $this->log("User '{$this->name}' has been created.");
    }

    public function updateName($newName) {
        $this->name = $newName;
        $this->setUpdatedAt();
        $this->log("User name updated to '{$this->name}'.");
    }
}

// ---------------- CLASS PRODUCT ----------------
class Product {
    use Logger, Timestampable;

    private $title;

    public function __construct($title) {
        $this->title = $title;
        $this->setCreatedAt();
        $this->log("Product '{$this->title}' has been created.");
    }

    public function updateTitle($newTitle) {
        $this->title = $newTitle;
        $this->setUpdatedAt();
        $this->log("Product title updated to '{$this->title}'.");
    }
}


