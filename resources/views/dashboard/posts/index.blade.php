@extends('layouts.dashboard')

@section('title', 'Creator Dashboard - Ink & Paper')

@section('page-content')
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <h1 class="font-display-lg text-display-lg text-on-surface mb-2">Creator Dashboard</h1>
            <p class="text-secondary font-body-md">Manage your thoughts, analyze your impact, and craft your next story.</p>
        </div>
        <a href="{{ route('posts.create') }}"
            class="flex items-center justify-center gap-2 bg-primary-container text-on-primary px-8 py-4 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all w-full md:w-auto shadow-sm">
            <span class="material-symbols-outlined">edit</span>
            Write a post
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bento Grid Stats -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-12">
        <!-- Performance Chart -->
        <div
            class="md:col-span-8 bg-surface-container-lowest border border-outline-variant rounded-xl p-6 flex flex-col justify-between min-h-[320px]">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-headline-md text-headline-md text-on-surface">Weekly Engagement</h3>
                <div class="flex gap-2">
                    <span
                        class="px-3 py-1 bg-surface-container text-secondary rounded-full font-metadata text-metadata">Last
                        7 Days</span>
                </div>
            </div>
            <!-- Mock Chart Visualization -->
            <div class="flex-1 flex items-end gap-2 md:gap-4 px-2">
                <div
                    class="flex-1 bg-outline-variant h-[40%] rounded-t opacity-40 hover:bg-primary transition-all duration-300">
                </div>
                <div
                    class="flex-1 bg-outline-variant h-[65%] rounded-t opacity-40 hover:bg-primary transition-all duration-300">
                </div>
                <div class="flex-1 bg-primary h-[85%] rounded-t shadow-sm"></div>
                <div
                    class="flex-1 bg-outline-variant h-[55%] rounded-t opacity-40 hover:bg-primary transition-all duration-300">
                </div>
                <div
                    class="flex-1 bg-outline-variant h-[75%] rounded-t opacity-40 hover:bg-primary transition-all duration-300">
                </div>
                <div
                    class="flex-1 bg-outline-variant h-[45%] rounded-t opacity-40 hover:bg-primary transition-all duration-300">
                </div>
                <div
                    class="flex-1 bg-outline-variant h-[95%] rounded-t opacity-40 hover:bg-primary transition-all duration-300">
                </div>
            </div>
            <div class="flex justify-between mt-4 text-metadata text-secondary border-t border-outline-variant pt-4">
                <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
            </div>
        </div>
        <!-- Snapshot Stats -->
        <div class="md:col-span-4 flex flex-col gap-6">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 flex-1">
                <span class="text-secondary font-ui-label text-ui-label block mb-2 uppercase tracking-wider">Total
                    Posts</span>
                <div class="flex items-baseline gap-2">
                    <span class="font-display-lg text-display-lg text-on-surface">{{ $posts->count() }}</span>
                </div>
            </div>
            <div class="bg-primary-container text-on-primary rounded-xl p-6 flex-1 shadow-lg shadow-primary-container/20">
                <span
                    class="text-on-primary/70 font-ui-label text-ui-label block mb-2 uppercase tracking-wider">Categories</span>
                <div class="flex items-baseline gap-2">
                    <span
                        class="font-display-lg text-display-lg">{{ $posts->pluck('category_id')->unique()->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden mb-section-gap">
        <div class="px-6 py-5 border-b border-outline-variant flex justify-between items-center">
            <h2 class="font-headline-md text-headline-md text-on-surface">Recent Posts</h2>
            <a href="{{ route('posts.create') }}" class="text-primary font-ui-label text-ui-label hover:underline">Create
                New Post</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container text-on-surface-variant font-ui-label text-ui-label">
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    @forelse($posts as $post)
                        <tr class="hover:bg-surface transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-surface-container overflow-hidden flex-shrink-0 flex items-center justify-center">
                                        <span class="material-symbols-outlined text-on-surface-variant">article</span>
                                    </div>
                                    <span
                                        class="font-ui-label text-ui-label font-bold text-on-surface">{{ $post->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="text-secondary font-metadata text-metadata">{{ $post->category ? $post->category->name : '-' }}</span>
                            </td>
                            <td class="px-6 py-4 text-secondary font-metadata text-metadata">
                                {{ $post->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-secondary hover:text-primary"><span
                                            class="material-symbols-outlined">edit</span></a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-secondary hover:text-error"
                                            onclick="return confirm('Are you sure you want to delete this post?')"><span
                                                class="material-symbols-outlined">delete</span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
