@extends('layouts.auth')

@section('title', 'Sign In - Ink & Paper')

@section('page-content')
    <!-- Main Content Canvas -->
    <div class="w-full max-w-[440px]">
            <!-- Login Card -->
            <div
                class="bg-surface-container-lowest border border-outline-variant p-8 md:p-10 rounded-lg shadow-[0_20px_30px_-10px_rgba(0,0,0,0.05)] transition-all">
                <div class="mb-8 text-center md:text-left">
                    <h1 class="font-headline-md text-headline-md text-on-surface mb-2">Welcome back</h1>
                    <p class="font-body-md text-secondary">Sign in to your editorial workspace.</p>
                </div>
                <!-- Error Messages -->
                <div class="mb-6">
                    @if (session('error'))
                        <div class="bg-error-container text-on-error p-3 rounded mb-2">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="font-ui-label text-ui-label text-on-surface-variant block" for="email">Email
                            Address</label>
                        <input
                            class="w-full h-12 px-4 bg-surface-bright border border-outline-variant rounded focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all font-ui-label text-on-surface placeholder:text-outline"
                            id="email" name="email" placeholder="name@domain.com" required="" type="email"
                            value="{{ old('email') }}" />
                    </div>
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label class="font-ui-label text-ui-label text-on-surface-variant"
                                for="password">Password</label>
                            <a class="font-ui-label text-ui-label text-primary hover:underline transition-all"
                                href="/auth/forgot-password">Forgot Password?</a>
                        </div>
                        <input
                            class="w-full h-12 px-4 bg-surface-bright border border-outline-variant rounded focus:ring-1 focus:ring-primary focus:border-primary outline-none transition-all font-ui-label text-on-surface placeholder:text-outline"
                            id="password" name="password" placeholder="••••••••" required="" type="password" />
                    </div>
                    <!-- Remember Me -->
                    <div class="flex items-center gap-3">
                        <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary transition-all"
                            id="remember" name="remember" type="checkbox" />
                        <label class="font-ui-label text-ui-label text-on-secondary-fixed-variant select-none"
                            for="remember">Remember me for 30 days</label>
                    </div>
                    <!-- Primary Action -->
                    <button
                        class="w-full h-12 bg-primary-container text-on-primary font-ui-button text-ui-button rounded hover:bg-primary active:scale-95 transition-all flex justify-center items-center gap-2"
                        type="submit">
                        Sign In
                    </button>
                </form>
                <!-- Divider -->
                {{-- <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-outline-variant"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span
                            class="bg-surface-container-lowest px-4 font-metadata text-metadata text-outline uppercase tracking-widest">or
                            continue with</span>
                    </div>
                </div>
                <!-- Social Logins -->
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="h-12 border border-on-surface flex items-center justify-center gap-3 font-ui-label text-ui-label text-on-surface hover:bg-surface-container transition-all rounded">
                        <span class="material-symbols-outlined text-[20px]">cloud</span>
                        Google
                    </button>
                    <button
                        class="h-12 border border-on-surface flex items-center justify-center gap-3 font-ui-label text-ui-label text-on-surface hover:bg-surface-container transition-all rounded">
                        <span class="material-symbols-outlined text-[20px]">terminal</span>
                        Github
                    </button>
                </div> --}}
                <!-- Footer Link -->
                <div class="mt-10 text-center">
                    <p class="font-ui-label text-ui-label text-on-surface-variant">
                        New to Ink &amp; Paper?
                        <a class="text-primary font-bold hover:underline transition-all ml-1"
                            href="{{ route('register') }}">Create an Account</a>
                    </p>
                </div>
            </div>
            <!-- Transactional Context Image -->
            <div class="mt-12 opacity-40 grayscale group-hover:grayscale-0 transition-all">
                <img alt="Inspiration" class="w-full h-24 object-cover rounded-lg border border-outline-variant grayscale"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaZzKZpXNwoxBOGg9qTCZOzjVtZgaq3v5K8sIDlTkB84CPOVf_AboEgvK7uVkq_-xo579Nl8Lo_BtjUxPflCR4Vgbs6kRK6ky6zyEvGrEfWMFD3oPgLRwRAb-c4f8jO73qjl1LwUEEI32HZaEuxonXTXoetuE3qdUGsu4Ec9HO4UuTL2phazkyVjlixFHaaGQ94g5tBW6pagkXvkhyBeSbasPRz9MmVa4P2sa8aFZocu96y0agSrKIXhQjp8QNtmD-Yzbod-SeXTOE" />
            </div>
        </div>
@endsection
