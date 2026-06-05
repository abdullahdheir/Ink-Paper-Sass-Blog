@extends('layouts.public')

@section('title', 'Complete Subscription - Ink & Paper')

@section('page-content')
<div class="max-w-container-max w-full grid grid-cols-1 md:grid-cols-12 gap-12 items-start">
<!-- Left Column: Plan Summary -->
<section class="md:col-span-5 lg:col-span-4 space-y-8">
<div class="space-y-4">
<span class="font-ui-label text-ui-label text-primary uppercase tracking-widest">Subscription Plan</span>
<h1 class="font-headline-md text-headline-md text-on-surface">Ink &amp; Paper Pro</h1>
<p class="font-body-md text-body-md text-secondary">Join our community of elite authors and creators. Get the tools you need to build a professional publication.</p>
</div>
<div class="space-y-6 bg-surface-container-low p-8 rounded-lg border border-outline-variant">
<div class="flex justify-between items-end pb-4 border-b border-outline-variant">
<div>
<p class="font-ui-label text-ui-label text-secondary">Monthly total</p>
<h2 class="font-display-lg text-display-lg text-on-surface">
<div class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
<div class="text-center py-20">
<h1 class="font-headline-md text-headline-md text-on-surface mb-4">Complete Subscription</h1>
<p class="text-on-surface-variant">This page is under construction. Full template coming soon.</p>
</div>
</div>
9.00</h2>
</div>
<span class="font-metadata text-metadata text-secondary mb-2">USD / month</span>
</div>
<ul class="space-y-4">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container" data-icon="check_circle">check_circle</span>
<span class="font-ui-label text-ui-label text-on-surface">Unlimited private drafts and collaborative editing</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container" data-icon="check_circle">check_circle</span>
<span class="font-ui-label text-ui-label text-on-surface">Custom domain support for your publication</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container" data-icon="check_circle">check_circle</span>
<span class="font-ui-label text-ui-label text-on-surface">Advanced reader analytics and heatmaps</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary-container" data-icon="check_circle">check_circle</span>
<span class="font-ui-label text-ui-label text-on-surface">Priority visibility in the 'Paper' discovery feed</span>
</li>
</ul>
</div>
<div class="flex flex-col gap-4 p-4 border border-dashed border-outline rounded-lg">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary" data-icon="verified_user">verified_user</span>
<span class="font-ui-label text-ui-label font-bold text-on-surface">Secure Payment</span>
</div>
<p class="font-metadata text-metadata text-secondary">All transactions are encrypted and secured by bank-level infrastructure. Your payment details are never stored on our servers.</p>
<div class="flex items-center gap-3 mt-2">
<span class="material-symbols-outlined text-secondary" data-icon="event_repeat">event_repeat</span>
<span class="font-ui-label text-ui-label font-bold text-on-surface">Cancel Anytime</span>
</div>
</div>
</section>
<!-- Right Column: Payment Form -->
<section class="md:col-span-7 lg:col-span-8 bg-surface-container-lowest p-8 md:p-12 rounded-xl border border-outline-variant shadow-sm">
<form action="#" class="space-y-8">
<!-- Card Details Section -->
<div class="space-y-6">
<h3 class="font-ui-label text-ui-label font-bold text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined" data-icon="credit_card">credit_card</span>
              Payment Method
            </h3>
<div class="space-y-4">
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="card_name">Name on Card</label>
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="card_name" placeholder="Johnathan Doe" type="text"/>
</div>
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="card_number">Card Number</label>
<div class="relative">
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="card_number" placeholder="0000 0000 0000 0000" type="text"/>
<div class="absolute right-4 top-1/2 -translate-y-1/2 flex gap-2">
<img alt="Visa" class="h-4" data-alt="A small Visa logo icon with its signature blue and yellow color palette, presented in a minimalist high-contrast digital format suitable for a clean UI. The lighting is flat and even, ensuring clarity against a white background within a focused checkout screen." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpgeNmnclr3zKGHG0MkmCQBNqJJ85yPFEBqSTSV2e8u50FkrOMZj3L22FiJbsqYjLYRHWSi0PnzHs94_dF392l8574PxAXHsfGq204-eXbd8Kf7vAwNxNwpz97RgBCJzVshqo4hJ9_jQfk8Ya3t1zhCCQJ2AUsKt4wKaSb7IQwDOLXrXdEGtXvbgX3uLUtsWD-4g6VuZW3W9cvykxhAis-j5FYQJkvh04F9ipfGA-VrMO9SPUl_mAidBlVxON3AlIUlpN_eJZwhH3j"/>
<img alt="Mastercard" class="h-4" data-alt="A small Mastercard logo icon featuring its iconic red and orange overlapping circles, styled with a modern flat aesthetic. The image is rendered with high precision to fit into a sleek, paper-inspired checkout form for an intellectual publication platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCd1JfZhEI8KvqHQqw1liaW_vS22ALA2cjkSO-s3IfEbNWqT-t513IlPeQGzKsb2LNkUaWi9dtb1pibt3AuUMd0_EB3NEDjULw9JtkNnmPMThRPDtA3r7nMCaWqSMJy8w2E8t90s9kCZyMFpdCmCYCCewwy7tdDmE8CGdfVFV88v3D8pspmkn86D6Hp0Ow35fMNIy0SaIIYdSTNA__flvPUrifx2slihXfXs_1knnxNNy0XX7YHVQ2ISnDpcg9NwVHekAHA4he2cIMU"/>
</div>
</div>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="card_expiry">Expiry Date</label>
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="card_expiry" placeholder="MM/YY" type="text"/>
</div>
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="card_cvc">CVC</label>
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="card_cvc" placeholder="123" type="text"/>
</div>
</div>
</div>
</div>
<!-- Billing Address Section -->
<div class="space-y-6 pt-6 border-t border-outline-variant">
<h3 class="font-ui-label text-ui-label font-bold text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined" data-icon="location_on">location_on</span>
              Billing Address
            </h3>
<div class="space-y-4">
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="billing_country">Country</label>
<select class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label bg-white" id="billing_country">
<option>United States</option>
<option>United Kingdom</option>
<option>Canada</option>
<option>Germany</option>
</select>
</div>
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="billing_street">Street Address</label>
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="billing_street" placeholder="123 Writer's Block" type="text"/>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="billing_city">City</label>
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="billing_city" placeholder="Lexicon" type="text"/>
</div>
<div class="grid grid-cols-1 gap-1">
<label class="font-ui-label text-ui-label text-secondary" for="billing_zip">Postal Code</label>
<input class="w-full px-4 py-3 rounded border border-outline-variant focus:border-primary-container focus:ring-1 focus:ring-primary-container outline-none transition-all font-metadata text-ui-label" id="billing_zip" placeholder="90210" type="text"/>
</div>
</div>
</div>
</div>
<!-- Submit Action -->
<div class="space-y-4 pt-6">
<button class="w-full py-4 px-6 bg-primary-container text-on-primary-container font-ui-button text-ui-button rounded-lg hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2" type="submit">
              Start Subscription — 
<div class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
<div class="text-center py-20">
<h1 class="font-headline-md text-headline-md text-on-surface mb-4">Complete Subscription</h1>
<p class="text-on-surface-variant">This page is under construction. Full template coming soon.</p>
</div>
</div>
9.00/mo
              <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
</button>
<p class="font-metadata text-metadata text-center text-secondary">
              By clicking "Start Subscription", you agree to our <a class="underline hover:text-on-surface" href="#">Terms of Service</a> and <a class="underline hover:text-on-surface" href="#">Privacy Policy</a>.
            </p>
</div>
</form>
</section>
</div>
@endsection
