<?php 

declare(strict_types=1);
namespace DesignPatterns\Structural\Flyweight;

class Tree{
    public function __construct(
        public string $type,
        public string $color,
        public string $texture,
        public int $x,
        public int $y
    )
    {}

    public function draw() {
        echo "Vẽ cây {$this->type} màu {$this->color} tại ({$this->x}, {$this->y})<br>";
    }

    


}

// client code
// Giả sử có 1 triệu cây, mỗi cây đều lưu type, color, texture → rất tốn bộ nhớ

$trees = [];
$before = memory_get_usage();
$beforeTime = microtime(true);
for ($i = 0; $i < 4000; $i++) {
    $tree = new Tree("Oak", "Green", "Rough", rand(0, 100), rand(0, 100));
    $trees[] = $tree;
}
$afterTime = microtime(true);
$after = memory_get_usage();

echo "Bộ nhớ object Tree chiếm khoảng: " . ($after - $before) . " bytes<br>";
echo "Thời gian: " . ($afterTime - $beforeTime) . " giây<br>";


foreach ($trees as $tree) {
    $tree->draw();
}