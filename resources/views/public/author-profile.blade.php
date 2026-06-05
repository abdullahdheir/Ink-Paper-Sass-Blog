@extends('layouts.public')

@section('title', 'Author Profile - Ink & Paper')

@section('page-content')
<div class="max-w-container-max mx-auto px-gutter">
<!-- Author Profile Hero Section -->
<section class="flex flex-col md:flex-row gap-12 items-start mb-16">
<div class="relative group">
<div class="w-40 h-40 md:w-56 md:h-56 rounded-xl overflow-hidden border border-outline-variant bg-white">
<img class="w-full h-full object-cover" data-alt="A professional studio portrait of a confident female author with a warm smile, set against a clean minimalist light gray background. She is wearing a modern structured charcoal blazer, embodying a sharp and intellectual aesthetic. The lighting is soft and diffused, highlighting natural skin textures and reflecting the sophisticated and focused brand identity of the platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGs3NDp0Y5uSmScM26T1mGs5cbgS0E94-jCOzE4sZ8997bbnnd_FupTGOQktRVVJGyx5tXl3nq49RbnQcUh4BVFPZY0uXQKE1Xc3sM_rLxIBI5uOqQoQOI64zjmzdFui2c2ucSDOVehZelP2JL-Xn2uQbY2GpizTsp1NVZIz-z0rXtgBCF4YdL66FXpR1H5IZZXIKEhdMjXNBbN-E7sdgiSxTLxCAo4p4lbjFBJ0nnn6b9BulvaFJzLPKYkKaz4JXfEtF0DS33cD2d"/>
</div>
<div class="absolute -bottom-2 -right-2 bg-primary-container text-white p-2 rounded-lg shadow-lg">
<span class="material-symbols-outlined" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
</div>
<div class="flex-1 space-y-6">
<div>
<h1 class="font-display-lg text-display-lg text-on-surface mb-2">Elena Rostova</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-article-max">Critical thinker, system architect, and full-stack storyteller. Exploring the intersection of human psychology and decentralized technologies.</p>
</div>
<div class="flex flex-wrap gap-4">
<a class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label" href="#">
<span class="material-symbols-outlined text-[18px]" data-icon="link">link</span>
<span>elenarostova.io</span>
</a>
<a class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label" href="#">
<span class="material-symbols-outlined text-[18px]" data-icon="alternate_email">alternate_email</span>
<span>@elena_writes</span>
</a>
<a class="flex items-center gap-2 text-secondary hover:text-primary transition-colors font-ui-label text-ui-label" href="#">
<span class="material-symbols-outlined text-[18px]" data-icon="location_on">location_on</span>
<span>Berlin, Germany</span>
</a>
</div>
<div class="flex gap-4 pt-4 border-t border-outline-variant">
<button class="bg-primary-container text-on-primary px-8 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 transition-all">Follow Author</button>
<button class="border border-on-surface text-on-surface px-8 py-3 rounded-lg font-ui-button text-ui-button hover:bg-surface-container transition-all">Share Profile</button>
</div>
</div>
</section>
<!-- Stats Bar -->
<section class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-section-gap">
<div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
<span class="block font-display-lg text-display-lg text-primary">12.4k</span>
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Followers</span>
</div>
<div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
<span class="block font-display-lg text-display-lg text-on-surface">840k</span>
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Total Views</span>
</div>
<div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
<span class="block font-display-lg text-display-lg text-on-surface">142</span>
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Articles</span>
</div>
<div class="bg-white border border-outline-variant p-6 rounded-lg text-center">
<span class="block font-display-lg text-display-lg text-on-surface">4.9</span>
<span class="font-ui-label text-ui-label text-secondary uppercase tracking-wider">Avg Rating</span>
</div>
</section>
<div class="flex items-center justify-between mb-8">
<h2 class="font-headline-md text-headline-md text-on-surface">Published Articles</h2>
<div class="flex gap-2">
<button class="p-2 border border-outline-variant rounded-lg text-on-surface-variant hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined" data-icon="grid_view">grid_view</span>
</button>
<button class="p-2 border border-outline-variant rounded-lg text-primary bg-surface-container">
<span class="material-symbols-outlined" data-icon="list">list</span>
</button>
</div>
</div>
<!-- Articles Feed (Editorial List) -->
<div class="space-y-12">
<!-- Article 1 -->
<article class="flex flex-col md:flex-row gap-8 items-start group">
<div class="w-full md:w-80 h-52 shrink-0 overflow-hidden rounded-lg border border-outline-variant bg-surface-container-low">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A high-contrast conceptual photograph of a sleek, dark metallic computer motherboard with glowing violet light traces flowing through the circuits. The setting is a sterile, futuristic laboratory environment with a monochrome black and white aesthetic. The atmosphere is quiet, technological, and intellectual, mirroring the editorial tone of a professional tech journal." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcWXIsAnZorCwh9yAnMF7zq2f23YkG38w9vDcCGFiF4KggoWPa0nXLzCa46is6pYtphiGdJF4y5KChmbxYJh4D-4xIeHx-WE774mCl6el3xq6o3QSZ0h5vmJafblD6L4ydBeW6gHBf-e4NqbItJjqHBlqTh3XbaNVVBWqrOJ_SChw2SM0aJlubzjlDbLtg2Yr0KfJ5IusIfw_7J3_hT-5sjbAsKn98OQYUsJfCyVWTmubfLfv9QbSFIRc6liQ5TeqpNlp9fqIHyiwz"/>
</div>
<div class="flex-1 space-y-4">
<div class="flex items-center gap-3">
<span class="bg-primary-fixed text-on-primary-fixed px-3 py-1 rounded-full font-metadata text-metadata uppercase tracking-widest">Technology</span>
<span class="font-metadata text-metadata text-secondary">Oct 14, 2024 · 8 min read</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">The Ghost in the Machine: Why Architecture Still Matters in a No-Code World</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">In an era where abstraction layers are thicker than ever, understanding the fundamental physics of software remains the only true competitive advantage for developers. We explore the hidden costs of convenience...</p>
<div class="flex items-center gap-6 pt-2">
<button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
<span class="material-symbols-outlined text-[18px]" data-icon="thumb_up">thumb_up</span> 2.1k
                            </button>
<button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
<span class="material-symbols-outlined text-[18px]" data-icon="chat_bubble">chat_bubble</span> 84
                            </button>
<button class="ml-auto p-2 text-secondary hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="bookmark_add">bookmark_add</span>
</button>
</div>
</div>
</article>
<div class="h-px bg-outline-variant"></div>
<!-- Article 2 -->
<article class="flex flex-col md:flex-row gap-8 items-start group">
<div class="w-full md:w-80 h-52 shrink-0 overflow-hidden rounded-lg border border-outline-variant bg-surface-container-low">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A minimalist composition of open, cream-colored notebooks and vintage fountain pens resting on a dark walnut desk. The scene is illuminated by harsh, direct sunlight from a window, creating dramatic sharp shadows and deep ink-like contrasts. The aesthetic is purely editorial and intellectual, emphasizing the act of writing and deep thinking on high-quality paper." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkyB2zWJPPrtsMq3DyIiD37NgudJrqsdBSftSl32tPuJGx2ZhSlaX_EzSItl_o6tYamHjPqSCoJhd3FaPsYRB62Z0Eq5QsVGKjzmDKpTKLMRY1tObib06BAvm87IrSArk1DV8KpNANiskh4MB9-azYC8OZLKIoxB8LK77vxbo-oBQTDq7UIu6zKNJGM7cPl4rWO3ztjYJM6vMmiDODzh4ppETD2LGifKjzIJP4CwtVUS83eoOIVwLadRckFWFQEjnT2JNpDWMqWXfk"/>
</div>
<div class="flex-1 space-y-4">
<div class="flex items-center gap-3">
<span class="bg-primary-fixed text-on-primary-fixed px-3 py-1 rounded-full font-metadata text-metadata uppercase tracking-widest">Philosophy</span>
<span class="font-metadata text-metadata text-secondary">Sep 28, 2024 · 12 min read</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">Deep Work in a Surface World: Lessons from the Great Polymaths</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">The attention economy has fractured our ability to sit with a single problem for more than ten minutes. By revisiting the rituals of Leibniz and Von Neumann, we can reclaim our intellectual autonomy...</p>
<div class="flex items-center gap-6 pt-2">
<button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
<span class="material-symbols-outlined text-[18px]" data-icon="thumb_up">thumb_up</span> 1.8k
                            </button>
<button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
<span class="material-symbols-outlined text-[18px]" data-icon="chat_bubble">chat_bubble</span> 56
                            </button>
<button class="ml-auto p-2 text-secondary hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="bookmark_add">bookmark_add</span>
</button>
</div>
</div>
</article>
<div class="h-px bg-outline-variant"></div>
<!-- Article 3 -->
<article class="flex flex-col md:flex-row gap-8 items-start group">
<div class="w-full md:w-80 h-52 shrink-0 overflow-hidden rounded-lg border border-outline-variant bg-surface-container-low">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A digital render of a decentralized network visualization, featuring intricate nodes and crystalline structures connected by thin vibrant violet threads. The background is a deep charcoal void, making the white and purple connections stand out with intense clarity. The style is sharp, clean, and representative of modern blockchain and cryptography concepts with a high-end SaaS aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2Gu-dRx1DuzQgocCs5yUAkoWTxR4v7wwgWxdH3DaEaPcSsx0M_nuPnVHwkrv9sGwF0sTFu1SsyK-uHYPeiH5jXOLcdd1Fv7oKqdVG4wdNnwZSzHn3FdW_nXHXOEAs_R8cu2DIZZsnFnIDTijaqTpkbhue-dCS30rb239dZWwZ4lWnX99XI2Tzh5J54BMUhczwjmqsvON7PgZagLPd0WEPat_I_rL1QVlzRYpbi4i9VFSVIBFLGDliakELNDx3yyEBN_hNuAR-57NR"/>
</div>
<div class="flex-1 space-y-4">
<div class="flex items-center gap-3">
<span class="bg-primary-fixed text-on-primary-fixed px-3 py-1 rounded-full font-metadata text-metadata uppercase tracking-widest">Web3</span>
<span class="font-metadata text-metadata text-secondary">Sep 15, 2024 · 15 min read</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">The Social Consensus: Rethinking Governance for Digital Cooperatives</h3>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">Most DAOs fail because they try to automate human politics with smart contracts. We need a new layer of social coordination that prioritizes human judgment over algorithmic execution...</p>
<div class="flex items-center gap-6 pt-2">
<button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
<span class="material-symbols-outlined text-[18px]" data-icon="thumb_up">thumb_up</span> 3.4k
                            </button>
<button class="flex items-center gap-2 font-ui-label text-ui-label text-secondary hover:text-on-surface">
<span class="material-symbols-outlined text-[18px]" data-icon="chat_bubble">chat_bubble</span> 112
                            </button>
<button class="ml-auto p-2 text-secondary hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="bookmark_add">bookmark_add</span>
</button>
</div>
</div>
</article>
</div>
<!-- Pagination/Load More -->
<div class="mt-section-gap text-center">
<button class="border border-outline text-on-surface px-12 py-4 rounded-lg font-ui-button text-ui-button hover:bg-surface-container transition-all">Load More Articles</button>
</div>
</div>
@endsection
