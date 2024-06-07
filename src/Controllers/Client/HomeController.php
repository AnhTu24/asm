<?php 

namespace Ductong\XuongOop\Controllers\Client;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Category;
use Ductong\XuongOop\Models\Product;

class HomeController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index() {
        $name = 'DucTV44';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 4; // Or any desired number of products per page
    
        $result = $this->product->paginate($page, $perPage);
        // Helper::debug($result);
        $this->renderViewClient('home', [
            'name' => $name,
            'products' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords']
        ]);
    }

    public function shop()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 4; // Or any desired number of products per page
    
        $result = $this->product->paginate($page, $perPage);
        // Helper::debug($result);
        $this->renderViewClient('shop', [
            'products' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords']
        ]);

    }

    public function detail($id){
        $product = $this->product->findByID($id);
        // Helper::debug($product);
        $this->renderViewClient('detail', [
            'product' => $product
        ]);
    }

}