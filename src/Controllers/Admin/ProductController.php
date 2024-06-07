<?php

namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Product;
use Ductong\XuongOop\Models\Category;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5; // Or any desired number of products per page
    
        $result = $this->product->paginate($page, $perPage);
        // Helper::debug($result);
        $this->renderViewAdmin('products.index', [
            'products' => $result['data'],
            'totalPage' => $result['totalPage'],
            'currentPage' => $result['currentPage'],
            'totalRecords' => $result['totalRecords']
        ]);

    }
    
    

    public function create()
    {
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('products.create', [
            'categoryPluck' => $categoryPluck
        ]);
    }

    public function store()
    {
        // Validation (Enhanced)
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id'     => 'required',
            'name'            => 'required|max:100',
            'overview'        => 'max:500',
            'content'         => 'max:65000',
            'img_thumbnail'   => 'uploaded_file:0,2048K,png,jpeg,jpg',
            'price_regular'   => 'required|numeric',
            'price_sale'      => 'nullable|numeric|lte:price_regular' // Optional, less than or equal to price_regular
        ]);
        $validation->validate();
    
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            // Data Preparation (Including New Fields)
            $data = [
                'category_id'  => $_POST['category_id'],
                'name'         => $_POST['name'],
                'overview'     => $_POST['overview'],
                'content'      => $_POST['content'],
                'price_regular' => $_POST['price_regular'], // Add regular price
                'price_sale'   => $_POST['price_sale'] ?? null, // Add sale price (nullable)
            ];
    
            // Image Handling (Unchanged)
            if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {
                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to   = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];
    
                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';
                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }
    
            // Insert Product (Unchanged)
            $this->product->insert($data);
    
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
            header('Location: ' . url('admin/products'));
            exit;
        }
    }
    

    public function show($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewAdmin('products.show', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $product = $this->product->findByID($id);
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('products.edit', [
            'product' => $product,
            'categoryPluck' => $categoryPluck,
        ]);
    }

    public function update($id)
    {
        $product = $this->product->findByID($id);
    
        // Validation (Enhanced)
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id'     => 'required',
            'name'            => 'required|max:100',
            'overview'        => 'max:500',
            'content'         => 'max:65000',
            'img_thumbnail'   => 'uploaded_file:0,2048K,png,jpeg,jpg',
            'price_regular'   => 'required',
            'price_sale'      => 'nullable'
        ]);
        $validation->validate();
    
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url("admin/products/$id/edit"));
            exit;
        } else {
            // Data Preparation (Including New Fields)
            $data = [
                'category_id'  => $_POST['category_id'],
                'name'         => $_POST['name'],
                'overview'     => $_POST['overview'],
                'content'      => $_POST['content'],
                'price_regular' => $_POST['price_regular'], // Add regular price
                'price_sale'   => $_POST['price_sale'] ?? null, // Add sale price (nullable)
                'updated_at'   => date('Y-m-d H:i:s'),
            ];
    
            // Image Handling (Enhanced)
            if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {
                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to   = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];
    
                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    // Delete old image only if the new upload is successful
                    if ($product['img_thumbnail'] && file_exists(PATH_ROOT . $product['img_thumbnail'])) {
                        unlink(PATH_ROOT . $product['img_thumbnail']);
                    }
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';
                    header('Location: ' . url("admin/products/$id/edit"));
                    exit;
                }
            }
    
            // Update Product (Unchanged)
            $this->product->update($id, $data);
    
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
            header('Location: ' . url("admin/products/$id/edit"));
            exit;
        }
    }
    

    public function delete($id)
    {
        try {
            $product = $this->product->findByID($id);

            $this->product->delete($id);

            if ($product['img_thumbnail'] && file_exists(PATH_ROOT . $product['img_thumbnail'])) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/products'));
        exit();
    }


}
