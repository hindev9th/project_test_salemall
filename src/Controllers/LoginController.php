<?php
declare(strict_types=1);
namespace Src\Controllers;

use Src\Models\User;

class LoginController
{
    private static ?LoginController $loginController = null;
    private function __construct()
    {

    }

    public static function gI(): LoginController
    {
        if (self::$loginController == null) {
            self::$loginController = new LoginController();
        }
        return self::$loginController;
    }

    public function admin()
    {
        return require_once 'resources/views/admin/auth/login.php';
    }

    public function index()
    {
        return require_once 'resources/views/frontend/login.php';
    }
    public function login()
    {
        $email = preg_replace('/\s+/', '', $_POST['email'] ?? '');
        $password = preg_replace('/\s+/', '', $_POST['password'] ?? '');

        $user = new User();
        $data = $user->login($email, $password);
        if ($data === 200) {
            redirectBack();
        }
        redirect('/login');
    }

    public function logoutAdmin()
    {
        if (auth()){
            $user = new User();
            $user->logout();
        }
        redirect('/');
    }
}