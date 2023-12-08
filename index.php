<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/HO_CHI_MINH");
session_start();

$isFound = false;
function setFound(bool $is)
{
    $GLOBALS['isFound'] = $is;
}

require __DIR__ . '/vendor/autoload.php';

if (!$isFound){
    http_response_code(404);
    require __DIR__.'/resources/views/Error/404.php';
}