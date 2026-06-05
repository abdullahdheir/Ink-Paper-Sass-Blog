@extends('layouts.dashboard')

@section('title', 'Collaboration - Ink & Paper')

@section('page-content')
<!-- Header Section -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div class="space-y-2">
<h1 class="font-display-lg text-display-lg-mobile md:text-display-lg tracking-tight">Team &amp; Collaboration</h1>
<p class="font-ui-label text-ui-label text-secondary">Manage your creative ecosystem and collaborative workflows.</p>
</div>
<button class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 transition-all">
<span class="material-symbols-outlined text-base">person_add</span>
        Invite Member
      </button>
</div>
<!-- Stats Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-section-gap">
<div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-8 flex flex-col gap-2">
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-widest text-xs">Total Members</span>
<span class="font-display-lg text-headline-md">12</span>
<div class="w-full h-1 bg-surface-container mt-4 rounded-full overflow-hidden">
<div class="w-full h-full bg-primary"></div>
</div>
</div>
<div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-8 flex flex-col gap-2">
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-widest text-xs">Active Collaborators</span>
<span class="font-display-lg text-headline-md">8</span>
<div class="w-full h-1 bg-surface-container mt-4 rounded-full overflow-hidden">
<div class="w-2/3 h-full bg-primary"></div>
</div>
</div>
<div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-8 flex flex-col gap-2">
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-widest text-xs">Pending Invites</span>
<span class="font-display-lg text-headline-md">4</span>
<div class="w-full h-1 bg-surface-container mt-4 rounded-full overflow-hidden">
<div class="w-1/3 h-full bg-primary"></div>
</div>
</div>
</div>
<!-- Dashboard Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
<!-- Active Members List (Main Column) -->
<section class="lg:col-span-8 space-y-8">
<div class="flex items-center justify-between border-b border-outline-variant pb-4">
<h2 class="font-headline-md text-headline-md tracking-tight">Active Members</h2>
<span class="font-ui-label text-ui-label text-secondary">8 currently online</span>
</div>
<div class="space-y-0 divide-y divide-outline-variant">
<!-- Member Row 1 -->
<div class="py-6 flex flex-col md:flex-row md:items-center justify-between gap-6 group">
<div class="flex items-center gap-4">
<img alt="Sarah Chen" class="w-12 h-12 rounded-full object-cover grayscale group-hover:grayscale-0 transition-all duration-300" data-alt="A clean, editorial portrait of a woman with a focused expression. The image is high-contrast black and white, shot in a minimalist studio environment. The lighting is soft but defined, accentuating professional features. The background is a stark white to match the Paper and Ink aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGV8m31Qx14NO4shOah6D-BFiFYr-5cdKW8AGlM2B--J-umIbMdo1BEUZ-UGVbKLe3pBb3Zx_TXBwNFBEWOr3N_ZRmMN-rn2AHLbumdfRTetcITXc_g6uFmEFgw0V6yRIkCTOFOl87pHdRkknfHSM5S--Q64vzSCwXeGeL6o3ob3ifQ4X1ILaT1AOZtgrAbW0Ck4l0loVEGibCATPO2AjbvaU4WVWgn1ivnhxEj-Iz8TY6oDY7chyVlTecZf8aS0CsvR7ATFX9rsKS"/>
<div class="flex flex-col">
<span class="font-body-lg text-on-surface font-semibold">Sarah Chen</span>
<span class="font-ui-label text-ui-label text-secondary">Editor-in-Chief</span>
</div>
</div>
<div class="flex flex-wrap items-center gap-8 md:gap-12">
<div class="flex flex-col">
<span class="font-metadata text-metadata text-secondary uppercase tracking-tighter">Active Projects</span>
<span class="font-ui-label text-ui-label">14 Articles</span>
</div>
<div class="flex flex-col">
<span class="font-metadata text-metadata text-secondary uppercase tracking-tighter">Last Active</span>
<span class="font-ui-label text-ui-label">2 mins ago</span>
</div>
<button class="font-ui-label text-ui-label text-primary hover:underline transition-all">Manage</button>
</div>
</div>
<!-- Member Row 2 -->
<div class="py-6 flex flex-col md:flex-row md:items-center justify-between gap-6 group">
<div class="flex items-center gap-4">
<img alt="Marcus Thorne" class="w-12 h-12 rounded-full object-cover grayscale group-hover:grayscale-0 transition-all duration-300" data-alt="A sharp, black and white portrait of a male designer looking directly at the camera. The setting is a bright, modern office with linear architectural elements in the background. High-key lighting emphasizes clarity and a professional, modern aesthetic. Monochromatic palette with a focus on textures and fine detail." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTCyR8nhwQZNq9AytefrbQqppqbxpyD3dcMLvOQdiPI9XISTie8soN2y-FC4gDPUTKolal6mWUB7nHuo_FWFrvs275eAtdJG7dYORGNjOJTml_9oqxXrEAZkR9IIgwrYU74bwXmYrtqJe_kRBhZggqNQZnGY4oMPdX0nNOrLvy2xv5qM8XTlHtT5V-7-1iyGcNQE6CNWpDRfFHUsPGOcpka9t53zR-ef8N02nK3tMreGZ31FvhHttHKLpi6inUfy2aky-hvnpGmb7k"/>
<div class="flex flex-col">
<span class="font-body-lg text-on-surface font-semibold">Marcus Thorne</span>
<span class="font-ui-label text-ui-label text-secondary">Technical Contributor</span>
</div>
</div>
<div class="flex flex-wrap items-center gap-8 md:gap-12">
<div class="flex flex-col">
<span class="font-metadata text-metadata text-secondary uppercase tracking-tighter">Active Projects</span>
<span class="font-ui-label text-ui-label">5 Reviews</span>
</div>
<div class="flex flex-col">
<span class="font-metadata text-metadata text-secondary uppercase tracking-tighter">Last Active</span>
<span class="font-ui-label text-ui-label">1 hour ago</span>
</div>
<button class="font-ui-label text-ui-label text-primary hover:underline transition-all">Manage</button>
</div>
</div>
<!-- Member Row 3 -->
<div class="py-6 flex flex-col md:flex-row md:items-center justify-between gap-6 group">
<div class="flex items-center gap-4">
<img alt="Elena Rodriguez" class="w-12 h-12 rounded-full object-cover grayscale group-hover:grayscale-0 transition-all duration-300" data-alt="An editorial style headshot of a woman in a minimalist white blouse against a neutral grey background. The lighting is diffused and professional, creating an atmosphere of calm authority. The image is monochromatic to fit the Paper and Ink branding, prioritizing clarity and high-contrast digital quietude." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4733pTl5ay3LlAI6gAr9ITjIYTLympVyQ3yBPYFsZVsfztlDiw8auxsMmf9ZIqpRBH7FVotGNeUUsc5zn_mkv74Fvdwm-XyzXX6-fAL7vKwjg6JCa_TYuW08f5iDzJz7UKpsZTHQC6UCqtHdhd2w3xeQzY6mg_hQfTggJJ9TsReYwnNvQaquw3gceFx6fU1ssri-rGksqu9Z68cn_3MUHunYJBlwgjLvCnFg7j-_GrfayDln_4ExZRaYlQFYrnzjgMXI27S3DlbLL"/>
<div class="flex flex-col">
<span class="font-body-lg text-on-surface font-semibold">Elena Rodriguez</span>
<span class="font-ui-label text-ui-label text-secondary">Owner</span>
</div>
</div>
<div class="flex flex-wrap items-center gap-8 md:gap-12">
<div class="flex flex-col">
<span class="font-metadata text-metadata text-secondary uppercase tracking-tighter">Active Projects</span>
<span class="font-ui-label text-ui-label">All (24)</span>
</div>
<div class="flex flex-col">
<span class="font-metadata text-metadata text-secondary uppercase tracking-tighter">Last Active</span>
<span class="font-ui-label text-ui-label">Just now</span>
</div>
<button class="font-ui-label text-ui-label text-primary hover:underline transition-all">Manage</button>
</div>
</div>
</div>
</section>
<!-- Recent Team Activity (Sidebar) -->
<aside class="lg:col-span-4 border-l border-outline-variant pl-0 lg:pl-12 pt-12 lg:pt-0">
<h3 class="font-headline-md text-headline-md tracking-tight mb-8">Recent Activity</h3>
<div class="space-y-10">
<!-- Activity Item 1 -->
<div class="relative pl-6 border-l-2 border-primary">
<span class="absolute -left-1.5 top-0 w-3 h-3 rounded-full bg-primary"></span>
<div class="flex flex-col gap-1">
<p class="font-body-md text-body-md leading-relaxed">
<span class="font-bold">Sarah Chen</span> commented on <span class="text-primary italic">"The Future of Minimalist UI"</span>
</p>
<span class="font-metadata text-metadata text-secondary">15 minutes ago</span>
<div class="mt-2 p-3 bg-surface-container-low rounded-lg border border-outline-variant text-sm text-on-surface-variant italic">
                "We should emphasize the tonal layering more in section 3..."
              </div>
</div>
</div>
<!-- Activity Item 2 -->
<div class="relative pl-6 border-l-2 border-outline-variant">
<span class="absolute -left-1.5 top-0 w-3 h-3 rounded-full bg-outline-variant"></span>
<div class="flex flex-col gap-1">
<p class="font-body-md text-body-md leading-relaxed">
<span class="font-bold">Marcus Thorne</span> approved the technical draft for <span class="text-primary italic">"Ink &amp; Paper API v2"</span>
</p>
<span class="font-metadata text-metadata text-secondary">4 hours ago</span>
</div>
</div>
<!-- Activity Item 3 -->
<div class="relative pl-6 border-l-2 border-outline-variant">
<span class="absolute -left-1.5 top-0 w-3 h-3 rounded-full bg-outline-variant"></span>
<div class="flex flex-col gap-1">
<p class="font-body-md text-body-md leading-relaxed">
<span class="font-bold">Elena Rodriguez</span> invited <span class="font-semibold">Julian Gray</span> to the Creative Team
              </p>
<span class="font-metadata text-metadata text-secondary">Yesterday</span>
</div>
</div>
<button class="w-full py-3 border border-on-surface text-on-surface font-ui-button text-ui-button rounded hover:bg-surface-container transition-all">
            View All Activity
          </button>
</div>
<!-- Team Projects Preview -->
<div class="mt-16 pt-8 border-t border-outline-variant">
<h4 class="font-ui-label text-ui-label text-secondary uppercase tracking-widest mb-6">Shared Projects</h4>
<div class="space-y-4">
<div class="group flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-lowest transition-all cursor-pointer">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">folder</span>
<span class="font-ui-label text-ui-label">Brand Guidelines 2024</span>
</div>
<span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-all text-sm">arrow_forward</span>
</div>
<div class="group flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-lowest transition-all cursor-pointer">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">folder</span>
<span class="font-ui-label text-ui-label">Platform Redesign</span>
</div>
<span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-all text-sm">arrow_forward</span>
</div>
</div>
</div>
</aside>
</div>
@endsection
