<?php

require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<h2>Route Diagnostics</h2>";
echo "<pre>";

// Get all registered routes
$routes = app('router')->getRoutes();
echo "Total routes: " . count($routes) . "\n\n";

foreach ($routes as $route) {
    $methods = implode(',', $route->methods());
    $uri = $route->uri();
    $name = $route->getName() ?? 'unnamed';
    $action = $route->getActionName();
    echo "[$methods] $uri ($name) -> $action\n";
}

echo "\n\n<h3>Request URI:</h3>\n";
echo 'REQUEST_URI: ' . ($_SERVER['REQUEST_URI'] ?? 'N/A') . "\n";
echo 'SCRIPT_NAME: ' . ($_SERVER['SCRIPT_NAME'] ?? 'N/A') . "\n";
echo 'PHP_SELF: ' . ($_SERVER['PHP_SELF'] ?? 'N/A') . "\n";

echo "\n\n<h3>Config:</h3>\n";
echo 'APP_URL: ' . config('app.url') . "\n";
echo 'APP_ENV: ' . config('app.env') . "\n";
echo 'APP_DEBUG: ' . (config('app.debug') ? 'true' : 'false') . "\n";
echo 'DB_DATABASE: ' . config('database.connections.mysql.database') . "\n";

echo "</pre>";
