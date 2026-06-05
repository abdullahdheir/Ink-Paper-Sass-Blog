@extends('layouts.dashboard')

@section('title', 'Edit Article - Ink & Paper')

@section('page-content')
<article class="max-w-[720px] mx-auto">
<!-- Featured Image Preview -->
<div class="relative w-full aspect-[21/9] mb-12 rounded-xl overflow-hidden group border border-outline-variant/30">
<img class="w-full h-full object-cover" data-alt="A clean, minimalist workspace scene featuring a vintage typewriter on a white oak desk. Soft morning light streams through a window, creating long shadows and a calm atmosphere. The image uses a monochromatic palette of whites and warm greys, capturing the quiet essence of a focused writer's environment with high-key lighting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZ4Uw2JbBlhKRw69foyEyfdKOAr6tRNNnjSZPCb9_5Z3KVxPUY6uzc7h1jEIYK7D3R_-XGEuBkDXpU8zSLS0gMVZbx3FSynTd4bnChrJYvZr5KIz8W8efC5XFHF9L4HkrludtpsoB8qSytILa23R0qhS2RNstJ0NRgsGonCAgZ9B_GbifgJLl_l-dVMyko-WSTw4_DuldKmjE3rVFxf-hZowUlwqyShThi6fL__cRGxDzL9VDPSp5VUZNdn7ajz7CrIo5cVwXkvl4"/>
<div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-4">
<button class="bg-white/90 text-on-surface px-4 py-2 rounded-lg font-ui-button text-ui-label flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">edit</span> Replace Image
                    </button>
<button class="bg-white/90 text-error px-4 py-2 rounded-lg font-ui-button text-ui-label flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">delete</span> Remove
                    </button>
</div>
</div>
<!-- Title Area -->
<textarea class="editor-canvas w-full font-display-lg text-display-lg bg-transparent border-none p-0 resize-none mb-6 placeholder:text-outline-variant" placeholder="Title of your story..." rows="1">The Architecture of Digital Quiet</textarea>
<!-- Metadata Info -->
<div class="flex items-center gap-4 mb-10 pb-6 border-b border-outline-variant/20">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]">person</span>
</div>
<span class="text-ui-label font-ui-label text-on-surface">Elena Vance</span>
</div>
<div class="h-4 w-[1px] bg-outline-variant/50"></div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">category</span>
<span class="text-ui-label font-ui-label">Philosophy</span>
</div>
<div class="h-4 w-[1px] bg-outline-variant/50"></div>
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[18px]">schedule</span>
<span class="text-ui-label font-ui-label">8 min read</span>
</div>
</div>
<!-- Editor Body -->
<div class="space-y-8 text-body-lg font-body-lg text-on-surface leading-relaxed">
<p>In an era defined by the incessant hum of notifications and the frantic pace of the attention economy, we often find ourselves searching for a sanctuary—a space where thoughts can breathe and ideas can coalesce without interruption. This is the essence of what I call "Digital Quiet."</p>
<h2 class="font-headline-md text-headline-md mt-12 mb-4">The Burden of Noise</h2>
<p>Digital noise is more than just an annoyance; it is a cognitive tax. Every ping, every red dot on an icon, and every auto-playing video represents a micro-interruption that fragments our focus. Over time, these fragments accumulate, leading to a state of perpetual mental fatigue. The architecture of the modern web is, unfortunately, designed to exploit this fatigue rather than alleviate it.</p>
<blockquote class="border-l-4 border-primary pl-6 py-2 my-10 italic text-headline-md font-body-md text-on-surface-variant bg-surface-container-low/30 rounded-r-lg">
                    "Quietness is not the absence of sound, but the presence of meaning."
                </blockquote>
<p>To design for Digital Quiet is to prioritize the user's intent above all else. It means using whitespace not as empty real estate to be filled with ads, but as a structural tool that guides the eye and provides mental relief. It is the visual equivalent of a deep breath.</p>
<div class="relative group my-12 p-8 border border-dashed border-outline-variant rounded-xl flex flex-col items-center justify-center gap-4 bg-surface-container-lowest/50 hover:bg-surface-container-low transition-colors cursor-pointer">
<span class="material-symbols-outlined text-4xl text-outline-variant">add_circle</span>
<span class="font-ui-label text-ui-label text-outline">Click to add media or a new section</span>
</div>
<p>The transition toward more intentional digital environments is already underway. We see it in the rise of minimalist writing platforms, "focus mode" operating systems, and the slow but steady rejection of algorithmically-driven feeds. The goal is simple: to return the agency of attention back to the individual.</p>
</div>
</article>
@endsection
