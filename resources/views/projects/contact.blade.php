@extends('layouts.app')

@section('title', 'Contact — Artofex Architectural Studio')

@section('content')

{{-- Hero --}}
<section class="relative py-32 md:py-40 px-8 lg:px-12 bg-cream-dark">
    <div class="max-w-4xl mx-auto text-center">
        <div class="mb-6 flex items-center justify-center gap-3">
            <span class="h-px w-12 bg-stone"></span>
            <span class="text-bronze text-sm">&#10022;</span>
            <span class="h-px w-12 bg-stone"></span>
        </div>
        <h1 class="font-serif text-4xl md:text-5xl mb-6">Get in Touch</h1>
        <p class="text-ink/55 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
            Have a project in mind? We'd love to hear from you.
        </p>
    </div>
</section>

{{-- Contact Form --}}
<section class="py-24 md:py-32 px-8 lg:px-12 animate-on-scroll">
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16">
        <div>
            <h2 class="font-serif text-2xl mb-6">Send Us a Message</h2>
            <div class="w-12 h-px bg-bronze mb-8"></div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-ink-light/10 border border-bronze/30 text-ink text-sm">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-8">
                @csrf

                <div>
                    <label class="block text-xs uppercase tracking-[0.15em] text-ink-light/60 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border-b border-stone bg-transparent py-3 focus:outline-none focus:border-bronze transition-colors">
                    @error('name') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-[0.15em] text-ink-light/60 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border-b border-stone bg-transparent py-3 focus:outline-none focus:border-bronze transition-colors">
                    @error('email') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-[0.15em] text-ink-light/60 mb-2">Message</label>
                    <textarea name="message" rows="5" class="w-full border-b border-stone bg-transparent py-3 focus:outline-none focus:border-bronze transition-colors resize-none">{{ old('message') }}</textarea>
                    @error('message') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="uppercase tracking-[0.2em] text-xs bg-ink text-cream px-10 py-4 hover:bg-bronze transition-colors duration-300">
                    Send Message
                </button>
            </form>
        </div>

        <div>
            <h2 class="font-serif text-2xl mb-6">Contact Information</h2>
            <div class="w-12 h-px bg-bronze mb-8"></div>

            <div class="space-y-8 text-ink-light/70">
                <div>
                    <h3 class="text-xs uppercase tracking-[0.15em] text-bronze mb-2">Email</h3>
                    <p class="text-base">info@artofex.com</p>
                </div>

                <div>
                    <h3 class="text-xs uppercase tracking-[0.15em] text-bronze mb-2">Phone</h3>
                    <p class="text-base">+1 (555) 000-0000</p>
                </div>

                <div>
                    <h3 class="text-xs uppercase tracking-[0.15em] text-bronze mb-2">Address</h3>
                    <p class="text-base">
                        123 Design Street<br>
                        Architecture District<br>
                        New York, NY 10001
                    </p>
                </div>

                <div>
                    <h3 class="text-xs uppercase tracking-[0.15em] text-bronze mb-2">Office Hours</h3>
                    <p class="text-base">
                        Monday – Friday: 9:00 AM – 6:00 PM<br>
                        Saturday: By Appointment
                    </p>
                </div>
            </div>

            <div class="mt-12 p-8 bg-cream-dark border border-stone-light/60">
                <p class="font-serif text-lg mb-2 text-ink-light">Prefer a conversation?</p>
                <p class="text-sm text-ink-light/60 leading-relaxed">Schedule a free initial consultation to discuss your project vision and explore how we can work together.</p>
            </div>
        </div>
    </div>
</section>

@endsection
