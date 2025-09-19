<?php

/**
 * Giả sử bạn có một hệ thống quản lý người dùng với các loại nhân viên như:
 * Admin: có quyền truy cập toàn bộ hệ thống
 * Manager: có quyền quản lý nhân viên cấp dưới
 * Staff: chỉ có quyền xem thông tin cá nhân
 * 
 * 
 * Ví dụ về sự vi phạm nguyên tắc LSP
 */

class User
{
    public function accessDashboard()
    {
        echo "OK";
    }
}

class Staff extends User
{
    public function accessDashboard()
    {
        throw new Exception("Access Deny");
    }
}

// function check permision
function check(User $u)
{
    $u->accessDashboard();
}

// client code
$staff = new Staff();
/**
 * Ở đây, Staff là lớp con của User nhưng lại phá vỡ hành vi mong đợi của accessDashboard(). 
 * Điều này khiến việc thay thế User bằng Staff trở nên nguy hiểm.
 */
check($staff); // error
