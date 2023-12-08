<?php

use Src\Controllers\Api\ProductController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/api/v1/product/list':
        ProductController::gI()->list();
        setFound(true);
        break;
    case '/api/v1/product/update':
        ProductController::gI()->update();
        setFound(true);
        break;
    case '/api/v1/product/delete':
        ProductController::gI()->delete();
        setFound(true);
        break;
}

if (preg_match('/\/api\/v1\/product\/list\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        ProductController::gI()->list($number);
    }
    setFound(true);
}

// product/{id}
if (preg_match('/\/api\/v1\/product\/get\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        ProductController::gI()->get($number);
    }
    setFound(true);
}