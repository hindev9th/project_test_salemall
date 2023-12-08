<?php
require_once 'config/Config.php';
/**
 * get base url in config
 * @return string
 */
if (!function_exists('getBaseUrl')) {
    function getBaseUrl(): string
    {
        return \config\Config::gI()->getBaseUrl();
    }
}

/**
 * redirect page
 * @param string $to
 * @return void
 */
if (!function_exists('redirect')) {
    function redirect(string $to)
    {
        echo "<script type='text/javascript'>
           window.location = '{$to}';
            </script>";
    }
}
/**
 * redirect before page
 * @param string $to
 * @return void
 */
if (!function_exists('redirectBack')) {
    function redirectBack()
    {
        echo "<script type='text/javascript'>
           history.go(-1);
            </script>";
    }
}
/**
 * Get data user login
 *
 * @return mixed
 */
if (!function_exists('auth')) {
    function auth()
    {
        return $_SESSION['user'] ?? false;
    }
}

if (!function_exists('getAuth')) {
    function getAuth()
    {
        return unserialize($_SESSION['user']);
    }
}

/**
 * Set data user login
 *
 * @param \Src\Models\User $user
 * @return \Src\Models\User
 */
if (!function_exists('setAuth')) {
    function setAuth(\Src\Entities\User $user)
    {
        return $_SESSION['user'] = serialize($user);
    }
}

/**
 * Check login and redirect
 *
 * @return void
 */
if (!function_exists('routeLogged')) {
    function routeLogged()
    {
        if (auth()) {
            redirect('/');
        }
    }
}



/**
 * Check logout and redirect to login page
 *
 * @return void
 */
if (!function_exists('routeLogout')) {
    function routeLogout()
    {
        if (!auth()) {
            redirect('/login');
        }
    }
}

/**
 * Remove session has key name is user
 *
 * @return true
 */
if (!function_exists('logout')) {
    function logout(): bool
    {
        unset($_SESSION['user']);
        return true;
    }
}

/**
 * Add files assets
 *
 * @param string $path
 */
if (!function_exists('asset')) {
    function asset(string $path)
    {
        echo getBaseUrl() . 'resources/' . $path;
    }
}

/**
 * @return string
 */
if (!function_exists('uploadImage')) {
    function uploadImage(): ?string
    {
        $name = null;
        if (isset($_FILES['image']['name'])){
            $name = time().$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'resources/images/products/'.$name);
        }
        return $name;
    }
}

