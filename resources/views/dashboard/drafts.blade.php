@extends('layouts.dashboard')

@section('title', 'Drafts - Ink & Paper')

@section('aside')
    @include('layouts.partials.aside')
@stop

@section('page-content')
    <!-- Content Area -->
    <section class="grow">
        <!-- Header & Stats -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <h1 class="font-headline-md text-headline-md text-on-surface mb-2">Drafts</h1>
                <p class="text-on-surface-variant font-ui-label text-ui-label">You have <span
                        class="font-bold text-on-surface">8</span> unfinished stories in your workspace.</p>
            </div>
            <a href="{{ route('posts.create') }}"
                class="bg-primary text-white px-6 py-3 rounded-lg font-ui-button text-ui-button flex items-center gap-2 hover:opacity-90 active:scale-95 transition-all shadow-md shadow-primary/10">
                <span class="material-symbols-outlined" data-icon="add">add</span>
                Start a new draft
            </a>
        </div>
        <!-- Priority / Starred Section -->
        <div class="mb-12">
            <h2 class="font-ui-label text-ui-label font-bold text-on-surface-variant uppercase tracking-widest mb-6">Focus
                Pieces</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Starred Draft Card 1 -->
                <div
                    class="group bg-surface-container-lowest border border-outline-variant p-6 rounded-xl hover:border-primary transition-all cursor-pointer relative">
                    <div class="flex justify-between items-start mb-4">
                        <span class="material-symbols-outlined text-primary" data-icon="star" data-weight="fill"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="text-metadata font-metadata bg-surface-container px-2 py-1 rounded">Priority</span>
                    </div>
                    <h3 class="font-headline-md text-xl mb-2 group-hover:text-primary transition-colors">The Architectures
                        of Digital Silence</h3>
                    <p class="text-on-surface-variant text-sm font-body-md line-clamp-2 mb-6 italic">Exploring how
                        minimalist design influences cognitive load in professional SaaS environments...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
                                <div class="bg-primary h-full w-3/4 rounded-full"></div>
                            </div>
                            <span class="text-metadata font-metadata text-on-surface-variant">75% done</span>
                        </div>
                        <span class="text-metadata font-metadata text-on-surface-variant">1,240 words</span>
                    </div>
                </div>
                <!-- Starred Draft Card 2 -->
                <div
                    class="group bg-surface-container-lowest border border-outline-variant p-6 rounded-xl hover:border-primary transition-all cursor-pointer relative">
                    <div class="flex justify-between items-start mb-4">
                        <span class="material-symbols-outlined text-primary" data-icon="star" data-weight="fill"
                            style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="text-metadata font-metadata bg-surface-container px-2 py-1 rounded">Priority</span>
                    </div>
                    <h3 class="font-headline-md text-xl mb-2 group-hover:text-primary transition-colors">Rust vs Go: The
                        2024 Performance Audit</h3>
                    <p class="text-on-surface-variant text-sm font-body-md line-clamp-2 mb-6 italic">A deep dive into memory
                        safety and execution speed for distributed cloud systems...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
                                <div class="bg-primary h-full w-1/4 rounded-full"></div>
                            </div>
                            <span class="text-metadata font-metadata text-on-surface-variant">25% done</span>
                        </div>
                        <span class="text-metadata font-metadata text-on-surface-variant">450 words</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Draft List -->
        <div>
            <h2 class="font-ui-label text-ui-label font-bold text-on-surface-variant uppercase tracking-widest mb-6">Recent
                Work</h2>
            <div
                class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden divide-y divide-outline-variant">
                <!-- List Item 1 -->
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between p-6 hover:bg-surface transition-colors gap-4">
                    <div class="flex-grow">
                        <h4 class="font-headline-md text-lg text-on-surface mb-1">Untitled Technical Proposal</h4>
                        <div class="flex items-center gap-4 text-on-surface-variant text-metadata font-metadata">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="history">history</span>
                                Edited 2 hours ago
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="article">article</span>
                                234 words
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded border border-outline hover:bg-primary-container hover:text-white hover:border-primary-container transition-all text-ui-label font-ui-button">
                            Resume Writing
                        </button>
                        <button
                            class="p-2 text-on-surface-variant hover:text-error transition-colors rounded hover:bg-error-container/10">
                            <span class="material-symbols-outlined" data-icon="delete">delete</span>
                        </button>
                        <button
                            class="p-2 text-on-surface-variant hover:text-on-surface transition-colors rounded hover:bg-surface-container">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>
                <!-- List Item 2 -->
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between p-6 hover:bg-surface transition-colors gap-4">
                    <div class="flex-grow">
                        <h4 class="font-headline-md text-lg text-on-surface mb-1">The Ethics of AI in Creative Writing</h4>
                        <div class="flex items-center gap-4 text-on-surface-variant text-metadata font-metadata">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="history">history</span>
                                Edited 3 days ago
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="article">article</span>
                                890 words
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded border border-outline hover:bg-primary-container hover:text-white hover:border-primary-container transition-all text-ui-label font-ui-button">
                            Resume Writing
                        </button>
                        <button
                            class="p-2 text-on-surface-variant hover:text-error transition-colors rounded hover:bg-error-container/10">
                            <span class="material-symbols-outlined" data-icon="delete">delete</span>
                        </button>
                        <button
                            class="p-2 text-on-surface-variant hover:text-on-surface transition-colors rounded hover:bg-surface-container">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>
                <!-- List Item 3 -->
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between p-6 hover:bg-surface transition-colors gap-4">
                    <div class="flex-grow">
                        <h4 class="font-headline-md text-lg text-on-surface mb-1">Travelogue: One Month in Kyoto</h4>
                        <div class="flex items-center gap-4 text-on-surface-variant text-metadata font-metadata">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="history">history</span>
                                Edited 1 week ago
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="article">article</span>
                                3,420 words
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded border border-outline hover:bg-primary-container hover:text-white hover:border-primary-container transition-all text-ui-label font-ui-button">
                            Resume Writing
                        </button>
                        <button
                            class="p-2 text-on-surface-variant hover:text-error transition-colors rounded hover:bg-error-container/10">
                            <span class="material-symbols-outlined" data-icon="delete">delete</span>
                        </button>
                        <button
                            class="p-2 text-on-surface-variant hover:text-on-surface transition-colors rounded hover:bg-surface-container">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>
                <!-- List Item 4 -->
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between p-6 hover:bg-surface transition-colors gap-4 text-on-surface-variant/50">
                    <div class="flex-grow">
                        <h4 class="font-headline-md text-lg italic mb-1">Add a title to your draft...</h4>
                        <div class="flex items-center gap-4 text-metadata font-metadata">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="history">history</span>
                                Last saved just now
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]" data-icon="article">article</span>
                                0 words
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded border border-outline hover:bg-primary-container hover:text-white hover:border-primary-container transition-all text-ui-label font-ui-button">
                            Resume Writing
                        </button>
                        <button class="p-2 hover:text-error transition-colors rounded hover:bg-error-container/10">
                            <span class="material-symbols-outlined" data-icon="delete">delete</span>
                        </button>
                        <button class="p-2 hover:text-on-surface transition-colors rounded hover:bg-surface-container">
                            <span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Load More -->
            <div class="mt-8 text-center">
                <button
                    class="text-secondary font-ui-label text-ui-label hover:text-primary hover:underline transition-all">
                    View 4 more drafts from last month
                </button>
            </div>
        </div>
    </section>
@endsection
