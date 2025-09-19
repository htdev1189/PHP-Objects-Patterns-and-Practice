<?php
require __DIR__ . "/vendor/autoload.php";

use App\BusinessLogic\PaymentProcessor;
use App\Implements\BankTransferPayment;
use App\Implements\PayPalPayment;

$process1 = new PaymentProcessor(new PayPalPayment());
echo $process1->process(100) .  "<br>";

$process2 = new PaymentProcessor(new BankTransferPayment());
echo $process2->process(100) .  "<br>";