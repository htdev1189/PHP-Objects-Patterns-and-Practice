<?php

echo "\n=== VI PHẠM LSP TRONG DISCOUNT ===\n";

class Discount {
    public function apply(float $price): float {
        return $price * 0.9; // mặc định giảm 10%
    }
}

class NoDiscount extends Discount {
    public function apply(float $price): float {
        // Vi phạm LSP: thay vì trả về price * 1.0,
        // lại ném exception gây crash client
        throw new Exception("Không áp dụng giảm giá");
    }
}

function checkout(Discount $discount, float $price) {
    $final = $discount->apply($price);
    echo "Giá sau giảm: $final\n";
}

try {
    checkout(new Discount(), 100);   // OK
    checkout(new NoDiscount(), 100); // Crash!
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage() . "\n";
}



echo "\n=== TUÂN THỦ LSP ===\n";

interface DiscountInterface {
    public function apply(float $price): float;
}

class PercentageDiscount implements DiscountInterface {
    private float $rate;
    public function __construct(float $rate) {
        $this->rate = $rate;
    }
    public function apply(float $price): float {
        return $price * (1 - $this->rate);
    }
}

class NoDiscount2 implements DiscountInterface {
    public function apply(float $price): float {
        return $price; // Giữ nguyên giá, không exception
    }
}

function checkout2(DiscountInterface $discount, float $price) {
    $final = $discount->apply($price);
    echo "Giá sau giảm: $final\n";
}

checkout2(new PercentageDiscount(0.1), 100); // Giá = 90
checkout2(new NoDiscount2(), 100);           // Giá = 100 (không crash)
