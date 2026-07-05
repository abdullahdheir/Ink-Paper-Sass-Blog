<!-- Side Navigation -->
<aside class="w-64 border-r border-outline-variant hidden md:block pt-8 px-gutter">
    <div class="flex flex-col gap-2">
        <a class="flex items-center gap-3 px-4 py-3 @if (request()->routeIs('dashboard')) bg-primary-container/10 text-primary @else  text-on-surface-variant hover:bg-surface-container @endif rounded-lg font-ui-label text-ui-label"
            href="{{ route('dashboard.index') }}">
            <span class="material-symbols-outlined" data-weight="fill">dashboard</span>
            My Articles
        </a>
        {{-- <a class="flex items-center gap-3 px-4 py-3 @if (request()->routeIs('dashboard.analytics')) bg-primary-container/10 text-primary @else  text-on-surface-variant hover:bg-surface-container @endif rounded-lg font-ui-label text-ui-label transition-colors"
            href="{{ route('dashboard.analytics') }}">
            <span class="material-symbols-outlined">analytics</span>
            Analytics
        </a> --}}
        <a class="flex items-center gap-3 px-4 py-3 @if (request()->routeIs('dashboard.drafts')) bg-primary-container/10 text-primary @else  text-on-surface-variant hover:bg-surface-container @endif rounded-lg font-ui-label text-ui-label transition-colors"
            href="{{ route('dashboard.drafts') }}">
            <span class="material-symbols-outlined">draft</span>
            Drafts
        </a>
        <div class="my-4 border-t border-outline-variant opacity-30"></div>
        <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container rounded-lg font-ui-label text-ui-label transition-colors"
            href="{{ route('settings.account') }}">
            <span class="material-symbols-outlined">settings</span>
            Settings
        </a>
    </div>
</aside>
