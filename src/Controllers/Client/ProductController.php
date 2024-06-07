<?php 

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;

class ProductController extends Controller
{
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function detail($id) {
        echo __CLASS__ . '@' . __FUNCTION__ . '@' . $id;
    }
}