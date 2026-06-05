@extends('layouts.auth')

@section('title', 'Reset Password - Ink & Paper')

@section('page-content')
<div class="w-full max-w-[440px]">
<!-- Link Verification Success Banner -->
<div class="mb-8 flex items-center gap-4 p-4 rounded-lg bg-surface-container border border-outline-variant">
<span class="material-symbols-outlined text-primary" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
<div>
<p class="font-ui-label text-ui-label text-on-surface font-bold">Link Verified</p>
<p class="font-metadata text-metadata text-secondary">Your reset token is valid. You may now choose a new password.</p>
</div>
</div>
<!-- Form Container -->
<div class="paper-card border border-outline-variant p-8 md:p-10 rounded-xl">
<div class="mb-10 text-center">
<h1 class="font-headline-md text-headline-md mb-2">Reset Password</h1>
<p class="font-body-md text-body-md text-secondary">Ensure your account is secure by using a complex, unique password.</p>
</div>
<form action="#" class="space-y-8" method="POST">
<!-- New Password -->
<div class="space-y-2">
<label class="block font-ui-label text-ui-label text-on-surface-variant" for="new_password">New Password</label>
<div class="relative">
<input class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-ui-label text-ui-label" id="new_password" name="new_password" placeholder="••••••••" required="" type="password"/>
<button class="absolute right-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline" data-icon="visibility" type="button">visibility</button>
</div>
<!-- Password Strength Indicator -->
<div class="pt-2">
<div class="flex gap-1 h-1 mb-2">
<div class="flex-1 bg-primary rounded-full"></div>
<div class="flex-1 bg-primary rounded-full"></div>
<div class="flex-1 bg-primary rounded-full"></div>
<div class="flex-1 bg-surface-container-high rounded-full"></div>
</div>
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px] text-primary" data-icon="check_circle">check_circle</span>
<span class="font-metadata text-metadata text-secondary">Strong: Mix of symbols and letters</span>
</div>
</div>
</div>
<!-- Confirm New Password -->
<div class="space-y-2">
<label class="block font-ui-label text-ui-label text-on-surface-variant" for="confirm_password">Confirm New Password</label>
<div class="relative">
<input class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary outline-none transition-all font-ui-label text-ui-label" id="confirm_password" name="confirm_password" placeholder="••••••••" required="" type="password"/>
</div>
</div>
<!-- Primary Action -->
<button class="w-full bg-primary-container text-on-primary font-ui-button text-ui-button py-4 rounded-lg hover:shadow-lg transition-all active:scale-95 active:opacity-90" type="submit">
                        Update Password
                    </button>
</form>
<div class="mt-8 text-center">
<a class="font-ui-label text-ui-label text-secondary hover:text-on-surface hover:underline transition-all inline-flex items-center gap-1" href="#">
<span class="material-symbols-outlined text-[16px]" data-icon="arrow_back">arrow_back</span>
                        Back to sign in
                    </a>
</div>
</div>
<!-- Contextual Editorial Card (Bento-style element) -->
<div class="mt-12 grid grid-cols-1 gap-4">
<div class="paper-card border border-outline-variant p-6 rounded-xl flex items-center gap-6">
<div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
<img alt="Security" class="w-full h-full object-cover grayscale" data-alt="A macro close-up of a vintage typewriter key hitting white paper, captured in high-contrast black and white photography. The lighting is sharp and cinematic, highlighting the ink texture on the paper. The mood is professional, intellectual, and focused on security and detail. Minimalist editorial aesthetic consistent with high-end publishing." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDr3ZJ2_N4WBBdyo0CmryL-OZQiPenhzgosOjIQa_17BCJ-GnX-3hrdbmx9L6GJGIllFUmkfZqtI42hkgq90QzFVC0YrWqAUcwJmncntHKZ1qE3BmxH43xB5hVFFecgrk06ZnUEPR8Mfxzy2Ncm6cbCGtWOdVlQIdY5OejoRD2TMwrmQh7-56opJQg5OrbH26E1MfKY09pETWPraP80I-Sn0EiVHUyf5ZTQcYk9OSnyoMSSPG1LJqc2DwlOFioHP7Q_pzT9NN2Qc4s0"/>
</div>
<div>
<h4 class="font-ui-label text-ui-label font-bold mb-1">Security Best Practices</h4>
<p class="font-metadata text-metadata text-secondary leading-relaxed">We recommend using a password manager and enabling two-factor authentication for maximum account protection.</p>
</div>
</div>
</div>
</div>
@endsection
