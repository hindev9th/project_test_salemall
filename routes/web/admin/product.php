<?php
use Src\Controllers\admin\ProductController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/admin/product':
        routeLogout();
        ProductController::gI()->index(0);
        setFound(true);
        break;
    case '/admin/product/create':
        routeLogout();
        ProductController::gI()->create();
        setFound(true);
        break;
    case '/admin/product/store':
        routeLogout();
        ProductController::gI()->store();
        setFound(true);
        break;
    case '/admin/product/destroy':
        routeLogout();
        ProductController::gI()->destroy();
        setFound(true);
        break;
}
if (preg_match('/\/admin\/product\?page=(\d+)/', $request, $matches)){
    routeLogout();
    if (isset($matches[1])) {
        $number = $matches[1];
        ProductController::gI()->index($number);
    } else {
        ProductController::gI()->index(0);
    }
    setFound(true);
}
if (preg_match('/\/admin\/product\/edit\/(\d+)/', $request, $matches)){
    routeLogout();
    if (isset($matches[1])) {
        $number = $matches[1];
        ProductController::gI()->edit($number);
    } else {
        ProductController::gI()->index(0);
    }
    setFound(true);
}
if (preg_match('/\/admin\/product\/update\/(\d+)/', $request, $matches)){
    routeLogout();
    if (isset($matches[1])) {
        $id = $matches[1];
        ProductController::gI()->update($id);
    } else {
        ProductController::gI()->index(0);
    }
    setFound(true);
}