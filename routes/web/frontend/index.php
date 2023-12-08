<?php

use Src\Controllers\HomeController;
use Src\Controllers\LoginController;
use Src\Controllers\ProductController;
use Src\Controllers\RegisterController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        HomeController::gI()->index(0);
        setFound(true);
        break;
    case '/login':
        routeLogged();
        LoginController::gI()->index();
        setFound(true);
        break;
    case '/login/in':
        routeLogged();
        LoginController::gI()->login();
        setFound(true);
        break;
    case '/register':
        routeLogged();
        RegisterController::gI()->index();
        setFound(true);
        break;
    case '/register/in':
        routeLogged();
        RegisterController::gI()->register();
        setFound(true);
        break;
}

// product/{id}
if (preg_match('/\/product\/(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $id = $matches[1];
        ProductController::gI()->index($id);
    } else {
        redirectBack();
    }
    setFound(true);
}

// ?page={index}
if (preg_match('/\/\?page=(\d+)/', $request, $matches)){
    if (isset($matches[1])) {
        $number = $matches[1];
        HomeController::gI()->index($number);
    } else {
        HomeController::gI()->index(0);
    }
    setFound(true);
}