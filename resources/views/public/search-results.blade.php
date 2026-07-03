@extends('layouts.public')

@section('title', 'Search Results - Ink & Paper')

@section('page-content')
    <div class="pb-section-gap px-gutter max-w-container-max mx-auto">
        <!-- Search Header -->
        <section class="mb-12">
            <p class="text-metadata font-metadata text-secondary mb-2 uppercase tracking-widest">Search results</p>
            <h1 class="font-display-lg text-display-lg text-on-surface mb-6 italic">
                @if ($query !== '')
                    Showing {{ $results->total() }} result{{ $results->total() === 1 ? '' : 's' }} for <span
                        class="text-primary not-italic">"{{ $query }}"</span>
                @else
                    Find the stories, authors, and ideas you care about.
                @endif
            </h1>
            <div class="flex gap-8 border-b border-outline-variant">
                <button class="text-primary font-bold border-b-2 border-primary pb-4 font-ui-label text-ui-label">All
                    Results</button>
                <button
                    class="text-on-surface-variant font-medium pb-4 hover:text-on-surface transition-colors font-ui-label text-ui-label">Articles</button>
                <button
                    class="text-on-surface-variant font-medium pb-4 hover:text-on-surface transition-colors font-ui-label text-ui-label">Authors</button>
                <button
                    class="text-on-surface-variant font-medium pb-4 hover:text-on-surface transition-colors font-ui-label text-ui-label">Tags</button>
            </div>
        </section>
        <!-- Main Layout: Sidebar & Content -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Main Content Area -->
            <div class="md:col-span-8 space-y-12">
                @forelse($results as $article)
                    <x-article :article="$article" />
                    <div class="border-t border-outline-variant opacity-50"></div>
                @empty
                    <div class="rounded-xl border border-outline-variant bg-surface-container-low p-8 text-center">
                        <p class="font-ui-label text-ui-label text-secondary mb-3">No results found.</p>
                        <p class="text-on-surface-variant">Try a different keyword or search for a topic, author, or tag.
                        </p>
                    </div>
                @endforelse

                @if ($results->hasPages())
                    <div class="flex items-center justify-center gap-4 pt-12">
                        {{ $results->links() }}
                    </div>
                @endif
            </div>
            <!-- Sidebar Section -->
            <aside class="md:col-span-4 space-y-12">
                <!-- Top Authors -->
                <section>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider mb-6 pb-2 border-b border-outline">
                        Top Authors</h3>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img alt="Julianna Dreyfus" class="w-10 h-10 rounded-full bg-surface-container-high"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBObcYMsoxzX_vZLLwyznuD0SLSL6KVHBjKk671grYYfq1_W6lJsir7IwSnT1u_PDtdwzySBCC3dSVSd0TP3ZhJfkb6jsbx_NPN-6xewCw3wVy8RDlFjPLot7FD5nh8v1DvmJsHvkGx5RQ_XCIh9RNBArv1PV8vB5FCI6-dMdaxcZjbmRVblWXZOf3A7zAh2oDSLbi3tOrUH1SALj-gUByZb-5CKH4j1Lpfc3zJfXkIvLTu30_AS2X6YiWiY-0BjNrMswDz-wppXpGb" />
                                <div>
                                    <p class="font-ui-label text-ui-label text-on-surface font-bold">Julianna Dreyfus</p>
                                    <p class="text-metadata font-metadata text-secondary">12 articles on Minimalism</p>
                                </div>
                            </div>
                            <button
                                class="text-primary hover:underline font-ui-label text-metadata font-bold">Follow</button>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img alt="Marcus Kael" class="w-10 h-10 rounded-full bg-surface-container-high"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6ZEB2ZQT18lj1r5A3xxUhgG44jBdHw-_cDCKZnjc3dRSW0otrAODrrrHpcpdQb5LjlZDr6iLJG1z4BB9Ze_WPj0FY6XoPP5uHSDzeDUnGRTPu-MOr50pbxvqyWuN0D34TajLxV9CibA27tYXc0aMaFWwmAikt9S1AsJWBKnqoQULQUPpiw7vXPgxBByrvVS4yW-JonLVXUfCbfwKKqfyr8aPhvzzJxl9M6RVCTIy97VJ4-jK2d403l58dV5iNWVKTk1WRhty6N4Oj" />
                                <div>
                                    <p class="font-ui-label text-ui-label text-on-surface font-bold">Marcus Kael</p>
                                    <p class="text-metadata font-metadata text-secondary">8 articles on Bauhaus</p>
                                </div>
                            </div>
                            <button
                                class="text-primary hover:underline font-ui-label text-metadata font-bold">Follow</button>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img alt="Elena Thorne" class="w-10 h-10 rounded-full bg-surface-container-high"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjef4BHipMUY1aevBGr9vkL7X9_okJDAYtysyI3uGMyCepAW75GHRNk6X1jahmNEh6B2d6ZiX-odC8UNqVya9RCtGK1UgK74jnMsv2isg-cAcqO5PSnZBQ9TxlWCeviaHVtkUYcIogNIFw0XbOuu9JcYCqnztEKFU8PzkOQfYx2nECxv_XzHk7R1K7YwT7IfyGPdMv4NqqkvClGqmlZL-XnP5m-J5T9B9FiB6qQ71QmtXMKc-v5YJttHDC_2KxOi0SBbyI5XGDIU5c" />
                                <div>
                                    <p class="font-ui-label text-ui-label text-on-surface font-bold">Elena Thorne</p>
                                    <p class="text-metadata font-metadata text-secondary">5 articles on Typography</p>
                                </div>
                            </div>
                            <button
                                class="text-primary hover:underline font-ui-label text-metadata font-bold">Follow</button>
                        </div>
                    </div>
                </section>
                <!-- Related Tags -->
                <section>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface uppercase tracking-wider mb-6 pb-2 border-b border-outline">
                        Related Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                            href="#">Typography</a>
                        <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                            href="#">Bauhaus</a>
                        <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                            href="#">UX Design</a>
                        <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                            href="#">Productivity</a>
                        <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                            href="#">Stationery</a>
                        <a class="px-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-ui-label font-ui-label text-on-surface-variant hover:border-primary hover:text-primary transition-all"
                            href="#">Modernism</a>
                    </div>
                </section>
                <!-- Newsletter Card -->
                <section class="bg-primary-container p-8 rounded-lg text-on-primary">
                    <h3 class="font-headline-md text-headline-md mb-4 leading-tight">Master the Art of Focus.</h3>
                    <p class="font-body-md text-body-md opacity-90 mb-6">Join 15,000+ creators receiving our weekly
                        editorial on
                        design and deep work.</p>
                    <div class="space-y-3">
                        <input
                            class="w-full px-4 py-3 rounded border-none text-on-surface font-ui-label focus:ring-2 focus:ring-on-primary-container"
                            placeholder="Email address" type="email" />
                        <button
                            class="w-full py-3 bg-on-surface text-surface font-ui-button text-ui-button rounded hover:bg-opacity-90 transition-colors">Subscribe
                            Now</button>
                    </div>
                </section>
            </aside>
        </div>
    </div>
@endsection
