<?php

// Website có các trang là:
//      Trang chủ
//      Giới thiệu
//      Sản phẩm
//      Chi tiết sản phẩm
//      Liên hệ

// Để định nghĩa được, điều đầu tiên làm là phải tạo Controller trước
// Tiếp theo, khai function tương ứng để xử lý
// Bước cuối, định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use Ductong\XuongOop\Controllers\Client\AboutController;
use Ductong\XuongOop\Controllers\Client\ContactController;
use Ductong\XuongOop\Controllers\Client\HomeController;
use Ductong\XuongOop\Controllers\Client\LoginController;
use Ductong\XuongOop\Controllers\Client\ProductController;

$router->get( '/',                  HomeController::class       . '@index');
$router->get( '/about',             AboutController::class      . '@index');

$router->get( '/contact',           ContactController::class    . '@index');
$router->post( '/contact/store',    ContactController::class    . '@store');

$router->get( '/products',          HomeController::class    . '@shop');
$router->get( '/products/{id}',     HomeController::class    . '@detail');

$router->get( '/login',             LoginController::class    . '@showFormLogin');
$router->post( '/handle-login',     LoginController::class    . '@login');
$router->get( '/logout',            LoginController::class    . '@logout');