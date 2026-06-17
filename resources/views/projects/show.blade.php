@extends('layouts.app')

@section('title', $project->title . ' — Artofex Architectural Studio')

@section('content')

{{-- Hero --}}
<section class="relative h-[70vh] w-full overflow-hidden bg-ink">
    @if($project->getFirstMediaUrl('cover'))
        <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="{{ $project->title }}" class="absolute inset-0 h-full w-full object-cover">
    @else
        <div class="absolute inset-0 flex items-center justify-center bg-stone-light/30">
            <span class="font-serif text-4xl text-ink/20">{{ $project->title }}</span>
        </div>
    @endif
    <div class="absolute inset-0 bg-ink/50"></div>

    <div class="relative z-10 flex h-full items-center justify-center text-center text-cream px-4">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] mb-4 text-cream/60">{{ $project->category }}</p>
            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl tracking-wider mb-4">{{ $project->title }}</h1>
            <div class="flex items-center justify-center gap-4 text-sm text-cream/70">
                <span>{{ $project->location }}</span>
                <span class="w-1 h-1 rounded-full bg-cream/40"></span>
                <span>{{ $project->year }}</span>
            </div>
        </div>
    </div>
</section>

{{-- Project Details --}}
<section class="py-24 md:py-32 px-8 lg:px-12 max-w-4xl mx-auto animate-on-scroll">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <div class="md:col-span-2">
            <h2 class="font-serif text-2xl mb-6">About This Project</h2>
            <div class="w-12 h-px bg-bronze mb-8"></div>
            <p class="text-ink/75 leading-relaxed text-lg">{{ $project->description }}</p>
        </div>
        <div>
            <h3 class="text-xs uppercase tracking-[0.2em] text-bronze mb-6">Project Info</h3>
            <div class="space-y-6">
                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-ink-light/50 mb-1">Category</p>
                    <p class="text-base font-medium">{{ $project->category }}</p>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-ink-light/50 mb-1">Location</p>
                    <p class="text-base font-medium">{{ $project->location }}</p>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-ink-light/50 mb-1">Year</p>
                    <p class="text-base font-medium">{{ $project->year }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Gallery --}}
@if($project->getMedia('gallery')->count() > 0)
<section class="bg-cream-dark py-24 md:py-32 px-8 lg:px-12">
    <div class="max-w-6xl mx-auto">
        <h2 class="font-serif text-2xl text-center mb-12">Gallery</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($project->getMedia('gallery') as $image)
                <div class="overflow-hidden group bg-stone-light/60">
                    @if($image->getUrl())
                        <img src="{{ $image->getUrl() }}" alt="{{ $project->title }}" class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-105">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Navigation --}}
<section class="py-16 px-8 lg:px-12 border-t border-stone-light/60">
    <div class="max-w-7xl mx-auto flex justify-center">
        <a href="{{ route('projects.index') }}" class="inline-block uppercase tracking-[0.2em] text-xs border border-ink/30 px-10 py-4 hover:bg-ink hover:text-cream transition-all duration-300">
            Back to All Projects
        </a>
    </div>
</section>

@endsection
