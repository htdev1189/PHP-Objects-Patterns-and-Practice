<?php

declare(strict_types=1);

namespace Solid\SRP;

require_once __DIR__ . "/Cart.php";
require_once __DIR__ . "/ProductRepository.php";

class CartService
{
    private Cart $cart;
    private ProductRepository $productRepository;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->productRepository = new ProductRepository();
    }

    public function addProductById(int $productId, int $quantity): void
    {
        $product = $this->productRepository->findById($productId);
        if ($product) {
            $this->cart->addProduct($product, $quantity);
        }
    }

    public function removeProduct(int $id): void
    {
        $this->cart->removeProduct($id);
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }
    public function getAvailableProducts(): array
    {
        return $this->productRepository->findAll();
    }

    public function updateQuantity(int $id, int $newQuantity): void
    {
        $product = $this->productRepository->findById($id);
        if ($product && $newQuantity > 0) {
            $this->cart->addProduct($product, $newQuantity);
        }
    }
}
