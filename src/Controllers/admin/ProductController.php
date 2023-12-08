<?php

namespace Src\Controllers\admin;

use Src\Models\Product;
use Src\Models\User;

class ProductController
{
    /**
     * @var ProductController|null
     */
    private static ?ProductController $productController = null;
    private function __construct()
    {
    }

    /**
     * @return ProductController|null
     */
    public static function gI()
    {
        if (self::$productController == null){
            self::$productController = new ProductController();
        }
        return self::$productController;
    }

    /**
     * Display products
     *
     * @param int $page
     * @return void
     */
    public function index(int $page)
    {
        $productModel = new Product();
        $products = $productModel->index($page);
        $counts = $productModel->count();
        $currentPage = $page;
        require_once 'resources/views/admin/product/index.php';
    }

    /**
     * @return void
     */
    public function create()
    {
        require_once 'resources/views/admin/product/create.php';
    }

    /**
     * Handle create new product
     *
     * @return void
     */
    public function store()
    {
        $image =  uploadImage();
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $productModel = new Product();
        $result =  $productModel->store($name,$price,$description,$image);
        if ($result === 200){
            redirect('/admin/product');
        }
        redirectBack();
    }


    /**
     * Display product detail by id
     *
     * @param int $productId
     * @return void
     */
    public function edit(int $productId)
    {
        $productModel = new Product();
        $product = $productModel->show($productId);
        require_once 'resources/views/admin/product/edit.php';
    }


    /**
     * Handle update product by id
     *
     * @param int $productId
     * @return void
     */
    public function update(int $productId)
    {
        $image = $_POST['image_old'];
        if ($_FILES['image']['name']){
            $image =  uploadImage();
        }
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $productModel = new Product();
        $result =  $productModel->update($productId,$name,$price,$description,$image);
        if ($result > 0){
            redirect('/admin/product');
        }
        redirectBack();
    }

    /**
     * Handle delete product
     *
     * @return void
     */
    public function destroy()
    {
        $id = $_POST['id'] ?? null;
        if ($id){
            $productModel = new Product();
            $result = $productModel->destroy($id);
            if ($result > 0){
                redirect('/admin/product');
            }
        }
        redirectBack();
    }
}