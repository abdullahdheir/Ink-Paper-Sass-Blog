@extends('layouts.dashboard')

@section('title', 'Category Management - Ink & Paper')

@section('page-content')
    <!-- Header Section -->
    <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div class="max-w-2xl">
            <h1 class="font-display-lg text-display-lg text-on-surface mb-2">Category Management</h1>
            <p class="font-body-md text-on-surface-variant">Organize your content structure, monitor performance metrics, and
                refine your editorial taxonomy for maximum audience engagement.</p>
        </div>
        <a href="{{ route('categories.create') }}"
            class="bg-primary text-on-primary px-6 py-3 rounded-lg font-ui-button text-ui-button shadow-sm hover:opacity-90 active:scale-95 transition-all flex items-center gap-2 whitespace-nowrap">
            <span class="material-symbols-outlined">add</span>
            Create Category
        </a>
    </header>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search and Layout Toggle -->
    <div class="flex flex-col md:flex-row gap-4 items-center justify-between mb-8">
        <div class="relative w-full md:w-96">
            <span
                class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
            <input
                class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl pl-12 pr-4 py-3 font-ui-label text-ui-label focus:border-primary outline-none transition-all"
                placeholder="Filter categories by name..." type="text" />
        </div>
        <div class="flex items-center gap-2 bg-surface-container-low p-1 rounded-lg">
            <button class="p-2 bg-surface-container-lowest text-primary rounded shadow-sm">
                <span class="material-symbols-outlined">grid_view</span>
            </button>
            <button class="p-2 text-on-surface-variant">
                <span class="material-symbols-outlined">list</span>
            </button>
        </div>
    </div>

    <!-- Category Grid (Asymmetric Bento-inspired layout) -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        @forelse($categories as $category)
            <div
                class="md:col-span-4 bg-surface-container-lowest border border-outline-variant rounded-xl p-8 hover:border-primary transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="font-headline-md text-2xl font-bold text-on-surface">{{ $category->name }}</h2>
                        <div class="flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="p-2 hover:bg-surface-variant rounded transition-colors text-on-surface-variant"
                                title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 hover:bg-surface-variant rounded transition-colors text-on-surface-variant"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <p class="font-body-md text-on-surface-variant text-base mb-6">
                        {{ $category->description ?? 'No description' }}</p>
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-on-surface-variant text-sm">article</span>
                        <span class="font-ui-label text-ui-label">{{ $category->posts_count ?? 0 }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-on-surface-variant text-sm">calendar_today</span>
                        <span class="font-ui-label text-ui-label">{{ $category->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div
                class="md:col-span-12 bg-surface-container-lowest border border-outline-variant rounded-xl p-8 border-dashed flex flex-col items-center justify-center text-center opacity-60 hover:opacity-100 hover:bg-surface transition-all cursor-pointer">
                <div class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-on-surface-variant">add</span>
                </div>
                <p class="font-ui-label text-ui-label">No Categories Found</p>
                <p class="font-metadata text-metadata text-on-surface-variant mt-1">Create your first category to get
                    started</p>
                <a href="{{ route('categories.create') }}"
                    class="mt-4 bg-primary text-on-primary px-4 py-2 rounded-lg font-ui-button text-ui-button">Create
                    Category</a>
            </div>
        @endforelse
    </div>

    <!-- Table View For Bulk Actions (Secondary Section) -->
    <section class="mt-20">
        <h3 class="font-headline-md text-headline-md text-on-surface mb-8">All Categories</h3>
        <div class="overflow-x-auto bg-surface-container-lowest border border-outline-variant rounded-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant">
                        <th
                            class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider">
                            Category Name</th>
                        <th
                            class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider">
                            Description</th>
                        <th
                            class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider">
                            Created At</th>
                        <th
                            class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    @forelse($categories as $category)
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-headline-md text-xl font-bold">{{ $category->name }}</div>
                                <div class="font-metadata text-metadata text-on-surface-variant">ID: {{ $category->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="font-ui-label text-ui-label">{{ $category->description ?? 'No description' }}</span>
                            </td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">{{ $category->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="text-on-surface-variant hover:text-primary"><span
                                            class="material-symbols-outlined">edit</span></a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-on-surface-variant hover:text-error"
                                            onclick="return confirm('Are you sure you want to delete this category?')"><span
                                                class="material-symbols-outlined">delete</span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
