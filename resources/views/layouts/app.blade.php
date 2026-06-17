<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Artofex — Architectural Studio')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-cream text-ink font-sans antialiased">

    <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-cream/95 backdrop-blur-sm shadow-sm">
        <div class="max-w-7xl mx-auto px-8 lg:px-12">
            <div class="flex items-center justify-between h-20">
                <a href="{{ url('/') }}" class="font-serif text-2xl tracking-wider font-semibold">ARTOFEX</a>
                <nav class="hidden md:flex gap-10 text-xs uppercase tracking-[0.2em] font-medium">
                    <a href="{{ url('/') }}" class="hover:text-bronze transition-colors duration-200">Home</a>
                    <a href="{{ url('/projects') }}" class="hover:text-bronze transition-colors duration-200">Projects</a>
                    <a href="{{ url('/about') }}" class="hover:text-bronze transition-colors duration-200">About</a>
                    <a href="{{ url('/contact') }}" class="hover:text-bronze transition-colors duration-200">Contact</a>
                </nav>
                <button id="mobile-menu-btn" class="md:hidden p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <div id="mobile-menu" class="fixed inset-0 z-40 bg-cream transform translate-x-full transition-transform duration-300 md:hidden">
        <div class="flex flex-col items-center justify-center h-full gap-10 text-lg uppercase tracking-[0.2em]">
            <a href="{{ url('/') }}" class="hover:text-bronze transition-colors">Home</a>
            <a href="{{ url('/projects') }}" class="hover:text-bronze transition-colors">Projects</a>
            <a href="{{ url('/about') }}" class="hover:text-bronze transition-colors">About</a>
            <a href="{{ url('/contact') }}" class="hover:text-bronze transition-colors">Contact</a>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="bg-ink text-cream">
        <div class="max-w-7xl mx-auto px-8 lg:px-12 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="font-serif text-2xl tracking-wider mb-4">ARTOFEX</h3>
                    <p class="text-cream/60 text-sm leading-relaxed">Designing spaces that inspire. Architecture that endures.</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-[0.2em] mb-4 font-medium">Navigation</h4>
                    <div class="flex flex-col gap-3 text-sm text-cream/60">
                        <a href="{{ url('/') }}" class="hover:text-bronze transition-colors">Home</a>
                        <a href="{{ url('/projects') }}" class="hover:text-bronze transition-colors">Projects</a>
                        <a href="{{ url('/about') }}" class="hover:text-bronze transition-colors">About</a>
                        <a href="{{ url('/contact') }}" class="hover:text-bronze transition-colors">Contact</a>
                    </div>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-[0.2em] mb-4 font-medium">Contact</h4>
                    <div class="text-sm text-cream/60 space-y-2">
                        <p>info@artofexstudio.com</p>
                        <p>+1 (555) 000-0000</p>
                    </div>
                </div>
            </div>
            <div class="mt-16 pt-8 border-t border-cream/10 text-center text-xs text-cream/40 uppercase tracking-widest">
                &copy; {{ date('Y') }} Artofex Architectural Studio. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        const header = document.getElementById('header');
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        let mobileOpen = false;
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 50) {
                header.classList.add('shadow-md');
            } else {
                header.classList.remove('shadow-md');
            }
        });

        mobileBtn.addEventListener('click', () => {
            mobileOpen = !mobileOpen;
            if (mobileOpen) {
                mobileMenu.classList.remove('translate-x-full');
            } else {
                mobileMenu.classList.add('translate-x-full');
            }
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileOpen = false;
                mobileMenu.classList.add('translate-x-full');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

            document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        });
    </script>

    @stack('scripts')

</body>
</html>
