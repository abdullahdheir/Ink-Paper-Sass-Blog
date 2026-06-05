@extends('layouts.dashboard')

@section('title', 'Edit Category - Ink & Paper')

@section('page-content')
<!-- Editor Section -->
<section class="space-y-10">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary font-ui-label text-ui-label mb-2">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
<a class="hover:underline" href="#">Back to Dashboard</a>
</div>
<h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface">Edit Category: Technology</h1>
<p class="text-on-surface-variant font-body-md max-w-xl">Organize your thoughts on hardware, software, and the future of digital logic. Ensure your slug and description are SEO-ready.</p>
</div>
<form class="space-y-8 bg-surface-container-lowest p-8 rounded-xl border border-outline-variant/30 shadow-sm">
<!-- Cover Image Replace -->
<div class="space-y-3">
<label class="font-ui-label text-ui-label text-on-surface-variant block uppercase tracking-wider">Cover Image</label>
<div class="relative group h-48 rounded-lg overflow-hidden border border-outline-variant">
<img class="w-full h-full object-cover grayscale-[0.5] transition-all group-hover:scale-105" data-alt="A sophisticated close-up photograph of high-tech circuitry and microchips, bathed in cold blue and sharp white light to evoke a minimalist laboratory feel. The image uses a shallow depth of field to focus on the intricate textures of the silicon, aligning with a professional editorial aesthetic. The overall mood is focused, clean, and technologically advanced, echoing a high-end digital publishing environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGcDCePkfpXetYJGwzqGTWv8mTtLU54E6-FTK8jwMRoxM6QdlssDMwLVc3mXq_jjBEfFuWH6lr2QTiAzzcdEbS7Z3DR0768JhIxIRkLBC4n5bwFMkVnYEUVH-RXnkv7piD9YZlYNGcq_W2zWDmHfgqzRd8bb_WhFLIajMq0327qPJrdpiQHQgxXr7Y2ePekLQu7b4A_jbzA488al6uL9CniJ3wJs2Z60mDB2OwDJ3xOdYKWhmI8iOZEbDOsBrNyI1vcznjVLW8ntc"/>
<div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<button class="bg-white text-on-surface px-4 py-2 rounded-lg font-ui-button flex items-center gap-2 shadow-lg" type="button">
<span class="material-symbols-outlined">image_search</span>
                                Replace Image
                            </button>
</div>
</div>
<p class="font-metadata text-metadata text-on-surface-variant">Recommended size: 1200x480px. Supported formats: JPG, PNG, WEBP.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant block" for="name">Category Name</label>
<input class="w-full bg-white border border-outline-variant px-4 py-3 rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-ui-label transition-all" id="name" type="text" value="Technology"/>
</div>
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant block" for="slug">URL Slug</label>
<div class="flex">
<span class="bg-surface-container px-4 py-3 border border-r-0 border-outline-variant rounded-l-lg font-metadata text-on-surface-variant">inkpaper.com/tag/</span>
<input class="w-full bg-white border border-outline-variant px-4 py-3 rounded-r-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-ui-label transition-all" id="slug" type="text" value="technology"/>
</div>
</div>
</div>
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant block" for="description">Description</label>
<textarea class="w-full bg-white border border-outline-variant px-4 py-3 rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-body-md transition-all" id="description" rows="4">Explorations into the rapidly evolving landscape of modern computing, artificial intelligence, and the ethical implications of the silicon age. This section serves as a library of technical case studies and philosophical inquiries into code.</textarea>
</div>
<div class="flex items-center justify-between pt-4 border-t border-outline-variant/30">
<button class="text-error font-ui-button flex items-center gap-2 hover:bg-error-container/20 px-4 py-2 rounded-lg transition-colors" type="button">
<span class="material-symbols-outlined">delete</span>
                        Archive Category
                    </button>
<div class="flex gap-4">
<button class="border border-on-surface text-on-surface px-6 py-2.5 rounded-lg font-ui-button hover:bg-surface-container transition-all" type="button">Cancel</button>
<button class="bg-primary-container text-on-primary px-8 py-2.5 rounded-lg font-ui-button hover:bg-primary shadow-md transition-all" type="submit">Save Changes</button>
</div>
</div>
</form>
</section>
<!-- Sidebar Stats -->
<aside class="space-y-8">
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant/30 shadow-sm space-y-6">
<h3 class="font-ui-label text-ui-label text-on-surface-variant uppercase tracking-wider">Category Performance</h3>
<div class="grid grid-cols-1 gap-4">
<div class="p-4 bg-surface rounded-lg border border-outline-variant/20">
<div class="flex items-center gap-3 text-on-surface-variant mb-2">
<span class="material-symbols-outlined">article</span>
<span class="font-metadata text-metadata">Total Articles</span>
</div>
<p class="font-display-lg text-headline-md text-on-surface">142</p>
<div class="text-[10px] text-primary flex items-center gap-1 mt-1 font-bold">
<span class="material-symbols-outlined text-[14px]">trending_up</span> +12 this month
                        </div>
</div>
<div class="p-4 bg-surface rounded-lg border border-outline-variant/20">
<div class="flex items-center gap-3 text-on-surface-variant mb-2">
<span class="material-symbols-outlined">visibility</span>
<span class="font-metadata text-metadata">Total Views</span>
</div>
<p class="font-display-lg text-headline-md text-on-surface">84.2k</p>
<div class="text-[10px] text-primary flex items-center gap-1 mt-1 font-bold">
<span class="material-symbols-outlined text-[14px]">trending_up</span> +8.4% growth
                        </div>
</div>
<div class="p-4 bg-surface rounded-lg border border-outline-variant/20">
<div class="flex items-center gap-3 text-on-surface-variant mb-2">
<span class="material-symbols-outlined">group</span>
<span class="font-metadata text-metadata">Subscribers</span>
</div>
<p class="font-display-lg text-headline-md text-on-surface">3,892</p>
</div>
</div>
</div>
<!-- Recent Activity -->
<div class="space-y-4">
<h3 class="font-ui-label text-ui-label text-on-surface-variant uppercase tracking-wider px-2">Top Contributors</h3>
<div class="flex flex-col gap-4">
<div class="flex items-center justify-between group cursor-pointer p-2 rounded-lg hover:bg-surface-container transition-all">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary-container/10 flex items-center justify-center text-primary font-bold overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A professional headshot of a young tech innovator in a minimalist studio environment. The lighting is crisp and high-contrast, characteristic of premium editorial portraiture. The background is a clean, neutral grey, ensuring the subject remains the focus, perfectly aligned with a modern minimalist design aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuADAaMN1pgIZNUQyMyonM3lNfiv5nU0jt0W6gMmJrzCq4o5avExlKYmPkgElw5NaVWHFD8-2tI_TnJNHIEdi-8Jgaqm_DI6MhqLAH8qXE6NFAIlsTostvxvRiWGrNH5ehgc6-5cSh3gnyTeBDtpBZQParvHqCzQXpftNSOaHVLys-ZAl-Uw-_xWg-x9KdXa6nxgvVm2B8vnPuIR2KmLggZsRkPqSVs33E9TV68P9KofasxYaYMrLTp95I4F5FSQ18lPqpQqgBt-aT0"/>
</div>
<div>
<p class="font-ui-label text-ui-label">Marcus Chen</p>
<p class="font-metadata text-metadata text-on-surface-variant">42 articles</p>
</div>
</div>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
</div>
<div class="flex items-center justify-between group cursor-pointer p-2 rounded-lg hover:bg-surface-container transition-all">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-secondary font-bold overflow-hidden">
<img class="w-full h-full object-cover" data-alt="A stylish and professional portrait of a tech analyst, presented in a clean, high-key editorial style. The lighting is soft and diffused, creating a serene, intellectual atmosphere. The overall composition is balanced and minimalist, reflecting a premium digital workspace aesthetic with monochromatic tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAW6UgRZdn9UdyrS6gcZUxq9C9HdPG7FpZFF4wfyWSjIpEY09wncul0SJ9A_b2Lxbr54ZH19hG4vC0ZMh-iX_4BLkuP0PYlf54mWFtKSNhbgMD4w44mBOA0iEBOXm2-yqEQkUZ27tQMEjvEe0BqAeayL9FNo53oaAgq2KKJ_8UNix7zTKcwy8yAblWZ60lT07eO4XpsEBi3UH-me-cnkEWuzdHS7DbE_XMoyHPXMy1rPCdBLGFDbV6I9Qys23n_LzOXEBXwOaUb220"/>
</div>
<div>
<p class="font-ui-label text-ui-label">Sarah Drasner</p>
<p class="font-metadata text-metadata text-on-surface-variant">28 articles</p>
</div>
</div>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
</div>
</div>
</div>
<!-- SEO Preview -->
<div class="bg-surface-container-high/30 p-6 rounded-xl border border-dashed border-outline-variant space-y-3">
<h3 class="font-ui-label text-ui-label text-on-surface-variant flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">search</span>
                    Search Preview
                </h3>
<div class="space-y-1">
<p class="text-[#1a0dab] font-sans text-lg hover:underline cursor-pointer">Technology | Ink &amp; Paper Editorial</p>
<p class="text-[#006621] font-sans text-sm">inkpaper.com › tag › technology</p>
<p class="text-on-surface-variant font-sans text-sm line-clamp-2">Explorations into the rapidly evolving landscape of modern computing, artificial intelligence, and the ethical implications...</p>
</div>
</div>
</aside>
@endsection
