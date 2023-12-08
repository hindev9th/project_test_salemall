<?php
declare(strict_types=1);
namespace Src\Controllers;

use Src\Models\Product;

class HomeController
{
    private static ?HomeController $homeController = null;
    private function __construct()
    {
    }

    public static function gI()
    {
        if (self::$homeController == null){
            self::$homeController = new HomeController();
        }
        return self::$homeController;
    }
    public function index(int $page)
    {
        $productModel = new Product();
        $products = $productModel->index($page);
        $counts = $productModel->count();
        $current_page = $page;

        return require_once 'resources/views/frontend/index.php';
    }
}