<?php

/**
 * sử dụng fluent Interface
 * 
 */

declare(strict_types=1);

namespace DesignPatterns\Structural\FluentInterface;

class User
{
    private $name;
    private $age;
    private $email;

    // setter
    public function setName(string $name)
    {
        $this->name = $name;
        return $this; //fluent style
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
    public function setAge(int $age)
    {
        $this->age = $age;
        return $this;
    }

    // print
    public function __toString()
    {
        return "Name: {$this->name}, Email: {$this->email}, Age: {$this->age}";
    }
}

// client code
$user = (new User())
    ->setName("Name")
    ->setEmail("email")
    ->setAge(30);
echo $user; // toString :)

/**
 * Khác biệt với Builder pattern ở chỗ là Builder tách biệt quá trình khởi tạo ra khỏi class chính
 * một ví dụ đơn giản với Builder
 */
class Category
{
    public $title;
    public $price;

    public function __toString()
    {
        return "Title: {$this->title}, Price: {$this->price}";
    }
}

// builder tách biệt với category
class CategoryBuilder
{
    public function __construct(private Category $category)
    {
        // này thay vì khai báo propeties và $this->propeties thì viết ngắn gọn
    }
    public function setTitle(string $title)
    {
        $this->category->title = $title;
        return $this;
    }
    public function setPrice(float $price)
    {
        $this->category->price = $price;
        return $this;
    }

    // build
    public function build()
    {
        return $this->category;
    }
}

// client code
$category = (new CategoryBuilder(new Category()))
    ->setTitle("category 1")
    ->setPrice(10.5)
    ->build();
echo $category;
