<?php

namespace Src\Controllers\Api;

use Src\Models\Product;

class ProductController
{
    private static ?ProductController $productController = null;
    private function __construct()
    {
    }

    /**
     * @return ProductController|null
     */
    public static function gI(): ?ProductController
    {
        if (self::$productController == null){
            self::$productController = new ProductController();
        }
        return self::$productController;
    }

    /**
     * Display list product
     *
     * @param $page
     */
    public function list($page = 0)
    {
        $productModel = new Product();
        $products = $productModel->list($page);
        echo json_encode($products);
    }

    /**
     * Display a product by id
     *
     * @param int $id
     */
    public function get(int $id)
    {
        $productModel = new Product();
        $product = $productModel->getById($id);
        echo json_encode($product);
    }

    /**
     * Update product
     *
     */
    public function update()
    {
        $id = $_POST['id'];
        $image = null;
        if ($_FILES['image']['name']){
            $image =  uploadImage();
        }else{
            $image = $_POST['image_old'];
        }
        $name = $_POST['name'];
        $price = (int)$_POST['price'];
        $description = $_POST['description'];

        $productModel = new Product();
        $result =  $productModel->update($id,$name,$price,$description,$image);

        echo $result;
    }

    /**
     * Handle delete product
     *
     */
    public function delete()
    {
        $id = $_POST['id'] ?? null;
        if ($id){
            $productModel = new Product();
            $result = $productModel->destroy($id);

            echo $result;
        }
        echo 403;
    }
}