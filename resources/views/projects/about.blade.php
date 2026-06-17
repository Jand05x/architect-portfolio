@extends('layouts.app')

@section('title', 'About — Artofex Architectural Studio')

@section('content')

{{-- Hero --}}
<section class="relative py-32 md:py-40 px-8 lg:px-12 bg-cream-dark">
    <div class="max-w-4xl mx-auto text-center">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-stone"></span>
            <span class="text-bronze text-sm">&#10022;</span>
            <span class="h-px w-12 bg-stone"></span>
        </div>
        <h1 class="font-serif text-4xl md:text-5xl mb-6">About Artofex</h1>
        <p class="text-ink-light/70 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
            Where architectural vision becomes reality.
        </p>
    </div>
</section>

{{-- Our Story --}}
<section class="py-24 md:py-32 px-8 lg:px-12 max-w-4xl mx-auto animate-on-scroll">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="font-serif text-3xl mb-6">Our Story</h2>
            <div class="w-12 h-px bg-bronze mb-8"></div>
            <p class="text-ink/75 leading-relaxed mb-6">
                Founded with a singular vision — to create architecture that moves people — Artofex has grown from a small studio into an award-winning practice known for its bold, thoughtful designs.
            </p>
            <p class="text-ink/75 leading-relaxed">
                Every project begins with listening. We believe the best architecture emerges from a deep understanding of context, culture, and the human experience. Our team brings decades of combined expertise to every commission, from intimate residences to large-scale urban developments.
            </p>
        </div>
        <div class="aspect-[3/4] bg-stone-light/50 overflow-hidden">
            <img src="{{ asset('images/hero-placeholder.jpeg') }}" alt="Artofex Studio" class="w-full h-full object-cover" onerror="this.parentElement.style.display='none'">
        </div>
    </div>
</section>

{{-- Philosophy --}}
<section class="bg-ink text-cream py-24 md:py-32 px-8 lg:px-12 animate-on-scroll">
    <div class="max-w-4xl mx-auto text-center">
        <svg class="w-8 h-8 mx-auto mb-8 text-bronze/60" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
        </svg>
        <blockquote class="font-serif text-2xl md:text-3xl leading-relaxed mb-8 text-cream/90">
            We don't just design buildings. We craft environments where people thrive, communities connect, and beauty serves a purpose.
        </blockquote>
        <p class="text-xs uppercase tracking-[0.2em] text-cream/40">— Artofex Design Philosophy</p>
    </div>
</section>

{{-- Values --}}
<section class="py-24 md:py-32 px-8 lg:px-12 max-w-6xl mx-auto animate-on-scroll">
    <div class="text-center mb-16">
        <h2 class="font-serif text-3xl md:text-4xl mb-4">Our Values</h2>
        <p class="text-ink/55 text-sm max-w-md mx-auto">The principles that guide every decision we make.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center p-8 border border-stone-light/80 hover:border-bronze/40 transition-colors duration-300 group">
            <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center border border-stone-light/60 rounded-full group-hover:border-bronze/40 transition-colors">
                <svg class="w-5 h-5 text-bronze" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg mb-3">Craftsmanship</h3>
            <p class="text-ink/70 text-sm leading-relaxed">Every detail matters. We obsess over precision in every line, material, and finish.</p>
        </div>

        <div class="text-center p-8 border border-stone-light/80 hover:border-bronze/40 transition-colors duration-300 group">
            <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center border border-stone-light/60 rounded-full group-hover:border-bronze/40 transition-colors">
                <svg class="w-5 h-5 text-bronze" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg mb-3">Innovation</h3>
            <p class="text-ink/70 text-sm leading-relaxed">Pushing boundaries with new materials, technologies, and design thinking.</p>
        </div>

        <div class="text-center p-8 border border-stone-light/80 hover:border-bronze/40 transition-colors duration-300 group">
            <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center border border-stone-light/60 rounded-full group-hover:border-bronze/40 transition-colors">
                <svg class="w-5 h-5 text-bronze" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg mb-3">Sustainability</h3>
            <p class="text-ink/70 text-sm leading-relaxed">Designing for the future with eco-conscious practices and sustainable materials.</p>
        </div>

        <div class="text-center p-8 border border-stone-light/80 hover:border-bronze/40 transition-colors duration-300 group">
            <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center border border-stone-light/60 rounded-full group-hover:border-bronze/40 transition-colors">
                <svg class="w-5 h-5 text-bronze" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg mb-3">Client-Centric</h3>
            <p class="text-ink/70 text-sm leading-relaxed">Your vision drives ours. We partner closely to bring your aspirations to life.</p>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="bg-cream-dark py-24 md:py-32 px-8 lg:px-12 animate-on-scroll">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="font-serif text-3xl md:text-4xl mb-4">Our Services</h2>
            <p class="text-ink-light/60 text-sm max-w-md mx-auto">From concept to completion, we offer comprehensive architectural solutions.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="p-8 border border-stone-light/80 hover:border-bronze/30 transition-colors duration-300">
                <h3 class="font-serif text-xl mb-4">Architecture</h3>
                <p class="text-ink/75 leading-relaxed mb-4">Full-service architectural design for residential, commercial, and institutional projects. From initial concept through construction administration.</p>
                <ul class="text-sm text-ink-light/60 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Residential Design</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Commercial Buildings</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Cultural & Institutional</li>
                </ul>
            </div>

            <div class="p-8 border border-stone-light/80 hover:border-bronze/30 transition-colors duration-300">
                <h3 class="font-serif text-xl mb-4">Interior Design</h3>
                <p class="text-ink/75 leading-relaxed mb-4">Creating interiors that balance beauty with function. We design spaces that feel both intentional and effortless.</p>
                <ul class="text-sm text-ink-light/60 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Space Planning</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Material Selection</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Furniture & Lighting</li>
                </ul>
            </div>

            <div class="p-8 border border-stone-light/80 hover:border-bronze/30 transition-colors duration-300">
                <h3 class="font-serif text-xl mb-4">Urban Planning</h3>
                <p class="text-ink/75 leading-relaxed mb-4">Thoughtful master planning that creates vibrant, connected communities with lasting value.</p>
                <ul class="text-sm text-ink-light/60 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Master Plans</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Public Spaces</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Mixed-Use Development</li>
                </ul>
            </div>

            <div class="p-8 border border-stone-light/80 hover:border-bronze/30 transition-colors duration-300">
                <h3 class="font-serif text-xl mb-4">Consultation</h3>
                <p class="text-ink/75 leading-relaxed mb-4">Expert guidance for projects of all sizes. From feasibility studies to project management.</p>
                <ul class="text-sm text-ink-light/60 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Feasibility Studies</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Project Management</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Design Review</li>
                </ul>
            </div>

            <div class="p-8 border border-stone-light/80 hover:border-bronze/30 transition-colors duration-300">
                <h3 class="font-serif text-xl mb-4">BIM</h3>
                <p class="text-ink-light/60 text-xs uppercase tracking-wider mb-2">Building Information Modeling</p>
                <p class="text-ink/75 leading-relaxed mb-4">Digital representation of physical and functional characteristics for intelligent design and construction.</p>
                <ul class="text-sm text-ink-light/60 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Digital Twin Creation</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> 3D Model Coordination</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Clash Detection</li>
                </ul>
            </div>

            <div class="p-8 border border-stone-light/80 hover:border-bronze/30 transition-colors duration-300">
                <h3 class="font-serif text-xl mb-4">MEP</h3>
                <p class="text-ink-light/60 text-xs uppercase tracking-wider mb-2">Mechanical, Electrical & Plumbing</p>
                <p class="text-ink/75 leading-relaxed mb-4">Integrated building systems design ensuring efficiency, sustainability, and occupant comfort.</p>
                <ul class="text-sm text-ink-light/60 space-y-2">
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Systems Integration</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Energy Efficiency</li>
                    <li class="flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-bronze"></span> Infrastructure Planning</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 md:py-32 px-8 lg:px-12 text-center animate-on-scroll">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-stone"></span>
            <span class="text-bronze text-sm">&#10022;</span>
            <span class="h-px w-12 bg-stone"></span>
        </div>
        <h2 class="font-serif text-3xl md:text-4xl mb-6">Ready to Start Your Project?</h2>
        <p class="text-ink/75 mb-10 leading-relaxed">
            We'd love to learn about your vision. Reach out and let's explore how Artofex can bring your architectural dreams to life.
        </p>
        <a href="{{ route('contact') }}" class="inline-block uppercase tracking-[0.25em] text-xs bg-ink text-cream px-10 py-4 hover:bg-bronze transition-colors duration-300">
            Contact Us
        </a>
    </div>
</section>

@endsection
