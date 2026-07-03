@extends('layouts.dashboard')

@section('title', 'Manage Member Sarah - Ink & Paper')

@section('page-content')
<!-- Member Profile Header -->
<header class="mb-12 border-b border-outline-variant/30 pb-8">
<div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
<div class="flex items-center gap-8">
<div class="relative">
<img class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-xl border border-outline-variant/20 shadow-sm" data-alt="A professional portrait of a male creative professional in his late 30s. He is wearing a dark, minimalist sweater and thin-framed glasses. The background is a soft-focus studio setting with warm, directional lighting. The overall aesthetic is clean, high-contrast, and sophisticated, mirroring a premium editorial magazine style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAFscWXEuf9G6j5ZhWVHr1FEESBUJZV4NBFdOl32dlaj4A2mdp2YhOMRiIs_Cjd6Fmdo8EU2SLfK-_zmB53OZg4iXutH8BZtLZxhYAt3MtyF2BsSwSXebCB992D4KbwRCqcmaFbmi5951X_6dNN3MU36gfAKSrBDO2aGwM1qf8kH6gIkh1w1tWIqgM2wFcKajMq5FnD8TL0va_3B7LcWKZeFvUV29gIyJ_KlroXKdu_DYi9l88bQhBvO0uNwtfN-JZqUsEXHWwt3Y"/>
<div class="absolute -bottom-2 -right-2 bg-primary-container text-white p-1.5 rounded-lg border-2 border-surface">
<span class="material-symbols-outlined text-[18px]">verified</span>
</div>
</div>
<div>
<nav class="mb-4 flex items-center gap-2 text-metadata font-metadata text-on-surface-variant">
<a class="hover:text-primary" href="#">Admin Dashboard</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface">Member Details</span>
</nav>
<h1 class="font-display-lg text-display-lg text-on-surface mb-2">Julian Thorne</h1>
<p class="font-ui-label text-ui-label text-on-surface-variant flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">mail</span>
                            julian.thorne@inkpaper.io
                        </p>
</div>
</div>
<div class="flex flex-wrap gap-3">
<button class="px-6 py-3 border border-outline text-on-surface font-ui-button text-ui-button rounded-lg hover:bg-surface-container transition-all">
                        Change Role
                    </button>
<button class="px-6 py-3 border border-error text-error font-ui-button text-ui-button rounded-lg hover:bg-error-container/20 transition-all">
                        Remove Member
                    </button>
</div>
</div>
</header>
<!-- Bento Grid Layout for Details & Activity -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-8">
<!-- Sidebar: Member Information -->
<aside class="md:col-span-4 flex flex-col gap-8">
<div class="bg-surface-container-lowest p-8 border border-outline-variant/30 rounded-xl paper-shadow">
<h3 class="font-ui-label text-ui-label text-primary uppercase tracking-widest mb-6">Account Status</h3>
<div class="space-y-6">
<div>
<p class="font-metadata text-metadata text-outline mb-1">Current Role</p>
<p class="font-ui-label text-ui-label text-on-surface flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary-container"></span>
                                Senior Editor
                            </p>
</div>
<div>
<p class="font-metadata text-metadata text-outline mb-1">Date Joined</p>
<p class="font-ui-label text-ui-label text-on-surface">September 14, 2022</p>
</div>
<div>
<p class="font-metadata text-metadata text-outline mb-1">Contributions</p>
<p class="font-ui-label text-ui-label text-on-surface">142 Articles</p>
</div>
<div>
<p class="font-metadata text-metadata text-outline mb-1">Last Active</p>
<p class="font-ui-label text-ui-label text-on-surface">2 hours ago</p>
</div>
</div>
</div>
<div class="bg-primary-container/5 p-8 border border-primary-container/20 rounded-xl">
<h3 class="font-ui-label text-ui-label text-primary uppercase tracking-widest mb-4">Admin Notes</h3>
<p class="font-body-md text-[16px] text-on-surface-variant leading-relaxed">
                        Julian handles the "Case Studies" vertical. High reliability and consistent delivery of high-contrast editorial pieces.
                    </p>
<button class="mt-6 text-primary font-ui-label text-ui-label hover:underline">Edit Notes</button>
</div>
</aside>
<!-- Main Content: Recent Activity -->
<section class="md:col-span-8">
<div class="flex justify-between items-center mb-8">
<h2 class="font-headline-md text-headline-md text-on-surface">Recent Activity</h2>
<div class="flex gap-2">
<button class="p-2 hover:bg-surface-container rounded-lg transition-all"><span class="material-symbols-outlined">filter_list</span></button>
<button class="p-2 hover:bg-surface-container rounded-lg transition-all"><span class="material-symbols-outlined">download</span></button>
</div>
</div>
<div class="space-y-0">
<!-- Activity Item 1 -->
<div class="relative pl-8 pb-10 activity-line">
<div class="absolute left-0 top-1 w-4 h-4 rounded-full border-2 border-primary-container bg-surface z-10"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h4 class="font-ui-label text-body-lg text-on-surface mb-1">Published "The Quiet Architect"</h4>
<p class="font-body-md text-[16px] text-on-surface-variant">Deep dive into minimalist UI design principles and spatial rhythm.</p>
</div>
<span class="text-metadata font-metadata text-outline whitespace-nowrap">Today, 10:45 AM</span>
</div>
</div>
<!-- Activity Item 2 -->
<div class="relative pl-8 pb-10 activity-line">
<div class="absolute left-0 top-1 w-4 h-4 rounded-full border-2 border-outline bg-surface z-10"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h4 class="font-ui-label text-body-lg text-on-surface mb-1">Commented on "Digital Quiet"</h4>
<p class="font-body-md text-[16px] text-on-surface-variant">"The typography here perfectly balances the white space..."</p>
</div>
<span class="text-metadata font-metadata text-outline whitespace-nowrap">Yesterday</span>
</div>
</div>
<!-- Activity Item 3 -->
<div class="relative pl-8 pb-10 activity-line">
<div class="absolute left-0 top-1 w-4 h-4 rounded-full border-2 border-outline bg-surface z-10"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h4 class="font-ui-label text-body-lg text-on-surface mb-1">Role Updated to Senior Editor</h4>
<p class="font-body-md text-[16px] text-on-surface-variant">System change by Administrator Sarah Jenkins.</p>
</div>
<span class="text-metadata font-metadata text-outline whitespace-nowrap">Oct 12, 2024</span>
</div>
</div>
<!-- Activity Item 4 -->
<div class="relative pl-8 pb-10 activity-line">
<div class="absolute left-0 top-1 w-4 h-4 rounded-full border-2 border-outline bg-surface z-10"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h4 class="font-ui-label text-body-lg text-on-surface mb-1">Archived 3 outdated articles</h4>
<p class="font-body-md text-[16px] text-on-surface-variant">Maintenance of the "2021 Archives" collection.</p>
</div>
<span class="text-metadata font-metadata text-outline whitespace-nowrap">Oct 05, 2024</span>
</div>
</div>
</div>
<button class="w-full py-4 mt-4 border-2 border-dashed border-outline-variant/50 rounded-xl font-ui-label text-ui-label text-on-surface-variant hover:border-primary-container hover:text-primary transition-all">
                    Load Older Activity
                </button>
</section>
</div>
<!-- Visual Anchor: Content Highlight -->
<section class="mt-section-gap">
<h3 class="font-ui-label text-ui-label text-primary uppercase tracking-widest mb-8">Top Contribution</h3>
<div class="group relative overflow-hidden rounded-2xl bg-on-surface aspect-[21/9]">
<img class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" data-alt="A high-contrast wide shot of a modern architectural workspace. A single black ink pen sits on a stack of premium textured paper. Natural light streams in from a large window, creating long, dramatic shadows. The scene is minimalist, featuring a monochrome palette with sharp lines and a quiet, focused atmosphere." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDSu3T1NEN8JEZOs8_E0gxyO330VBb5QENkHi4R7bMzzJSWEQbOY6i0ScemMbu-uCA_XC4kxRYaoOPa5KE1pOMKm3weqmcONVvIq67HaANNpiEWOl3iU9HKPAKu7_wB4i2W7bYvcwjlkd4fjo2wcaJlgJaiY3ox1iIm6KJ_7IcOivc7qE9HpVzni-fupbU6vZaOIVOHSK7dC1qnsdTHQBLmZz0-KVguQVBzbFsirHoCkLpgOG1LxdSyHuOq-085bpFhjfuE92kXbgA"/>
<div class="absolute inset-0 p-12 flex flex-col justify-end bg-gradient-to-t from-black/80 to-transparent">
<span class="text-primary-fixed font-metadata text-metadata mb-4 px-3 py-1 bg-primary-container/20 w-fit rounded-full border border-primary-fixed/30">Most Viewed Article</span>
<h2 class="text-white font-display-lg text-display-lg max-w-2xl">The Intersection of Digital Minimalism and Mental Clarity</h2>
<p class="text-surface-variant/80 font-body-md mt-4 max-w-xl">How Julian Thorne redefined editorial standards for the platform.</p>
</div>
</div>
</section>
@endsection
