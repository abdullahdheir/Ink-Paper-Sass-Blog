@extends('layouts.auth')

@section('title', 'Create Account - Ink & Paper')

@section('page-content')
    <div class="min-h-[calc(100vh-128px)] flex items-center justify-center py-section-gap px-gutter">
        <div class="w-full max-w-[440px]">
            <div
                class="bg-surface-container-lowest border border-outline-variant p-8 md:p-10 rounded-lg shadow-[0_20px_30px_-10px_rgba(0,0,0,0.05)]">
                <section class="mb-10 text-center">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-3">Create Account</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Join a community of thoughtful writers and
                        readers.</p>
                </section>
                <!-- Social Sign Up -->
                {{-- <div class="grid grid-cols-2 gap-4 mb-8">
                    <button
                        class="flex items-center justify-center gap-3 py-3 border border-outline-variant rounded-lg font-ui-button text-ui-button text-on-surface hover:bg-surface-container-low transition-colors duration-200 focus:ring-2 focus:ring-primary focus:outline-none">
                        <svg class="w-5 h-5" viewbox="0 0 24 24">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="currentColor"></path>
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="currentColor"></path>
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.26.81-.58z"
                                fill="currentColor"></path>
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="currentColor"></path>
                        </svg>
                        Google
                    </button>
                    <button
                        class="flex items-center justify-center gap-3 py-3 border border-outline-variant rounded-lg font-ui-button text-ui-button text-on-surface hover:bg-surface-container-low transition-colors duration-200 focus:ring-2 focus:ring-primary focus:outline-none">
                        <svg class="w-5 h-5" viewbox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z"
                                fill="currentColor"></path>
                        </svg>
                        Twitter
                    </button>
                </div>
                <div class="relative flex items-center justify-center mb-8">
                    <hr class="w-full border-outline-variant" />
                    <span class="absolute px-4 bg-surface-container-lowest font-metadata text-metadata text-secondary">OR
                        CONTINUE WITH EMAIL</span>
                </div> --}}
                <!-- Registration Form -->
                <!-- Error Messages -->
                <div class="mb-6">
                    @foreach ($errors->all() as $error)
                        <div class="bg-error-container text-on-error p-3 rounded mb-2">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
                <form action="{{ route('register.store') }}" class="space-y-6" method="POST">
                    @csrf
                    <div>
                        <label class="block font-ui-label text-ui-label text-on-surface mb-2" for="full_name">Full
                            Name</label>
                        <input
                            class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-ui-label"
                            id="full_name" name="name" placeholder="E.g. Julian Barnes" required="" type="text"
                            value="{{ old('name') }}" />
                    </div>
                    <div>
                        <label class="block font-ui-label text-ui-label text-on-surface mb-2" for="email">Email
                            Address</label>
                        <input
                            class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-ui-label"
                            id="email" name="email" placeholder="julian@inkandpaper.com" required="" type="email"
                            value="{{ old('email') }}" />
                    </div>
                    <div>
                        <label class="block font-ui-label text-ui-label text-on-surface mb-2"
                            for="password">Password</label>
                        <div class="relative">
                            <input
                                class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-ui-label"
                                id="password" name="password" placeholder="At least 12 characters" required=""
                                type="password" value="{{ old('password') }}" />
                            <button
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors"
                                type="button">
                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block font-ui-label text-ui-label text-on-surface mb-2"
                            for="password_confirmation">Confirm Password</label>
                        <div class="relative">
                            <input
                                class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:border-primary-container focus:ring-1 focus:ring-primary-container transition-all outline-none font-ui-label"
                                id="password_confirmation" name="password_confirmation" placeholder="Confirm your password"
                                required="" type="password" value="{{ old('password_confirmation') }}" />
                            <button
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors"
                                type="button">
                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </button>
                        </div>
                    </div>
                    <div class="pt-2">
                        <button
                            class="w-full bg-primary-container text-on-primary py-4 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary-container/20"
                            type="submit">
                            Create Account
                        </button>
                    </div>
                </form>
                <footer class="mt-8 text-center">
                    <p class="font-metadata text-metadata text-on-surface-variant">
                        Already have an account?
                        <a class="font-ui-label text-primary hover:underline ml-1" href="{{ route('login') }}">Log in</a>
                    </p>
                </footer>
            </div>
        </div>
    </div>
@endsection
