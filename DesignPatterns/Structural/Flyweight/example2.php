<?php 
/**
 * Sử dụng Flyweight designer pattern
 */
declare(strict_types=1);
namespace DesignPatterns\Structural\Flyweight;

// Flyweight: chỉ lưu dữ liệu chung

class TreeType{
    public function __construct(
        public string $type,
        public string $color,
        public string $texture,
    ){}

    public function draw(int $x, int $y) {
        echo "Vẽ cây {$this->type} màu {$this->color} tại ({$x}, {$y})<br>";
    }
}
class Tree{
    public function __construct(
        private int $x,
        private int $y,
        private TreeType $type
    )
    {}

    public function draw() {
        $this->type->draw($this->x, $this->y);
    }
}

// Flyweight Factory: quản lý và tái sử dụng TreeType

class TreeFactory {

    // biến dùng chung
    private static array $treeTypes = [];

    public static function getTreeType(string $type, string $color, string $texture): TreeType {
        $key = md5($type.$color.$texture);
        if (!isset(self::$treeTypes[$key])) {
            self::$treeTypes[$key] = new TreeType($type, $color, $texture);
        }
        return self::$treeTypes[$key];
    }
}

// client code
// Giả sử có 1 triệu cây, mỗi cây đều lưu type, color, texture → rất tốn bộ nhớ

$trees = [];
$before = memory_get_usage();
$beforeTime = microtime(true);
for ($i = 0; $i < 4000; $i++) {
    $type = TreeFactory::getTreeType("Oak", "Green", "Rough");
    $trees[] = new Tree(rand(0,100), rand(0,100), $type);
}
$afterTime = microtime(true);
$after = memory_get_usage();

echo "Bộ nhớ object Tree chiếm khoảng: " . ($after - $before) . " bytes<br>";
echo "Thời gian: " . ($afterTime - $beforeTime) . " giây<br>";

foreach ($trees as $tree) {
    $tree->draw();
}