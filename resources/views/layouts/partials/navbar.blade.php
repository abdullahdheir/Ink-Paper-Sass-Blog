<!-- TopNavBar -->
<header class="fixed top-0 z-50 w-full bg-surface border-b border-outline-variant">
    <div class="flex justify-between items-center w-full px-gutter max-w-container-max mx-auto h-16">
        <div class="flex items-center gap-8">
            <a class="font-display-lg-mobile text-display-lg-mobile font-bold text-on-surface" href="/">Ink &amp;
                Paper</a>
            <nav class="hidden md:flex items-center gap-6">
                <a class="text-primary font-bold border-b-2 border-primary pb-1 font-ui-label text-ui-label hover:text-primary transition-colors duration-200"
                    href="/">Feed</a>
                <a class="text-on-surface-variant font-medium font-ui-label text-ui-label hover:text-primary transition-colors duration-200"
                    href="">Authors</a>
                <a class="text-on-surface-variant font-medium font-ui-label text-ui-label hover:text-primary transition-colors duration-200"
                    href="{{ route('dashboard.index') }}">Dashboard</a>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <form action="{{ route('search') }}" method="GET"
                class="hidden lg:flex items-center bg-surface-container border border-outline-variant rounded-full px-4 py-1.5 gap-2">
                <span class="material-symbols-outlined text-secondary">search</span>
                <input name="q" value="{{ request('q') }}"
                    class="bg-transparent border-0 outline-0 text-ui-label font-ui-label w-48" placeholder="Search..."
                    type="search" />
            </form>
            <div class="flex items-center gap-2">
                @auth
                    {{-- Notification Bell --}}
                    @include('components.notification-bell')
                    <button class="p-2 text-on-surface-variant hover:bg-surface-container-high rounded-full transition-all">
                        <span class="material-symbols-outlined">bookmark</span>
                    </button>
                    <a href="{{ route('articles.create') }}"
                        class="bg-primary-container text-on-primary font-ui-button text-ui-button px-4 py-2 rounded-lg hover:opacity-90 active:scale-95 transition-all">Publish
                        Article</a>
                    <!-- Profile Dropdown -->
                    <div class="relative ml-2" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open"
                            class="flex items-center gap-2 rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all">
                            <div
                                class="w-9 h-9 rounded-full overflow-hidden border-2 border-outline-variant hover:border-primary transition-colors">
                                <img alt="{{ auth()->user()->name ?? 'User' }}" class="w-full h-full object-cover"
                                    src="{{ auth()->user()->avatar }}" />
                            </div>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                            class="absolute right-0 mt-2 w-60 bg-surface rounded-xl border border-outline-variant shadow-xl z-50 overflow-hidden"
                            style="display: none;">
                            <!-- User Info -->
                            <div class="px-4 py-3 border-b border-outline-variant bg-surface-container-low">
                                <p class="font-ui-label text-ui-label font-bold text-on-surface truncate">
                                    {{ auth()->user()->name ?? 'User' }}</p>
                                <p class="font-metadata text-metadata text-secondary truncate">
                                    {{ auth()->user()->email ?? '' }}</p>
                            </div>
                            <!-- Links -->
                            <div class="py-1">
                                <a href="{{ route('settings.profile') }}"
                                    class="flex items-center gap-3 px-4 py-2.5 text-on-surface hover:bg-surface-container transition-colors font-ui-label text-ui-label">
                                    <span class="material-symbols-outlined text-[20px] text-secondary">person</span>
                                    Public Profile
                                </a>
                                <a href="{{ route('settings.account') }}"
                                    class="flex items-center gap-3 px-4 py-2.5 text-on-surface hover:bg-surface-container transition-colors font-ui-label text-ui-label">
                                    <span class="material-symbols-outlined text-[20px] text-secondary">settings</span>
                                    Account Settings
                                </a>
                                <a href="{{ route('settings.security') }}"
                                    class="flex items-center gap-3 px-4 py-2.5 text-on-surface hover:bg-surface-container transition-colors font-ui-label text-ui-label">
                                    <span class="material-symbols-outlined text-[20px] text-secondary">security</span>
                                    Security
                                </a>
                            </div>
                            <!-- Logout -->
                            <div class="py-1 border-t border-outline-variant">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center gap-3 px-4 py-2.5 text-error hover:bg-error-container/20 transition-colors font-ui-label text-ui-label">
                                        <span class="material-symbols-outlined text-[20px]">logout</span>
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-primary-container text-on-primary font-ui-button text-ui-button px-4 py-2 rounded-lg hover:opacity-90 active:scale-95 transition-all">Login</a>
                @endauth
            </div>
        </div>
    </div>
</header>
