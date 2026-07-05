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
            <a href="{{ route('articles.create') }}"
                class="bg-primary text-white px-6 py-3 rounded-lg font-ui-button text-ui-button flex items-center gap-2 hover:opacity-90 active:scale-95 transition-all shadow-md shadow-primary/10">
                <span class="material-symbols-outlined" data-icon="add">add</span>
                Start a new draft
            </a>
        </div>
        @if($focusPieces->isNotEmpty())
            <!-- Priority / Starred Section -->
        <div class="mb-12">
            <h2 class="font-ui-label text-ui-label font-bold text-on-surface-variant uppercase tracking-widest mb-6">Focus
                Pieces</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach ($focusPieces as $f)
                    @php
                        $words = str_word_count(strip_tags($f->content ?? ''));
                        $percent = (int) min(100, $words > 0 ? round(($words / 1200) * 100) : 0);
                        $excerpt = $f->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($f->content ?? ''), 120);
                    @endphp
                    <div class="group bg-surface-container-lowest border border-outline-variant p-6 rounded-xl hover:border-primary transition-all cursor-pointer relative"
                        onclick="window.location= '{{ route('articles.edit', $article->id) }}'">
                        <div class="flex justify-between items-start mb-4">
                            <span class="material-symbols-outlined text-primary" data-icon="star" data-weight="fill"
                                style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="text-metadata font-metadata bg-surface-container px-2 py-1 rounded">Priority</span>
                        </div>
                        <h3 class="font-headline-md text-xl mb-2 group-hover:text-primary transition-colors">
                            {{ $f->title ?: 'Untitled' }}</h3>
                        <p class="text-on-surface-variant text-sm font-body-md line-clamp-2 mb-6 italic">{{ $excerpt }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-24 h-1.5 bg-surface-container rounded-full overflow-hidden">
                                    <div class="bg-primary h-full" style="width: {{ $percent }}%"></div>
                                </div>
                                <span class="text-metadata font-metadata text-on-surface-variant">{{ $percent }}%
                                    done</span>
                            </div>
                            <span class="text-metadata font-metadata text-on-surface-variant">{{ number_format($words) }}
                                words</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <!-- Draft List -->
        <div>
            <h2 class="font-ui-label text-ui-label font-bold text-on-surface-variant uppercase tracking-widest mb-6">Recent
                Work</h2>
            <div
                class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden divide-y divide-outline-variant">
                @foreach ($articles as $article)
                    <div
                        class="flex flex-col md:flex-row md:items-center justify-between p-6 hover:bg-surface transition-colors gap-4">
                        <div class="grow">
                            <h4 class="font-headline-md text-lg text-on-surface mb-1">{{ $article->title ?: 'Untitled' }}
                            </h4>
                            <div class="flex items-center gap-4 text-on-surface-variant text-metadata font-metadata">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]" data-icon="history">history</span>
                                    Edited {{ $article->updated_at->diffForHumans() }}</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]" data-icon="article">article</span>
                                    {{ str_word_count(strip_tags($article->content)) }} words
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('articles.edit', $article->id) }}"
                                class="flex items-center gap-2 px-4 py-2 rounded border border-outline hover:bg-primary-container hover:text-white hover:border-primary-container transition-all text-ui-label font-ui-button">
                                Resume Writing
                            </a>

                            @if ($article->status instanceof \BackedEnum ? $article->status->value === 'draft' : $article->status === 'draft')
                                <form action="{{ route('articles.publish', $article->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 rounded bg-primary text-white hover:opacity-90 transition-all text-ui-label font-ui-button">Publish</button>
                                </form>
                            @else
                                <form action="{{ route('articles.unpublish', $article->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 rounded border border-outline hover:bg-surface-container text-ui-label font-ui-button">Unpublish</button>
                                </form>
                            @endif

                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                onsubmit="return confirm('Delete this draft?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 text-on-surface-variant hover:text-error transition-colors rounded hover:bg-error-container/10">
                                    <span class="material-symbols-outlined" data-icon="delete">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Load More -->
            <div class="mt-8 text-center">{{ $articles->links() }}
                {{-- <button
                    class="text-secondary font-ui-label text-ui-label hover:text-primary hover:underline transition-all">
                    View 4 more drafts from last month
                </button> --}}
            </div>
        </div>
    </section>
@endsection
