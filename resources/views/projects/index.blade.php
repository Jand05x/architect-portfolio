@extends('layouts.app')

@section('title', 'Projects — Artofex Architectural Studio')

@section('content')

{{-- Hero --}}
<section class="relative py-32 md:py-40 px-8 lg:px-12 bg-cream-dark">
    <div class="max-w-4xl mx-auto text-center">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-stone"></span>
            <span class="text-bronze text-sm">&#10022;</span>
            <span class="h-px w-12 bg-stone"></span>
        </div>
        <h1 class="font-serif text-4xl md:text-5xl mb-6">Our Projects</h1>
        <p class="text-ink/55 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
            A portfolio of architecture that shapes how people live and work.
        </p>
    </div>
</section>

{{-- Project Grid --}}
<section class="py-24 md:py-32 px-8 lg:px-12 animate-on-scroll">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            @forelse($projects as $project)
                <a href="{{ route('projects.show', $project) }}" class="group block">
                    <div class="relative overflow-hidden aspect-[4/3] bg-stone-light/60">
                        @if($project->getFirstMediaUrl('cover'))
                            <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="font-serif text-2xl text-ink/20">{{ $project->title }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/30 transition-colors duration-500 flex items-center justify-center">
                            <span class="text-cream opacity-0 group-hover:opacity-100 transition-opacity duration-500 uppercase tracking-[0.2em] text-xs border border-cream/60 px-6 py-3">View Project</span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h3 class="font-serif text-lg group-hover:text-bronze transition-colors duration-200">{{ $project->title }}</h3>
                        <div class="flex items-center gap-3 mt-2 text-xs uppercase tracking-[0.15em] text-ink-light/50">
                            <span>{{ $project->category }}</span>
                            <span class="w-1 h-1 rounded-full bg-stone"></span>
                            <span>{{ $project->location }}</span>
                            @if($project->year)
                                <span class="w-1 h-1 rounded-full bg-stone"></span>
                                <span>{{ $project->year }}</span>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="font-serif text-2xl text-ink/30 mb-4">No projects yet</p>
                    <p class="text-sm text-ink/40">Check back soon to see our latest work.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
