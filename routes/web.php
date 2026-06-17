<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])
    ->middleware('throttle:5,1')
    ->name('contact.send');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/run-setup', function () {
    try {
        $output = [];
        $output[] = 'Migrating...';
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $output[] = \Illuminate\Support\Facades\Artisan::output();

        $output[] = 'Caching config...';
        \Illuminate\Support\Facades\Artisan::call('config:cache');
        $output[] = \Illuminate\Support\Facades\Artisan::output();

        $output[] = 'Caching routes...';
        \Illuminate\Support\Facades\Artisan::call('route:cache');
        $output[] = \Illuminate\Support\Facades\Artisan::output();

        $output[] = 'Caching views...';
        \Illuminate\Support\Facades\Artisan::call('view:cache');
        $output[] = \Illuminate\Support\Facades\Artisan::output();

        $output[] = 'Storage link...';
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $output[] = \Illuminate\Support\Facades\Artisan::output();

        return nl2br(implode("\n", $output));
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});