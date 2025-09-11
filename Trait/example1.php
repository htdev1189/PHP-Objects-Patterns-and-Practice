<?php

declare(strict_types=1);

namespace PHP\Trait;

/**
 * Ghi log khi thêm một user hoặc product
 */

trait Log
{
    public function log($message)
    {
        echo "Log message: $message\n";
    }
}


class User
{
    use Log;
    public function __construct(private string $name)
    {
        $this->log("User class initialized");
    }
}

class Product
{
    use Log;

    public function __construct(private string $name)
    {
        $this->log("Product class initialized");
    }
}


