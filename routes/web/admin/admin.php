<?php

use Src\Controllers\admin\HomeController;
use Src\Controllers\LoginController;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/admin':
        routeLogout();
        $home = new HomeController();
        $home->index();
        setFound(true);
        break;
    case '/admin/login':
        routeLogged();
        LoginController::gI()->admin();
        setFound(true);
        break;
    case '/admin/login/in':
        routeLogged();
        LoginController::gI()->login();
        setFound(true);
        break;
    case '/logout':
        LoginController::gI()->logoutAdmin();
        setFound(true);
        break;
}