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
            <button
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
                        <p class="font-metadata text-metadata text-secondary mb-1">Posts</p>
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
                        <p class="font-metadata text-metadata text-secondary mb-1">Posts</p>
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
                            <p class="font-metadata text-metadata text-primary-fixed-dim mb-1">Posts</p>
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
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Post Count</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Total Views</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Avg. Engagement</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">Status</th>
                            <th class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface text-right">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <!-- Row 1 -->
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-6 py-4 font-ui-label text-ui-label font-bold text-primary">#DesignSystem</td>
                            <td class="px-6 py-4 font-metadata text-metadata text-secondary">design-system</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">428</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">15.2k</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">4.8%</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-metadata text-[10px] font-bold uppercase tracking-widest">Trending</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-1 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">edit</span></button>
                                    <button class="p-1 hover:text-error transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">#CreativeCoding</td>
                            <td class="px-6 py-4 font-metadata text-metadata text-secondary">creative-coding</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">312</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">8.4k</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">5.2%</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-metadata text-[10px] font-bold uppercase tracking-widest">Active</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-1 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">edit</span></button>
                                    <button class="p-1 hover:text-error transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">#Modernism</td>
                            <td class="px-6 py-4 font-metadata text-metadata text-secondary">modernism</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">215</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">12.1k</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">3.9%</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-metadata text-[10px] font-bold uppercase tracking-widest">Active</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-1 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">edit</span></button>
                                    <button class="p-1 hover:text-error transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">#WebAssembly</td>
                            <td class="px-6 py-4 font-metadata text-metadata text-secondary">web-assembly</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">156</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">4.5k</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">6.1%</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-metadata text-[10px] font-bold uppercase tracking-widest">Trending</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-1 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">edit</span></button>
                                    <button class="p-1 hover:text-error transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 5 -->
                        <tr class="hover:bg-surface-container-low transition-colors group">
                            <td class="px-6 py-4 font-ui-label text-ui-label font-bold text-on-surface">#UIUX</td>
                            <td class="px-6 py-4 font-metadata text-metadata text-secondary">ui-ux</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">1,824</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">92k</td>
                            <td class="px-6 py-4 font-ui-label text-ui-label">4.2%</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-metadata text-[10px] font-bold uppercase tracking-widest">Active</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-1 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">edit</span></button>
                                    <button class="p-1 hover:text-error transition-colors"><span
                                            class="material-symbols-outlined text-[20px]">delete</span></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-outline-variant flex items-center justify-between">
                <button
                    class="font-ui-label text-ui-label text-secondary hover:text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                    Previous
                </button>
                <div class="flex gap-2">
                    <span
                        class="w-8 h-8 flex items-center justify-center rounded bg-primary text-on-primary font-ui-label text-ui-label">1</span>
                    <span
                        class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-container transition-colors cursor-pointer font-ui-label text-ui-label">2</span>
                    <span
                        class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-container transition-colors cursor-pointer font-ui-label text-ui-label">3</span>
                </div>
                <button
                    class="font-ui-label text-ui-label text-secondary hover:text-primary transition-colors flex items-center gap-2">
                    Next
                    <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                </button>
            </div>
        </div>
    </section>
@endsection
