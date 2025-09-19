<?php

interface Accessible {
    public function accessDashboard(): void;
}

class Admin implements Accessible {
    public function accessDashboard(): void {
        echo "Admin accessing dashboard\n";
    }
}

class Manager implements Accessible {
    public function accessDashboard(): void {
        echo "Manager accessing dashboard\n";
    }
}

class Staff {
    public function viewProfile(): void {
        echo "Staff viewing profile\n";
    }
}


// client code
function showDashboard(Accessible $user) {
    $user->accessDashboard();
}

$admin = new Admin();
$manager = new Manager();
$staff = new Staff();

showDashboard($admin);   // ✅ OK
showDashboard($manager); // ✅ OK

//staff
$staff->viewProfile();
// showDashboard($staff); // không thể gọi bởi staff ko implement Accessible

/**
 * 
 */
/**
 * showDashboard($staff); // ❌ Không được phép – đúng thiết kế -- 
 * không thể gọi hàm này tại staff không thuộc các nhóm được phép showDashboard theo thiết kế hệ thông
 * từ đây suy ra LSP chú trọng tới việc tránh mọi lớp phải implement những thứ ko phù hợp
 */

