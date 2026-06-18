<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class SetupController extends Controller
{
    public function run(Request $request)
    {
        $token = $request->query('token');
        $expected = env('SETUP_TOKEN');

        if (!$token || !$expected || !hash_equals($expected, $token)) {
            abort(404);
        }

        $results = [];

        $results[] = $this->step('Filament assets', function () {
            Artisan::call('filament:assets', ['--no-interaction' => true]);
            return trim(Artisan::output()) ?: 'Published';
        });

        $results[] = $this->step('Migrations', function () {
            Artisan::call('migrate', ['--force' => true]);
            return trim(Artisan::output()) ?: 'Done';
        });

        if (User::count() === 0) {
            $results[] = $this->step('Admin user', function () {
                $email = env('ADMIN_EMAIL', 'info@artofexstudio.com');
                $password = env('ADMIN_PASSWORD', 'password');
                User::create([
                    'name' => 'Admin',
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
                return "Created: {$email} / {$password}";
            });
        } else {
            $results[] = ['label' => 'Admin user', 'status' => 'Skipped — user already exists'];
        }

        Artisan::call('optimize:clear');

        return view('setup', ['results' => $results]);
    }

    private function step(string $label, callable $fn): array
    {
        try {
            $output = $fn();
            return ['label' => $label, 'status' => 'OK', 'output' => $output];
        } catch (\Throwable $e) {
            return ['label' => $label, 'status' => 'ERROR', 'output' => $e->getMessage()];
        }
    }
}
