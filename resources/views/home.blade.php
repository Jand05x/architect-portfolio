@extends('layouts.app')

@section('title', 'Artofex — Architectural Studio')

@section('content')

{{-- Hero Slideshow --}}
<section class="relative h-[75vh] w-full overflow-hidden">
    {{-- Slideshow Images --}}
    @php
        $slides = \App\Models\Project::where('is_published', true)
            ->whereHas('media', function($q) { $q->where('collection_name', 'cover'); })
            ->inRandomOrder()
            ->take(4)
            ->get();
        $hasSlides = $slides->count() > 0;
    @endphp

    @if($hasSlides)
        @foreach($slides as $index => $slide)
            <div class="slide absolute inset-0 transition-opacity duration-[1500ms] {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                <img src="{{ $slide->getFirstMediaUrl('cover') }}" alt="{{ $slide->title }}" class="absolute inset-0 h-full w-full object-cover">
            </div>
        @endforeach
    @else
        <div class="slide absolute inset-0 opacity-100">
            <img src="{{ asset('images/hero-placeholder.jpeg') }}" alt="Artofex" class="absolute inset-0 h-full w-full object-cover">
        </div>
    @endif

    <div class="absolute inset-0 bg-ink/40"></div>

    {{-- Text Box --}}
    <div class="absolute inset-0 flex items-center justify-center px-4">
        <div class="bg-ink/80 backdrop-blur-sm px-10 py-8 md:px-16 md:py-12 border border-bronze/30 max-w-2xl text-center text-cream">
            <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl tracking-wider mb-3 leading-tight">ARTOFEX</h1>
            <p class="text-[0.65rem] uppercase tracking-[0.4em] text-bronze-light mb-6">Architectural Studio</p>
            <div class="w-12 h-px bg-bronze/50 mx-auto mb-6"></div>
            <p class="text-cream/70 text-sm md:text-base leading-relaxed mb-8 max-w-md mx-auto">
                Crafting spaces where vision meets precision. Architecture that stands the test of time.
            </p>
            <a href="{{ route('projects.index') }}" class="inline-block uppercase tracking-[0.25em] text-[0.65rem] border border-cream/50 px-8 py-3 hover:bg-cream hover:text-ink transition-all duration-300">
                View Our Work
            </a>
        </div>
    </div>

    {{-- Slide Dots --}}
    @if($hasSlides && $slides->count() > 1)
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 flex gap-2" id="slide-dots">
            @foreach($slides as $index => $slide)
                <button class="slide-dot w-2 h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-cream w-6' : 'bg-cream/40' }}" data-index="{{ $index }}"></button>
            @endforeach
        </div>
    @endif
</section>

{{-- Studio Intro --}}
<section class="py-24 md:py-32 px-8 lg:px-12 animate-on-scroll">
    <div class="bg-ink px-10 py-16 md:px-20 md:py-20 max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-bronze/50"></span>
            <span class="text-bronze-light text-sm">&#10022;</span>
            <span class="h-px w-12 bg-bronze/50"></span>
        </div>
        <h2 class="font-serif text-3xl md:text-4xl mb-8 text-cream">Designing Spaces That Inspire</h2>
        <p class="text-cream/75 text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
            At Artofex, we believe architecture is more than structures — it's the art of shaping how people live, work, and dream. Our studio combines innovative design with sustainable principles to create spaces that resonate with purpose and beauty.
        </p>
        <div class="mt-10 text-center">
            <a href="{{ route('about') }}" class="inline-block uppercase tracking-[0.2em] text-xs text-bronze-light border-b border-bronze/50 pb-1 hover:border-bronze-light transition-colors duration-200">
                Learn About Us
            </a>
        </div>
    </div>
</section>

{{-- Projects --}}
<section class="px-8 lg:px-12 pb-24 max-w-6xl mx-auto animate-on-scroll">
    <div class="text-center mb-16">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-stone"></span>
            <span class="text-bronze text-sm">&#10022;</span>
            <span class="h-px w-12 bg-stone"></span>
        </div>
        <h2 class="font-serif text-3xl md:text-4xl mb-4">Projects</h2>
        <p class="text-ink/55 text-sm max-w-md mx-auto">A curated selection of our finest architectural works.</p>
    </div>

    <div class="space-y-16">
        @foreach($featured as $index => $project)
            <a href="{{ route('projects.show', $project) }}" class="group block">
                <div class="flex flex-col {{ $index % 2 === 1 ? 'lg:flex-row-reverse' : 'lg:flex-row' }} gap-8 items-center">
                    <div class="w-full lg:w-[45%] aspect-[4/3] overflow-hidden bg-stone-light/60">
                        @if($project->getFirstMediaUrl('cover'))
                            <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="font-serif text-3xl text-ink/20">{{ $project->title }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="w-full lg:w-[55%]">
                        <h3 class="font-serif text-2xl md:text-3xl group-hover:text-bronze transition-colors duration-200 mb-3">{{ $project->title }}</h3>
                        <div class="flex items-center gap-3 mb-5 text-xs uppercase tracking-[0.15em] text-ink-light/50">
                            <span>{{ $project->category }}</span>
                            <span class="w-1 h-1 rounded-full bg-stone"></span>
                            <span>{{ $project->location }}</span>
                            @if($project->year)
                                <span class="w-1 h-1 rounded-full bg-stone"></span>
                                <span>{{ $project->year }}</span>
                            @endif
                        </div>
                        <p class="text-ink/75 leading-relaxed mb-4">
                            {{ Str::limit($project->description, 180) }}
                        </p>
                        <span class="inline-block uppercase tracking-[0.2em] text-[0.65rem] text-bronze border-b border-bronze/40 pb-1 group-hover:border-bronze transition-colors duration-200">
                            View Project &rarr;
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if($featured->count() > 0)
        <div class="text-center mt-20">
            <a href="{{ route('projects.index') }}" class="inline-block uppercase tracking-[0.25em] text-xs border border-ink/30 px-10 py-4 hover:bg-ink hover:text-cream transition-all duration-300">
                View All Projects
            </a>
        </div>
    @endif
</section>

{{-- Services --}}
<section class="bg-ink text-cream py-24 md:py-32 px-8 lg:px-12 animate-on-scroll">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <div class="mb-6 flex items-center justify-center gap-3">
                <span class="h-px w-12 bg-cream/20"></span>
                <span class="text-bronze-light text-sm">&#10022;</span>
                <span class="h-px w-12 bg-cream/20"></span>
            </div>
            <h2 class="font-serif text-3xl md:text-4xl mb-4">What We Do</h2>
            <p class="text-cream/50 text-sm max-w-md mx-auto">Comprehensive architectural services tailored to your vision.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center p-8 border border-cream/10 hover:border-bronze/40 transition-colors duration-300 group">
                <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-bronze group-hover:text-bronze-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg mb-3">Architecture</h3>
                <p class="text-cream/40 text-sm leading-relaxed">Residential, commercial, and cultural spaces designed with purpose and elegance.</p>
            </div>

            <div class="text-center p-8 border border-cream/10 hover:border-bronze/40 transition-colors duration-300 group">
                <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-bronze group-hover:text-bronze-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg mb-3">Interior Design</h3>
                <p class="text-cream/40 text-sm leading-relaxed">Thoughtful interiors that balance aesthetics with functionality and comfort.</p>
            </div>

            <div class="text-center p-8 border border-cream/10 hover:border-bronze/40 transition-colors duration-300 group">
                <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-bronze group-hover:text-bronze-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg mb-3">Urban Planning</h3>
                <p class="text-cream/40 text-sm leading-relaxed">Master plans that create vibrant, sustainable communities for the future.</p>
            </div>

            <div class="text-center p-8 border border-cream/10 hover:border-bronze/40 transition-colors duration-300 group">
                <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-bronze group-hover:text-bronze-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg mb-3">Consultation</h3>
                <p class="text-cream/40 text-sm leading-relaxed">Expert guidance from concept to completion, ensuring your vision thrives.</p>
            </div>

            <div class="text-center p-8 border border-cream/10 hover:border-bronze/40 transition-colors duration-300 group">
                <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-bronze group-hover:text-bronze-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg mb-3">BIM</h3>
                <p class="text-cream/60 text-xs uppercase tracking-wider mb-2">Building Information Modeling</p>
                <p class="text-cream/40 text-sm leading-relaxed">Digital twin creation, 3D model coordination, and clash detection for seamless project delivery.</p>
            </div>

            <div class="text-center p-8 border border-cream/10 hover:border-bronze/40 transition-colors duration-300 group">
                <div class="w-12 h-12 mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-bronze group-hover:text-bronze-light transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-lg mb-3">MEP</h3>
                <p class="text-cream/60 text-xs uppercase tracking-wider mb-2">Mechanical, Electrical & Plumbing</p>
                <p class="text-cream/40 text-sm leading-relaxed">Systems design integration, energy-efficient solutions, and infrastructure planning.</p>
            </div>
        </div>
    </div>
</section>

{{-- Philosophy Quote --}}
<section class="py-24 md:py-32 px-8 lg:px-12 max-w-4xl mx-auto text-center animate-on-scroll">
    <svg class="w-10 h-10 mx-auto mb-8 text-bronze/40" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>
    <blockquote class="font-serif text-2xl md:text-3xl leading-relaxed mb-8 text-ink">
        Architecture should speak of its time and place, but yearn for timelessness. We design not just buildings, but the backdrop to human life.
    </blockquote>
    <p class="text-xs uppercase tracking-[0.2em] text-ink-light/50">— Artofex Design Philosophy</p>
</section>

{{-- CTA --}}
<section class="relative py-24 md:py-32 px-8 lg:px-12 text-center animate-on-scroll">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-stone"></span>
            <span class="text-bronze text-sm">&#10022;</span>
            <span class="h-px w-12 bg-stone"></span>
        </div>
        <h2 class="font-serif text-3xl md:text-4xl mb-6">Let's Build Something Extraordinary</h2>
        <p class="text-ink/75 mb-10 leading-relaxed">
            Ready to bring your vision to life? We'd love to hear about your project and explore how we can create something remarkable together.
        </p>
        <a href="{{ route('contact') }}" class="inline-block uppercase tracking-[0.25em] text-xs bg-ink text-cream px-10 py-4 hover:bg-bronze transition-colors duration-300">
            Get in Touch
        </a>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slide-dot');
    let current = 0;

    function goToSlide(index) {
        slides[current].classList.remove('opacity-100');
        slides[current].classList.add('opacity-0');
        if (dots[current]) {
            dots[current].classList.remove('bg-cream', 'w-6');
            dots[current].classList.add('bg-cream/40', 'w-2');
        }
        current = index;
        slides[current].classList.remove('opacity-0');
        slides[current].classList.add('opacity-100');
        if (dots[current]) {
            dots[current].classList.remove('bg-cream/40', 'w-2');
            dots[current].classList.add('bg-cream', 'w-6');
        }
    }

    if (slides.length > 1) {
        let interval = setInterval(() => {
            goToSlide((current + 1) % slides.length);
        }, 3500);

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                clearInterval(interval);
                goToSlide(parseInt(dot.dataset.index));
                interval = setInterval(() => {
                    goToSlide((current + 1) % slides.length);
                }, 3500);
            });
        });
    }
});
</script>
@endpush

@endsection
