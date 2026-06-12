@extends('layouts.dashboard')

@section('title', 'Manage Tags - Ink & Paper')

@section('page-content')
    <!-- Header Section -->
    <header class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <h1 class="font-display-lg text-display-lg text-on-surface">Tag Management</h1>
            <p class="font-ui-label text-ui-label text-on-secondary-container">Organize, track, and optimize the discovery of
                your editorial content.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-center gap-4">
            <div class="relative w-full sm:w-72">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                <input
                    class="w-full pl-10 pr-4 py-2 bg-surface-container-lowest border border-outline-variant rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none font-ui-label text-ui-label"
                    placeholder="Search tags..." type="text" />
            </div>
            <button onclick="window.openTagModal('create')"
                class="w-full sm:w-auto font-ui-button text-ui-button px-6 py-2.5 bg-primary-container text-on-primary-container rounded-lg hover:brightness-110 transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-[20px]">add</span>
                Create New Tag
            </button>
        </div>
    </header>
    <!-- Popular Tags Bento Grid -->
    <section class="mb-16">
        <h2 class="font-headline-md text-headline-md text-on-surface mb-6">Popular Tags</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-surface-container-lowest border border-outline-variant p-6 rounded-lg hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <span class="font-metadata text-metadata uppercase tracking-wider text-primary mb-1 block">Trending
                            Now</span>
                        <h3 class="font-headline-md text-headline-md">#Architecture</h3>
                    </div>
                    <span class="material-symbols-outlined text-primary" data-weight="fill">insights</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-t border-outline-variant pt-6">
                    <div>
                        <p class="font-metadata text-metadata text-secondary mb-1">Articles</p>
                        <p class="font-ui-label text-ui-label font-bold text-on-surface">1,284</p>
                    </div>
                    <div>
                        <p class="font-metadata text-metadata text-secondary mb-1">Reach</p>
                        <p class="font-ui-label text-ui-label font-bold text-on-surface">842k</p>
                    </div>
                    <div>
                        <p class="font-metadata text-metadata text-secondary mb-1">Growth</p>
                        <p class="font-ui-label text-ui-label font-bold text-primary">+12.4%</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div
                class="bg-surface-container-lowest border border-outline-variant p-6 rounded-lg hover:shadow-lg transition-all duration-300">
                <div class="flex justify-between items-start mb-8">
                    <div>
                        <span class="font-metadata text-metadata uppercase tracking-wider text-secondary mb-1 block">Steady
                            Performance</span>
                        <h3 class="font-headline-md text-headline-md">#Typography</h3>
                    </div>
                    <span class="material-symbols-outlined text-secondary">show_chart</span>
                </div>
                <div class="grid grid-cols-3 gap-4 border-t border-outline-variant pt-6">
                    <div>
                        <p class="font-metadata text-metadata text-secondary mb-1">Articles</p>
                        <p class="font-ui-label text-ui-label font-bold text-on-surface">856</p>
                    </div>
                    <div>
                        <p class="font-metadata text-metadata text-secondary mb-1">Reach</p>
                        <p class="font-ui-label text-ui-label font-bold text-on-surface">1.2M</p>
                    </div>
                    <div>
                        <p class="font-metadata text-metadata text-secondary mb-1">Growth</p>
                        <p class="font-ui-label text-ui-label font-bold text-on-surface">+2.1%</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-primary text-on-primary p-6 rounded-lg shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <span
                                class="font-metadata text-metadata uppercase tracking-wider text-primary-fixed-dim mb-1 block">Spotlight</span>
                            <h3 class="font-headline-md text-headline-md">#Minimalism</h3>
                        </div>
                        <span class="material-symbols-outlined text-primary-fixed-dim" data-weight="fill">star</span>
                    </div>
                    <div class="grid grid-cols-3 gap-4 border-t border-primary-fixed-dim/30 pt-6">
                        <div>
                            <p class="font-metadata text-metadata text-primary-fixed-dim mb-1">Articles</p>
                            <p class="font-ui-label text-ui-label font-bold text-white">3.4k</p>
                        </div>
                        <div>
                            <p class="font-metadata text-metadata text-primary-fixed-dim mb-1">Reach</p>
                            <p class="font-ui-label text-ui-label font-bold text-white">4.8M</p>
                        </div>
                        <div>
                            <p class="font-metadata text-metadata text-primary-fixed-dim mb-1">Growth</p>
                            <p class="font-ui-label text-ui-label font-bold text-white">+48%</p>
                        </div>
                    </div>
                </div>
                <!-- Decorative Element -->
                <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-on-primary-fixed-variant rounded-full opacity-20">
                </div>
            </div>
        </div>
    </section>
    <!-- All Tags Section -->
    <section>
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-headline-md text-headline-md text-on-surface">All Tags</h2>
            <div class="flex items-center gap-2 font-ui-label text-ui-label text-on-secondary-container">
                <span>Showing 24 of 142 tags</span>
                <button class="p-1 hover:bg-surface-container transition-colors rounded">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span>
                </button>
            </div>
        </div>
        <!-- Tags Table -->
        <div class="bg-surface-container-lowest border border-outline-variant rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low border-b border-outline-variant">
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Tag Name</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Slug</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Article Count</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Total Views</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Avg. Engagement</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Status</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface text-right">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @forelse($tags as $tag)
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-6 py-4 font-ui-label text-ui-label font-bold text-primary">
                                    #{{ $tag->name }}</td>
                                <td class="px-6 py-4 font-metadata text-metadata text-secondary">{{ $tag->slug }}</td>
                                <td class="px-6 py-4 font-ui-label text-ui-label">{{ $tag->articles_count }}</td>
                                <td class="px-6 py-4 font-ui-label text-ui-label">
                                    {{ $tag->reach ? $tag->reach->total_views : 0 }}</td>
                                <td class="px-6 py-4 font-ui-label text-ui-label">-</td>
                                <td class="px-6 py-4">
                                    @if ($tag->reach && $tag->reach->status === 'trending')
                                        <span
                                            class="px-2 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-metadata text-[10px] font-bold uppercase tracking-widest">Trending</span>
                                    @elseif($tag->reach && $tag->reach->status === 'active')
                                        <span
                                            class="px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-metadata text-[10px] font-bold uppercase tracking-widest">Active</span>
                                    @else
                                        <span
                                            class="px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-metadata text-[10px] font-bold uppercase tracking-widest">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-3  transition-opacity">
                                        <button onclick="window.openTagModal('edit', {{ json_encode($tag) }})"
                                            class="p-1 hover:text-primary transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 hover:text-error transition-colors"
                                                onclick="return confirm('Are you sure you want to delete this tag?')"><span
                                                    class="material-symbols-outlined text-[20px]">delete</span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="px-6 py-12 text-center text-secondary font-ui-label text-ui-label">
                                    No tags found. <button onclick="window.openTagModal('create')"
                                        class="text-primary hover:underline">Create your first tag</button>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-outline-variant flex items-center justify-between">
                {{ $tags->links() }}
            </div>
        </div>
    </section>

    @include('dashboard.tags.tag-modal', ['action' => 'create', 'tag' => null, 'mode' => 'create'])
@endsection
