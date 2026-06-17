<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SetupController extends Controller
{
    public function run()
    {
        $output = [];
        $output[] = 'Migrating...';
        Artisan::call('migrate', ['--force' => true]);
        $output[] = Artisan::output();

        $output[] = 'Caching config...';
        Artisan::call('config:cache');
        $output[] = Artisan::output();

        $output[] = 'Caching routes...';
        Artisan::call('route:cache');
        $output[] = Artisan::output();

        $output[] = 'Caching views...';
        Artisan::call('view:cache');
        $output[] = Artisan::output();

        $output[] = 'Storage link...';
        Artisan::call('storage:link');
        $output[] = Artisan::output();

        return nl2br(implode("\n", $output));
    }
}
