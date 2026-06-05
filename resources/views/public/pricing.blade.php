@extends('layouts.public')

@section('title', 'Pricing - Ink & Paper')

@section('page-content')
    <!-- Hero Section -->
    <section class="text-center mb-16 max-w-article-max mx-auto">
        <h1 class="font-display-lg text-display-lg mb-4 text-on-surface">Choose Your Creative Space</h1>
        <p class="text-body-lg text-secondary mb-8">Transparent pricing for solitary thinkers, professional writers, and
            digital newsrooms. No hidden fees, just pure focus.</p>
        <div class="flex justify-center items-center gap-4 font-ui-label text-ui-label">
            <span class="text-on-surface">Monthly</span>
            <div class="w-12 h-6 bg-secondary-container rounded-full relative cursor-pointer">
                <div class="absolute left-1 top-1 w-4 h-4 bg-primary-container rounded-full"></div>
            </div>
            <span class="text-on-surface-variant">Yearly <span class="text-primary font-bold">(Save 20%)</span></span>
        </div>
    </section>
    <!-- Pricing Cards -->
    <div class="pricing-grid mb-section-gap">
        <!-- Free Tier -->
        <div
            class="bg-surface-container-lowest border border-outline-variant p-10 rounded-xl flex flex-col h-full hover:shadow-lg transition-shadow duration-300">
            <div class="mb-8">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-2">Free</h2>
                <p class="font-ui-label text-ui-label text-secondary mb-6">For casual readers and thinkers.</p>
                <div class="flex items-baseline gap-1">
                    <span class="font-display-lg text-display-lg text-on-surface">$0</span>
                    <span class="text-secondary font-ui-label">/month</span>
                </div>
            </div>
            <ul class="space-y-4 mb-10 flex-grow">
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">Read unlimited public posts</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">Create up to 3 drafts</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">Basic markdown support</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-secondary shrink-0" data-icon="block">block</span>
                    <span class="text-secondary font-ui-label line-through">Custom domains</span>
                </li>
            </ul>
            <button
                class="w-full border border-on-surface text-on-surface py-4 rounded-lg font-ui-button text-ui-button hover:bg-on-surface hover:text-white transition-all">
                Start Reading
            </button>
        </div>
        <!-- Pro Tier (Highlighted) -->
        <div
            class="bg-surface-container-lowest border-2 border-primary-container p-10 rounded-xl flex flex-col h-full relative shadow-xl transform scale-105 z-10">
            <div
                class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary-container text-white px-4 py-1 rounded-full text-metadata font-metadata uppercase tracking-wider">
                Best Value
            </div>
            <div class="mb-8">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-2">Pro</h2>
                <p class="font-ui-label text-ui-label text-secondary mb-6">For serious independent writers.</p>
                <div class="flex items-baseline gap-1">
                    <span class="font-display-lg text-display-lg text-on-surface">
                    @section('page-content')2
                    </span>
                    <span class="text-secondary font-ui-label">/month</span>
                </div>
            </div>
            <ul class="space-y-4 mb-10 flex-grow">
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0" data-icon="check_circle"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span class="text-on-surface font-ui-label font-semibold">Everything in Free</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0" data-icon="check_circle"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span class="text-on-surface font-ui-label">Unlimited drafts &amp; posts</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0" data-icon="check_circle"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span class="text-on-surface font-ui-label">Custom newsletter styling</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0" data-icon="check_circle"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span class="text-on-surface font-ui-label">Advanced analytics</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0" data-icon="check_circle"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    <span class="text-on-surface font-ui-label">SEO optimization tools</span>
                </li>
            </ul>
            <button
                class="w-full bg-primary-container text-white py-4 rounded-lg font-ui-button text-ui-button shadow-md hover:opacity-90 active:scale-[0.98] transition-all">
                Upgrade to Pro
            </button>
        </div>
        <!-- Enterprise Tier -->
        <div
            class="bg-surface-container-lowest border border-outline-variant p-10 rounded-xl flex flex-col h-full hover:shadow-lg transition-shadow duration-300">
            <div class="mb-8">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-2">Enterprise</h2>
                <p class="font-ui-label text-ui-label text-secondary mb-6">For professional publications.</p>
                <div class="flex items-baseline gap-1">
                    <span class="font-display-lg text-display-lg text-on-surface">Custom</span>
                </div>
            </div>
            <ul class="space-y-4 mb-10 flex-grow">
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label font-semibold">Everything in Pro</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">Up to 10 team seats</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">Custom domain setup</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">SSO &amp; SAML integration</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-primary-container shrink-0"
                        data-icon="check_circle">check_circle</span>
                    <span class="text-on-surface font-ui-label">Dedicated account manager</span>
                </li>
            </ul>
            <button
                class="w-full border border-on-surface text-on-surface py-4 rounded-lg font-ui-button text-ui-button hover:bg-on-surface hover:text-white transition-all">
                Contact Sales
            </button>
        </div>
    </div>
    <!-- FAQ Section -->
    <section class="max-w-article-max mx-auto border-t border-outline-variant pt-section-gap">
        <h2
            class="font-headline-md text-headline-md text-on-surface mb-12 text-center underline decoration-primary decoration-4 underline-offset-8">
            Frequently Asked Questions</h2>
        <div class="space-y-8">
            <div class="group">
                <button
                    class="w-full flex justify-between items-center text-left py-4 border-b border-outline-variant focus:outline-none">
                    <span class="font-ui-label text-ui-label text-on-surface font-bold text-lg">Can I switch plans
                        later?</span>
                    <span class="material-symbols-outlined text-secondary group-hover:text-primary transition-colors"
                        data-icon="expand_more">expand_more</span>
                </button>
                <p class="py-4 text-body-md text-secondary">Yes, you can upgrade or downgrade your plan at any time. If you
                    upgrade, the new rate will be pro-rated for the remainder of your billing cycle.</p>
            </div>
            <div class="group">
                <button
                    class="w-full flex justify-between items-center text-left py-4 border-b border-outline-variant focus:outline-none">
                    <span class="font-ui-label text-ui-label text-on-surface font-bold text-lg">What happens if I cancel my
                        subscription?</span>
                    <span class="material-symbols-outlined text-secondary group-hover:text-primary transition-colors"
                        data-icon="expand_more">expand_more</span>
                </button>
                <p class="py-4 text-body-md text-secondary">You will retain Pro features until the end of your current
                    billing period. After that, your account will revert to the Free tier, but your existing content will
                    remain public.</p>
            </div>
            <div class="group">
                <button
                    class="w-full flex justify-between items-center text-left py-4 border-b border-outline-variant focus:outline-none">
                    <span class="font-ui-label text-ui-label text-on-surface font-bold text-lg">Do you offer discounts for
                        non-profits?</span>
                    <span class="material-symbols-outlined text-secondary group-hover:text-primary transition-colors"
                        data-icon="expand_more">expand_more</span>
                </button>
                <p class="py-4 text-body-md text-secondary">We believe in the power of social impact writing. Contact our
                    support team with your 501(c)(3) documentation for a 50% discount on Enterprise plans.</p>
            </div>
        </div>
    </section>
    <!-- Final CTA -->
    <section class="mt-section-gap bg-surface-container-high rounded-2xl p-12 text-center border border-outline-variant">
        <h2 class="font-headline-md text-headline-md text-on-surface mb-6">Still have questions?</h2>
        <p class="text-body-md text-secondary mb-8 max-w-xl mx-auto">Our team of editorial specialists is ready to help you
            find the perfect setup for your publication.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <button
                class="bg-primary-container text-white px-8 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 transition-all">Book
                a Demo</button>
            <button
                class="bg-white border border-outline text-on-surface px-8 py-3 rounded-lg font-ui-button text-ui-button hover:bg-surface-container-low transition-all">Support
                Center</button>
        </div>
    </section>
@endsection
