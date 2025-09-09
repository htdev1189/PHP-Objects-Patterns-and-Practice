<?php

declare(strict_types=1);

namespace Solid\SRP;

require_once __DIR__ . '/CartService.php';

class CartController
{
    private CartService $service;

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new Cart();
        }
        $this->service = new CartService($_SESSION['cart']);
    }

    public function handleRequest()
    {
        // insert
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            $productId = (int)$_POST['product_id'];
            $quantity  = (int)$_POST['quantity'];
            $this->service->addProductById($productId, $quantity);
            $_SESSION['cart'] = $this->service->getCart();

            // ✅ Redirect để tránh submit lại khi F5
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        // update
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'], $_POST['new_quantity'])) {
            $id = (int)$_POST['update_id'];
            $qty = (int)$_POST['new_quantity'];
            $this->service->updateQuantity($id, $qty);
            $_SESSION['cart'] = $this->service->getCart();

            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        // remove
        if (isset($_GET['remove'])) {
            $this->service->removeProduct((int)$_GET['remove']);
            $_SESSION['cart'] = $this->service->getCart();

            // ✅ Redirect sau khi xóa
            header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
            exit;
        }

        $this->renderView();
    }

    private function renderView(): void
    {
        $products = $this->service->getAvailableProducts();
        $cart     = $this->service->getCart();

        include __DIR__ . '/View.php';
    }
}
