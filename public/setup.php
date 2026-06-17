<?php

// Bootstrap Laravel
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$output = [];
$errors = [];

// 1. Check DB connection
try {
    DB::connection()->getPdo();
    $output[] = '✅ Database connected successfully';
} catch (\Exception $e) {
    $errors[] = '❌ Database connection failed: ' . $e->getMessage();
}

// 2. If DB works, run migrations
if (empty($errors)) {
    try {
        Artisan::call('migrate', ['--force' => true]);
        $output[] = '✅ Migrations run';
    } catch (\Exception $e) {
        $errors[] = '❌ Migrations failed: ' . $e->getMessage();
    }
}

// 3. Cache everything
try {
    Artisan::call('config:cache');
    $output[] = '✅ Config cached';
} catch (\Exception $e) {
    $errors[] = '❌ Config cache failed: ' . $e->getMessage();
}

try {
    Artisan::call('route:cache');
    $output[] = '✅ Routes cached';
} catch (\Exception $e) {
    // Route cache may fail if closure routes exist, that's ok
    $output[] = '⚠️ Route cache skipped (non-serializable routes)';
}

try {
    Artisan::call('view:cache');
    $output[] = '✅ Views cached';
} catch (\Exception $e) {
    $errors[] = '❌ View cache failed: ' . $e->getMessage();
}

try {
    Artisan::call('storage:link');
    $output[] = '✅ Storage link created';
} catch (\Exception $e) {
    $output[] = '⚠️ Storage link already exists or failed';
}

// Show results
echo '<h2>Deployment Setup</h2>';
echo '<h3>Success:</h3><ul>';
foreach ($output as $line) {
    echo '<li>' . htmlspecialchars($line) . '</li>';
}
echo '</ul>';

if ($errors) {
    echo '<h3 style="color:red;">Errors:</h3><ul>';
    foreach ($errors as $line) {
        echo '<li style="color:red;">' . htmlspecialchars($line) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p style="color:green;font-size:18px;"><strong>✅ Setup complete!</strong></p>';
    echo '<p><a href="/" target="_blank">Go to site →</a></p>';
}
