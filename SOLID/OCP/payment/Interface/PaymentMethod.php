<?php
declare(strict_types=1);
namespace App\Interface;

interface PaymentMethod{
    public function pay($smount);
}
