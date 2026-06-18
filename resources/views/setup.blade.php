<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup — ARTOFEX</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #E8DDD3; color: #3D4F3F;
            display: flex; align-items: center; justify-content: center;
            min-height: 100vh; padding: 2rem;
        }
        .card {
            background: #fff; border-radius: 12px; padding: 2rem;
            max-width: 640px; width: 100%; box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        h1 { font-size: 1.5rem; margin-bottom: 0.25rem; }
        p { color: #666; margin-bottom: 1.5rem; }
        .step { display: flex; align-items: flex-start; gap: 0.75rem; padding: 0.75rem 0; border-bottom: 1px solid #eee; }
        .step:last-child { border-bottom: none; }
        .badge {
            flex-shrink: 0; font-size: 0.75rem; font-weight: 600; padding: 0.2rem 0.6rem;
            border-radius: 4px; text-transform: uppercase; margin-top: 0.1rem;
        }
        .badge-ok { background: #d4edda; color: #155724; }
        .badge-error { background: #f8d7da; color: #721c24; }
        .badge-skip { background: #fff3cd; color: #856404; }
        .label { font-weight: 500; }
        .output { font-size: 0.8125rem; color: #666; margin-top: 0.25rem; word-break: break-all; }
        .success-msg { background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-top: 1.5rem; }
        .admin-msg { background: #fff3cd; color: #856404; padding: 1rem; border-radius: 8px; margin-top: 1rem; font-size: 0.875rem; }
        .btn {
            display: inline-block; margin-top: 1.5rem; padding: 0.75rem 1.5rem;
            background: #3D4F3F; color: #E8DDD3; text-decoration: none;
            border-radius: 8px; font-weight: 500;
        }
        .btn:hover { background: #4D6B50; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Setup</h1>
        <p>{{ count($results) }} step(s) completed</p>

        @foreach ($results as $result)
            <div class="step">
                <span class="badge badge-{{ $result['status'] === 'OK' ? 'ok' : ($result['status'] === 'ERROR' ? 'error' : 'skip') }}">
                    {{ $result['status'] }}
                </span>
                <div>
                    <div class="label">{{ $result['label'] }}</div>
                    @if (!empty($result['output']))
                        <div class="output">{{ $result['output'] }}</div>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="success-msg">
            ✅ Setup complete. You can now <a href="/admin/login" style="color:#155724;font-weight:600;">log in at /admin</a>.
        </div>

        <div class="admin-msg">
            ⚠️ For security, delete <code>SETUP_TOKEN</code> from your <code>.env</code> file or change
            the <code>/run-setup</code> route after setup is done. Do not leave this endpoint accessible.
        </div>

        <a href="/admin/login" class="btn">Go to Admin →</a>
    </div>
</body>
</html>