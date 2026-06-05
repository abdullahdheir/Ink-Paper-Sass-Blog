@extends('layouts.dashboard')

@section('page-content')
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Settings Sidebar -->
        <aside class="md:col-span-3">
            <div class="bg-surface border border-outline-variant rounded-2xl p-5 sticky top-24">
                <!-- User Card -->
                <div class="flex items-center gap-3 mb-6 pb-5 border-b border-outline-variant">
                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-outline-variant flex-shrink-0">
                        <img alt="{{ auth()->user()->name ?? 'User' }}" class="w-full h-full object-cover"
                            src="{{ auth()->user()->avatar_path ? Storage::url(auth()->user()->avatar_path) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'U') . '&background=6750A4&color=fff&size=128' }}" />
                    </div>
                    <div class="min-w-0">
                        <p class="font-ui-label text-ui-label font-bold text-on-surface truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="font-metadata text-metadata text-secondary truncate">{{ '@' . (auth()->user()->username ?? \Illuminate\Support\Str::slug(auth()->user()->name ?? 'user', '_')) }}</p>
                    </div>
                </div>

                <p class="font-metadata text-metadata text-secondary uppercase tracking-widest font-bold px-3 mb-2">Settings</p>
                <nav class="space-y-1">
                    @php $current = request()->path(); @endphp

                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-ui-label text-ui-label transition-all
                        {{ $current === 'settings/profile' ? 'bg-primary-container/15 text-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface' }}"
                        href="{{ route('settings.profile') }}">
                        <span class="material-symbols-outlined text-[20px] {{ $current === 'settings/profile' ? 'text-primary' : 'text-outline' }}"
                            style="{{ $current === 'settings/profile' ? 'font-variation-settings: \'FILL\' 1;' : '' }}">person</span>
                        Public Profile
                        @if($current === 'settings/profile')
                            <span class="ml-auto w-1.5 h-1.5 rounded-full bg-primary"></span>
                        @endif
                    </a>

                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-ui-label text-ui-label transition-all
                        {{ $current === 'settings/account' ? 'bg-primary-container/15 text-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface' }}"
                        href="{{ route('settings.account') }}">
                        <span class="material-symbols-outlined text-[20px] {{ $current === 'settings/account' ? 'text-primary' : 'text-outline' }}"
                            style="{{ $current === 'settings/account' ? 'font-variation-settings: \'FILL\' 1;' : '' }}">manage_accounts</span>
                        Account
                        @if($current === 'settings/account')
                            <span class="ml-auto w-1.5 h-1.5 rounded-full bg-primary"></span>
                        @endif
                    </a>

                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-ui-label text-ui-label transition-all
                        {{ $current === 'settings/notifications' ? 'bg-primary-container/15 text-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface' }}"
                        href="{{ route('settings.notifications') }}">
                        <span class="material-symbols-outlined text-[20px] {{ $current === 'settings/notifications' ? 'text-primary' : 'text-outline' }}"
                            style="{{ $current === 'settings/notifications' ? 'font-variation-settings: \'FILL\' 1;' : '' }}">notifications</span>
                        Notifications
                        @if($current === 'settings/notifications')
                            <span class="ml-auto w-1.5 h-1.5 rounded-full bg-primary"></span>
                        @endif
                    </a>

                    <a class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-ui-label text-ui-label transition-all
                        {{ $current === 'settings/security' ? 'bg-primary-container/15 text-primary font-bold' : 'text-on-surface-variant hover:bg-surface-container hover:text-on-surface' }}"
                        href="{{ route('settings.security') }}">
                        <span class="material-symbols-outlined text-[20px] {{ $current === 'settings/security' ? 'text-primary' : 'text-outline' }}"
                            style="{{ $current === 'settings/security' ? 'font-variation-settings: \'FILL\' 1;' : '' }}">security</span>
                        Security
                        @if($current === 'settings/security')
                            <span class="ml-auto w-1.5 h-1.5 rounded-full bg-primary"></span>
                        @endif
                    </a>

                    <div class="h-px bg-outline-variant my-3"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl font-ui-label text-ui-label text-error hover:bg-error-container/20 transition-all">
                            <span class="material-symbols-outlined text-[20px]">logout</span>
                            Log out
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Settings Content -->
        <div class="md:col-span-9">
            @yield('settings-content')
        </div>
    </div>
@endsection
