@extends('layouts.dashboard')

@section('title', 'Drafts - Ink & Paper')

@section('page-content')
<!-- Header Section -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
<div>
<h1 class="font-display-lg text-display-lg text-on-surface mb-2">Creator Dashboard</h1>
<p class="text-secondary font-body-md">Manage your thoughts, analyze your impact, and craft your next story.</p>
</div>
<button class="flex items-center justify-center gap-2 bg-primary-container text-on-primary px-8 py-4 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all w-full md:w-auto shadow-sm">
<span class="material-symbols-outlined">edit</span>
                    Write a post
                </button>
</div>
<!-- Bento Grid Stats -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-12">
<!-- Performance Chart -->
<div class="md:col-span-8 bg-surface-container-lowest border border-outline-variant rounded-xl p-6 flex flex-col justify-between min-h-[320px]">
<div class="flex justify-between items-center mb-6">
<h3 class="font-headline-md text-headline-md text-on-surface">Weekly Engagement</h3>
<div class="flex gap-2">
<span class="px-3 py-1 bg-surface-container text-secondary rounded-full font-metadata text-metadata">Last 7 Days</span>
</div>
</div>
<!-- Mock Chart Visualization -->
<div class="flex-1 flex items-end gap-2 md:gap-4 px-2">
<div class="flex-1 bg-outline-variant h-[40%] rounded-t opacity-40 hover:bg-primary transition-all duration-300"></div>
<div class="flex-1 bg-outline-variant h-[65%] rounded-t opacity-40 hover:bg-primary transition-all duration-300"></div>
<div class="flex-1 bg-primary h-[85%] rounded-t shadow-sm"></div>
<div class="flex-1 bg-outline-variant h-[55%] rounded-t opacity-40 hover:bg-primary transition-all duration-300"></div>
<div class="flex-1 bg-outline-variant h-[75%] rounded-t opacity-40 hover:bg-primary transition-all duration-300"></div>
<div class="flex-1 bg-outline-variant h-[45%] rounded-t opacity-40 hover:bg-primary transition-all duration-300"></div>
<div class="flex-1 bg-outline-variant h-[95%] rounded-t opacity-40 hover:bg-primary transition-all duration-300"></div>
</div>
<div class="flex justify-between mt-4 text-metadata text-secondary border-t border-outline-variant pt-4">
<span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
</div>
</div>
<!-- Snapshot Stats -->
<div class="md:col-span-4 flex flex-col gap-6">
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 flex-1">
<span class="text-secondary font-ui-label text-ui-label block mb-2 uppercase tracking-wider">Total Views</span>
<div class="flex items-baseline gap-2">
<span class="font-display-lg text-display-lg text-on-surface">12.4k</span>
<span class="text-primary font-bold text-metadata">+12%</span>
</div>
</div>
<div class="bg-primary-container text-on-primary rounded-xl p-6 flex-1 shadow-lg shadow-primary-container/20">
<span class="text-on-primary/70 font-ui-label text-ui-label block mb-2 uppercase tracking-wider">New Subscribers</span>
<div class="flex items-baseline gap-2">
<span class="font-display-lg text-display-lg">842</span>
<span class="text-on-primary/90 font-bold text-metadata">Steady Growth</span>
</div>
</div>
</div>
</div>
<!-- Table Section -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden mb-section-gap">
<div class="px-6 py-5 border-b border-outline-variant flex justify-between items-center">
<h2 class="font-headline-md text-headline-md text-on-surface">Recent Posts</h2>
<button class="text-primary font-ui-label text-ui-label hover:underline">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container text-on-surface-variant font-ui-label text-ui-label">
<th class="px-6 py-4 font-semibold uppercase tracking-wider">Title</th>
<th class="px-6 py-4 font-semibold uppercase tracking-wider">Status</th>
<th class="px-6 py-4 font-semibold uppercase tracking-wider">Views</th>
<th class="px-6 py-4 font-semibold uppercase tracking-wider">Likes</th>
<th class="px-6 py-4 font-semibold uppercase tracking-wider">Date</th>
<th class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<tr class="hover:bg-surface transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container overflow-hidden flex-shrink-0">
<img alt="Article Preview" data-alt="A minimalist abstract image of a digital circuit board with soft glowing purple lights. The composition is clean and technical, emphasizing the intersection of technology and creativity. The color palette uses deep charcoal blacks and vibrant electric violet highlights. The style is editorial and professional, suitable for a tech-focused article preview." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0O2oCkRUA2K6izDQwisH3c2lIIlUCYKg3L1uNVzOl4wu8PZ_h3PA7QTK2c1cu8XFWa5bLP9pBKI2FDnFAv2fptzz3l7eQeFqy3YY0NgwDNZhK_SJxRhEUNe_9LonkswvGE5Sk7kauCQsbA2wA0FlzT_uq53SuWonjLQXN1a_lqjmNkYKRGlW79cTEnfhtidsoEfbk2IpSahONaj_w6isjlA7_JljmMZMGyPdAyiyo7abSEeoqWd36dLVEhMitxnfC06G3W2In68bk"/>
</div>
<span class="font-ui-label text-ui-label font-bold text-on-surface">The Future of AI in Modern Software Architecture</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-on-tertiary-container/10 text-tertiary-container">Published</span>
</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">3,402</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">124</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">Oct 24, 2023</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-secondary hover:text-primary">more_vert</button>
</td>
</tr>
<tr class="hover:bg-surface transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container overflow-hidden flex-shrink-0">
<img alt="Article Preview" data-alt="A clean, minimalist workspace featuring an open notebook and a classic ink pen. The lighting is bright and airy, suggesting a morning creative session. The aesthetic is monochromatic and high-contrast, perfectly aligning with the Ink &amp; Paper brand. The depth of field is shallow, focusing on the tip of the pen resting on the paper." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYOQRWucdmWRFE-1yKybjuMGVipK1oEqj4dR4JE1ih4CwhU3e1AfiopgsshsohZc1kcFgF8W5hl99_W-cedwOGmhd4VIXBbUqrjAJ8k2M9496tWl5GHFytyUor4iuymOhWomZQw0hXpUko7W-_9EbN9PV4LfyaoXrKko0ANGc-ouff0AYqCxldrCFPHq9ee4CEMdmcYvlAoZeI3ElWueQyxYJkG1ZNZm9G9R_Ir8fHmSfIH72R3DwqLc_k5ToIfhWwv0wYfY8ko7B1"/>
</div>
<span class="font-ui-label text-ui-label font-bold text-on-surface">Minimalist Design Systems for Intellectual Content</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-on-tertiary-container/10 text-tertiary-container">Published</span>
</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">1,829</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">89</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">Oct 21, 2023</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-secondary hover:text-primary">more_vert</button>
</td>
</tr>
<tr class="hover:bg-surface transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container overflow-hidden flex-shrink-0">
<img alt="Article Preview" data-alt="A macro shot of lines of code displayed on a high-resolution monitor. The text is sharp and glows subtly against a dark background, with the highlight being an electric violet keyword. The overall feel is one of precision, expertise, and digital focus. The lighting is moody and controlled, suitable for developer-focused content." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5Ws3t0G5PGm7FGCVB1Mv1znA9DyExRIdcxx47n6daQqJ71IkXpCERv3061pMFFaCsPyWOFd18hVim1BhpEeP2sa0NzJAUYsQTE333S3svZD-1HgYva2BgTw5KGQO1jKlDIhzl5yeHk2V9i6KcW4TQu-gdKthZ_bWA8O0INlZIV4LobdY9khhu8Ew6iajbjOvjL2mfh3Ppl4uOB3_AzS3Mv7MBtlmnoChDXpwhdC60mlaO3pGeZdlQzWQ9fiebMNJQrZ6iMHNmBG_s"/>
</div>
<span class="font-ui-label text-ui-label font-bold text-on-surface">Why We Chose Tailwind CSS for Our New Platform</span>
</div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-surface-variant text-on-surface-variant">Draft</span>
</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">—</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">—</td>
<td class="px-6 py-4 text-secondary font-metadata text-metadata">Oct 19, 2023</td>
<td class="px-6 py-4 text-right">
<button class="material-symbols-outlined text-secondary hover:text-primary">more_vert</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
@endsection
