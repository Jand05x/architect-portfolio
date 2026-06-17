<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | Artofex</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-cream text-ink font-sans antialiased min-h-screen flex items-center justify-center px-4">

    <div class="text-center max-w-lg">
        <p class="font-serif text-8xl md:text-9xl text-ink/20 mb-4">404</p>
        <div class="w-16 h-px bg-bronze mx-auto mb-8"></div>
        <h1 class="font-serif text-2xl md:text-3xl mb-4">Page Not Found</h1>
        <p class="text-ink/60 leading-relaxed mb-10">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <a href="{{ url('/') }}" class="inline-block uppercase tracking-[0.25em] text-xs bg-ink text-cream px-10 py-4 hover:bg-bronze transition-colors duration-300">
            Back to Home
        </a>
    </div>

</body>
</html>
