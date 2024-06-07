<?php

namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Product;

class DashboardController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function dashboard()
    {

        $productCountByCategory = $this->getProductCountByCategory(); 
        // Helper::debug($productCountByCategory);
        $this->renderViewAdmin('dashboard', [
            'productCountByCategory' => $productCountByCategory 
        ]);
    }

    private function getProductCountByCategory()
    {
        return $this->product->countProductByCategory();
    }
}