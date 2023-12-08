<?php

namespace Src\Controllers;

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
     * @param int $id
     * @return mixed
     */
    public function index(int $id)
    {
        $productModel = new Product();

        $product = $productModel->show($id);

        return require_once 'resources/views/frontend/product.php';
    }
}