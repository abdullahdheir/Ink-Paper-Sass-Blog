@extends('layouts.settings')

@section('title', 'Account Settings - Ink & Paper')

@section('settings-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-surface border border-outline-variant rounded-2xl p-6">
        <h1 class="font-headline-md text-headline-md text-on-surface mb-1">Account Settings</h1>
        <p class="font-body-md text-body-md text-secondary">Manage your email address, password, and subscription plan.</p>
    </div>

    <!-- Email Address -->
    <form action="{{ route('user-profile-information.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="name" value="{{ auth()->user()->name }}">

        <div class="bg-surface border border-outline-variant rounded-2xl p-6">
            <div class="flex items-start justify-between mb-5">
                <div>
                    <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-1">Email Address</h2>
                    <p class="font-metadata text-metadata text-secondary">The email associated with your account.</p>
                </div>
                <button type="submit"
                    class="px-5 py-2 border border-outline-variant text-on-surface font-ui-button text-ui-button rounded-xl hover:bg-surface-container transition-all flex-shrink-0">
                    Update
                </button>
            </div>

            @if (session('status') === 'profile-information-updated')
                <div class="mb-4 flex items-center gap-2 text-primary font-ui-label text-ui-label bg-primary-container/10 border border-primary/20 rounded-xl px-4 py-3">
                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Email updated successfully.
                </div>
            @endif

            <div class="flex items-center gap-3 bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3">
                <span class="material-symbols-outlined text-secondary text-[20px]">mail</span>
                <input type="email" name="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    class="flex-1 bg-transparent border-none focus:ring-0 font-body-md text-body-md text-on-surface outline-none" />
            </div>
            @error('email')
                <p class="text-error font-metadata text-metadata mt-2">{{ $message }}</p>
            @enderror
        </div>
    </form>

    <!-- Password -->
    <form action="{{ route('user-password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-surface border border-outline-variant rounded-2xl p-6">
            <div class="flex items-start justify-between mb-5">
                <div>
                    <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-1">Password</h2>
                    <p class="font-metadata text-metadata text-secondary">Keep your account secure with a strong password.</p>
                </div>
                <button type="submit"
                    class="px-5 py-2 border border-outline-variant text-on-surface font-ui-button text-ui-button rounded-xl hover:bg-surface-container transition-all flex-shrink-0">
                    Update
                </button>
            </div>

            @if (session('status') === 'password-updated')
                <div class="mb-4 flex items-center gap-2 text-primary font-ui-label text-ui-label bg-primary-container/10 border border-primary/20 rounded-xl px-4 py-3">
                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Password updated successfully.
                </div>
            @endif

            <div class="space-y-4">
                <div class="flex flex-col gap-1.5">
                    <label class="font-ui-label text-ui-label text-on-surface-variant font-medium">Current Password</label>
                    <input type="password" name="current_password"
                        class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md bg-surface @error('current_password') border-error @enderror" />
                    @error('current_password')
                        <p class="text-error font-metadata text-metadata">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="font-ui-label text-ui-label text-on-surface-variant font-medium">New Password</label>
                        <input type="password" name="password"
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md bg-surface @error('password') border-error @enderror" />
                        @error('password')
                            <p class="text-error font-metadata text-metadata">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="font-ui-label text-ui-label text-on-surface-variant font-medium">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md bg-surface" />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Subscription Plan -->
    <div class="bg-surface border border-outline-variant rounded-2xl p-6">
        <div class="flex items-start justify-between mb-5">
            <div>
                <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-1">Subscription Plan</h2>
                <p class="font-metadata text-metadata text-secondary">Your current tier and billing cycle.</p>
            </div>
            <a href="{{ route('pricing') }}"
                class="px-5 py-2 bg-primary-container text-on-primary font-ui-button text-ui-button rounded-xl hover:opacity-90 transition-all flex-shrink-0">
                Manage
            </a>
        </div>
        <div class="flex items-center gap-5 p-5 rounded-xl bg-gradient-to-br from-primary-container/5 to-primary-container/15 border border-primary-container/20">
            <div class="w-14 h-14 rounded-full bg-primary-container flex items-center justify-center text-on-primary flex-shrink-0">
                <span class="material-symbols-outlined text-[28px]" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
            </div>
            <div>
                <p class="font-headline-md text-[20px] text-on-surface font-bold mb-0.5">Ink &amp; Paper Plus</p>
                <p class="font-metadata text-metadata text-secondary">Annual membership · Renews Oct 12, 2025</p>
            </div>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="bg-surface border border-error/30 rounded-2xl p-6">
        <h2 class="font-ui-label text-ui-label font-bold text-error mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">warning</span>
            Danger Zone
        </h2>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 p-5 bg-error-container/10 border border-error/10 rounded-xl">
            <div>
                <h3 class="font-ui-label text-ui-label font-bold text-on-surface mb-1">Delete Account</h3>
                <p class="font-metadata text-metadata text-secondary max-w-md">Permanently remove your account and all published content. This action cannot be undone.</p>
            </div>
            <div class="flex gap-3 flex-shrink-0">
                <button class="font-ui-label text-ui-label text-secondary hover:text-on-surface underline underline-offset-4 transition-colors">
                    Deactivate
                </button>
                <button
                    class="bg-error text-on-error font-ui-button text-ui-button px-5 py-2.5 rounded-xl hover:bg-error/90 transition-all active:scale-95">
                    Delete Forever
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
