<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/vendor/autoload.php';

// Some Apache configurations (e.g. ErrorDocument) lose the original URL
// Restore it from server variables if needed
$uri = $_SERVER['REQUEST_URI'] ?? '/';
if ($uri === '/' || $uri === '/index.php') {
    if (!empty($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] !== '/index.php') {
        $_SERVER['REQUEST_URI'] = $_SERVER['REDIRECT_URL'];
    } elseif (!empty($_SERVER['REDIRECT_SCRIPT_URL'])) {
        $_SERVER['REQUEST_URI'] = $_SERVER['REDIRECT_SCRIPT_URL'];
    }
}

$app = require_once __DIR__.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
