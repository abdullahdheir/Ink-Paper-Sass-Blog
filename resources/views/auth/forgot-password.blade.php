@extends('layouts.auth')

@section('title', 'Forgot Password - Ink & Paper')

@section('page-content')
<div class="w-full max-w-[440px] flex flex-col gap-8">
<!-- Branding/Icon Section -->
<div class="flex flex-col items-center text-center gap-4">
<div class="w-16 h-16 rounded-full bg-surface-container-lowest flex items-center justify-center border border-outline-variant shadow-sm">
<span class="material-symbols-outlined text-primary text-[32px]" data-icon="lock_reset">lock_reset</span>
</div>
<div class="space-y-2">
<h1 class="font-headline-md text-headline-md text-on-surface">Reset your password</h1>
<p class="font-body-md text-on-surface-variant max-w-[360px] mx-auto">
                        Enter the email address associated with your account and we'll send you a link to reset your password.
                    </p>
</div>
</div>
<!-- Form Section -->
<div class="bg-surface-container-lowest p-8 border border-outline-variant rounded-xl">
<form class="flex flex-col gap-6">
<div class="flex flex-col gap-2">
<label class="font-ui-label text-ui-label text-on-surface-variant" for="email">Email Address</label>
<input class="w-full h-12 px-4 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-ui-label text-on-surface placeholder:text-secondary-fixed-dim" id="email" name="email" placeholder="name@company.com" required="" type="email"/>
</div>
<button class="w-full h-12 bg-primary-container hover:bg-primary text-on-primary font-ui-button text-ui-button rounded-lg transition-all active:scale-[0.98] active:opacity-90 shadow-sm" type="submit">
                        Send Reset Link
                    </button>
</form>
</div>
<!-- Supporting Illustration (Subtle) -->
<div class="relative w-full h-48 rounded-xl overflow-hidden grayscale opacity-40 hover:opacity-80 transition-opacity duration-700">
<img alt="Minimalist study space" class="w-full h-full object-cover" data-alt="A clean, minimalist workspace featuring a stack of high-quality cream-colored paper and a sleek black ink pen resting on top. The scene is shot from a high angle with soft, bright natural lighting coming from a side window, creating delicate shadows. The aesthetic is monochromatic and quiet, emphasizing the Paper and Ink theme of the platform. The overall mood is focused, serene, and professional." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBa4NDSej0z5gbXHGBYJI-znfvY5P2CQXiE3l4Y8BBTagXhBklDJANDqUqvZ6RV0ij63Z3KiOVcNReu0hHTvQVJZbdqeQbMmRQuJgZhJD_sbqA5t91oxufjBC-e6YitreIJIHMcqYlUdMuZV9LqaW6GQ2SXV5gRVjjEJPVN_Cb621vR71s-08ugKIUQPG81_N3BpyM_HTAmaYLGVvtw2VJd1GOe2Mum79WovoT-PHVyq9goKJEbb1MmOcZB28PmCU6E10nNQ05oc8KF"/>
</div>
<!-- Footer Link -->
<div class="text-center">
<a class="font-ui-label text-ui-label text-secondary hover:text-on-surface underline transition-all" href="/login">
                    I remember my password
                </a>
</div>
</div>
@endsection
