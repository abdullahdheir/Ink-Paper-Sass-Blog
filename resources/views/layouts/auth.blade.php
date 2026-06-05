@extends('layouts.app')

@section('content')
    <!-- Top Navigation (Shell suppressed but branding maintained) -->
    <header class="bg-surface docked full-width top-0 border-b border-outline-variant">
        <div class="flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-16">
            <span class="font-display-lg-mobile text-display-lg-mobile font-bold text-on-surface">Ink &amp; Paper</span>
            <div class="hidden md:flex gap-6 items-center">
                <a class="font-ui-label text-ui-label text-on-surface-variant hover:text-primary transition-colors duration-200"
                    href="#">Help</a>
            </div>
        </div>
    </header>
    <main class="min-h-[calc(100vh-128px)] flex items-center justify-center py-section-gap px-gutter">
        @yield('page-content')
    </main>
@endsection
