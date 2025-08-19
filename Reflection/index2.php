<?php
/**
 * truong hop khong su dung Reflection
 */

// gia su 

class UserRepository {
    public function __construct()
    {
        
    }
    public function findById($id) {
        return "User #" . $id;
    }
}

class UserService{
    private UserRepository $repository;
    public function __construct( UserRepository $repository) {
        $this->repository = $repository;
    }
    public function getUser($id){
        return $this->repository->findById($id);
    }
}

/**
 * class UserController  phu thuoc vao UserService 
 */
class UserController{
    private UserService $service;
    public function __construct( UserService $service) {
        $this->service = $service;
    }

    public function show($id){
        // thong qua 1 class khac
        return $this->service->getUser($id);
    }
}

// test -- sẽ phải tạo rất nhiều instance

// $repository = new UserRepository();
// $service = new UserService($repository);
// $controller = new UserController($service);
// echo $controller->show(1);

/**
 * Dùng Reflection để tự động Inject (tiêm phụ thuộc vào)
 */

class Container{
    public function resolve($class){
        // tạo ánh xạ lớp
        $reflector = new ReflectionClass($class);

        // kiem tra class da duoc khoi tao chua
        $constructor = $reflector->getConstructor();
        if(is_null($constructor)){
            return new $class;
        }

        // get all param in constructor method
        $params = $constructor->getParameters();

        // chuan bi dependencies (class phu thuoc)
        $dependencies = [];
        
        foreach ($params as $param) {
            $type = $param->getType();

            if ($type && !$type->isBuiltin()) {
                // Nếu parameter là 1 class → resolve tiếp (đệ quy)
                $dependencies[] = $this->resolve($type->getName());
            }
        }

        // Khởi tạo class với dependency đã resolve
        return $reflector->newInstanceArgs($dependencies);
    }
}

// test Reflection
// Sử dụng Container
$container = new Container();
$service = $container->resolve(UserController::class);

echo $service->show(10); // User #10
