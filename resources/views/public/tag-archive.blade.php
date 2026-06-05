@extends('layouts.public')

@section('title', 'Tag Archive - Ink & Paper')

@section('page-content')
<!-- Tag Header -->
<header class="mb-section-gap">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-outline-variant pb-8">
<div>
<div class="flex items-center gap-2 text-primary font-ui-label text-ui-label mb-2">
<span class="material-symbols-outlined text-[18px]">tag</span>
<span>Archive</span>
</div>
<h1 class="font-display-lg text-display-lg text-on-surface mb-2">#Minimalism</h1>
<p class="text-on-surface-variant font-ui-label text-ui-label">128 Curated Articles • Updated daily</p>
</div>
<!-- Sorting Options -->
<div class="flex items-center gap-6 font-ui-label text-ui-label text-on-surface-variant">
<button class="active-sort pb-1 transition-all">Latest</button>
<button class="hover:text-on-surface pb-1 transition-all">Top</button>
<button class="hover:text-on-surface pb-1 transition-all">Oldest</button>
</div>
</div>
</header>
<div class="grid grid-cols-1 md:grid-cols-12 gap-12">
<!-- Articles Feed (720px focused column) -->
<section class="md:col-span-8 flex flex-col gap-12">
<!-- Article Card 1 -->
<article class="flex flex-col gap-6 group">
<div class="aspect-[16/9] w-full bg-surface-container-low rounded-lg overflow-hidden ink-border">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A serene, wide-angle shot of a single minimalist desk lamp on a pristine white desk in a high-key room. The environment is bathed in soft, diffused morning light, emphasizing clean lines and vast negative space. The composition is strictly minimalist, using a palette of white, light grey, and subtle violet shadows." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3Ir1GGLiuhm_oujGBjDPFpkVveWR3E6LjC1abN0zMeqXg6hzcqpOeiWSggXDLO_aDLAwH6lo0NbKZHvCDsNQfM_YZML_6Pvq1NNUEAqBYVYfQsFCULqDgQ1KgcZpSTyzqo1dpqrNxhIS181yDJdfIWX6pMhr64udkwdITPkUJagUcWckFSjL7nFn4GClSKP9sONJJxRTUpR2czcID3yawckY3SoS8MbyKAS6AX8Mq0YjBLFwvzdKGFPlwYkG2R7J-STXB9U13_oXQ"/>
</div>
<div class="max-w-article-max">
<div class="flex items-center gap-3 mb-3">
<img class="w-6 h-6 rounded-full" data-alt="Close-up portrait of a thoughtful writer in a bright studio. Soft lighting from a side window creates gentle shadows. The aesthetic is clean and intellectual, fitting the Paper and Ink design philosophy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDC8zH1keauAVNU2riVHeddrJ4AvPOHRJ7g2g0mCv9LBzfPRdtrxbXMDYzjX5m4NDmtRT3XGUZOM0gZO-R_ueAvf5WiPOlQ6xZQcKlLs_3aOFlV-WxVWF4F6wnxPQSbBTehlo4duI3elho6XPZ4FBHjY_deSlDYyvJJkZoBYnFdHpbo6YhqVljXNO0uX7S8zwJpFt-nyCjEZxn3xx_ubHNACSoyL8ava2zMGrIKMlGhQZDsETPXVc2hQkILOJrAr2jwm71wNlmx92Bu"/>
<span class="font-metadata text-metadata text-secondary">Julian Vane • 12 Oct 2023</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface mb-3 group-hover:text-primary transition-colors">The psychological weight of physical objects</h2>
<p class="text-on-surface-variant font-body-md line-clamp-3">In an era of digital abundance, the items we choose to keep in our physical space carry more meaning than ever. Explore how reducing your inventory can expand your mental capacity for creative output.</p>
<div class="mt-4 flex items-center gap-4">
<span class="font-ui-label text-ui-label text-primary flex items-center gap-1 cursor-pointer">Read Article <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary transition-all">bookmark</span>
</div>
</div>
</article>
<div class="h-px bg-outline-variant w-full"></div>
<!-- Article Card 2 -->
<article class="flex flex-col gap-6 group">
<div class="aspect-[16/9] w-full bg-surface-container-low rounded-lg overflow-hidden ink-border">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Modern architectural detail of a concrete building against a clear, pale blue sky. The image focuses on sharp geometric shadows and high-contrast lines. The overall feel is architectural and cold, yet beautiful in its simplicity. Pure white and deep charcoal tones dominate the scene." src="https://lh3.googleusercontent.com/aida-public/AB6AXuADwbSXRC9zmEj1qJszbT3iygcGK2W3T-5vnSvUGpeqb08TzwJ_AbfeCyK6lJqTKZvPYkPw6Ezt7AinBWBenWWihbCHAftbvGQBTe9rq8FwR0cu2jSgG5QBZkdWyYAQG9fQcfM1IvQPas6SJBLJVs-kYhFLMeHBy1pDTyrquhj6iJJCL9kvNYK5xB9fw2xO2CEQkOG_lNuDHqwOj4q6xH9m06kW5gEQZYdjjDFHhJbDdOm_MemUZXIuFDnu6dQt4i12KZ4TG1swI8jS"/>
</div>
<div class="max-w-article-max">
<div class="flex items-center gap-3 mb-3">
<img class="w-6 h-6 rounded-full" data-alt="Professional avatar of a woman with glasses, looking directly into the camera. High-key lighting, minimalist background, sharp focus on eyes. Professional and authoritative aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLQcTPaH-7LAmMGQCtvBiObGG3fHcnb7bbSISMMtU-kwmjL8LqVD-ySdJaIcWRpO9KYj9Qhlk2w6Km3pTvoJRp-28p0OfC2M1oQE3yKa3cXbnjr_P-H3083CsqP2qdg2VvLh0qO25rBr-hqX94tLsnha0SZRhol37yRsav8CpIQgkND3xCuJfc2s9ltEyxSLUKwf4j87amX8IY4VBOiYcA4kDrGVPN08rCznfM8vQR2-36KJidykkPWddrfzn7Tiv6Yh29KpYI-a-Y"/>
<span class="font-metadata text-metadata text-secondary">Elena Rosales • 08 Oct 2023</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface mb-3 group-hover:text-primary transition-colors">Designing for the 'Empty State' in UI</h2>
<p class="text-on-surface-variant font-body-md line-clamp-3">Why whitespace is your most powerful tool in interface design. We dive into the philosophy of 'Less but Better' when applied to modern software engineering and user experience.</p>
<div class="mt-4 flex items-center gap-4">
<span class="font-ui-label text-ui-label text-primary flex items-center gap-1 cursor-pointer">Read Article <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary transition-all">bookmark</span>
</div>
</div>
</article>
<div class="h-px bg-outline-variant w-full"></div>
<!-- Article Card 3 -->
<article class="flex flex-col gap-6 group">
<div class="aspect-[16/9] w-full bg-surface-container-low rounded-lg overflow-hidden ink-border">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A stack of high-quality white paper on a wooden table, illuminated by a sharp beam of light from an unseen window. The surrounding area is in deep shadow, creating a dramatic chiaroscuro effect. The mood is quiet, focused, and scholarly." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1_8FIpJQkarq-osbhxhwT8s5v1hhhWRU8ZpPq3Ka0QaDcgUjdU0KIT9sBnzhe5z_q3W9NeptcSer4QqTR3Wjw5Q7t104Wwc9oGF76SBU_h9Ix2SpR60GtwTkFx1yBvO-c4c5Dds8GqhL45YXI-v97_ml3xy_xz00qm5wHelNSlETda0ksMeFsEmi8w-3b6gc2Q8YbjUU02sJl2tz-OilCizSk7bhcudXlHoF324xza8oJaSqcZ4ibzbtphDxZj8kmeL9GRSOKpvfC"/>
</div>
<div class="max-w-article-max">
<div class="flex items-center gap-3 mb-3">
<img class="w-6 h-6 rounded-full" data-alt="A portrait of a male developer with a minimalist workspace in the background. Natural lighting, clean composition, professional tone." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAI8kX5BCxlymn0F62BwFKKnL-SE9uxqQnBTru0YbhVin2yD8VfNJs5UiGgm1FlV36pUZkQeKZ5DPiWYVjWXg6yP77EboO7jYK5fC0Rbt2xvPltyun4Lt3mkQRGUIreVREtFAy8k00UH8zRwVXb9SrKbIwLdtGVfbrjolOi1-u1pGtkYXXrv_NgFnClpAoct-tuhhjMvidigXMAZvpyQ7mYShCAre8u2cf26WvM7a95xNfDQKUQ8tnVG069sBFbcangMX01odeWR7Hu"/>
<span class="font-metadata text-metadata text-secondary">Marcus Thorne • 01 Oct 2023</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface mb-3 group-hover:text-primary transition-colors">Writing: The art of deletion</h2>
<p class="text-on-surface-variant font-body-md line-clamp-3">A guide to editorial pruning. Learn how to remove the fluff and leave only the core essence of your message for a more impactful reading experience.</p>
<div class="mt-4 flex items-center gap-4">
<span class="font-ui-label text-ui-label text-primary flex items-center gap-1 cursor-pointer">Read Article <span class="material-symbols-outlined text-[16px]">arrow_forward</span></span>
<span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary transition-all">bookmark</span>
</div>
</div>
</article>
<!-- Pagination -->
<div class="flex items-center justify-center gap-4 mt-8">
<button class="w-10 h-10 flex items-center justify-center rounded-lg ink-border hover:bg-surface-container transition-all">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<span class="font-ui-label text-ui-label px-4 py-2 bg-primary-container text-on-primary rounded-lg">1</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg ink-border hover:bg-surface-container transition-all">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg ink-border hover:bg-surface-container transition-all">3</button>
<span class="text-secondary">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg ink-border hover:bg-surface-container transition-all">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</section>
<!-- Sidebar -->
<aside class="md:col-span-4 flex flex-col gap-12">
<!-- Related Tags Section -->
<div class="bg-surface-container-lowest p-6 rounded-lg ink-border paper-shadow">
<h3 class="font-ui-label text-ui-label font-bold text-on-surface mb-6 uppercase tracking-wider">Related Tags</h3>
<div class="flex flex-wrap gap-2">
<a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all" href="#">#Architecture</a>
<a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all" href="#">#Productivity</a>
<a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all" href="#">#Essays</a>
<a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all" href="#">#UXDesign</a>
<a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all" href="#">#Lifestyle</a>
<a class="px-3 py-1 bg-surface ink-border rounded-full font-metadata text-metadata hover:border-primary hover:text-primary transition-all" href="#">#Monochrome</a>
</div>
</div>
<!-- Trending Topics (Bento Style Item) -->
<div class="bg-surface-container-lowest p-6 rounded-lg ink-border paper-shadow">
<h3 class="font-ui-label text-ui-label font-bold text-on-surface mb-6 uppercase tracking-wider">Trending in #Minimalism</h3>
<ul class="flex flex-col gap-6">
<li class="flex flex-col gap-1 cursor-pointer group">
<span class="text-metadata font-metadata text-secondary">01</span>
<span class="text-ui-label font-ui-label font-semibold text-on-surface group-hover:text-primary">The 100 Thing Challenge</span>
</li>
<li class="flex flex-col gap-1 cursor-pointer group">
<span class="text-metadata font-metadata text-secondary">02</span>
<span class="text-ui-label font-ui-label font-semibold text-on-surface group-hover:text-primary">Dieter Rams' Legacy</span>
</li>
<li class="flex flex-col gap-1 cursor-pointer group">
<span class="text-metadata font-metadata text-secondary">03</span>
<span class="text-ui-label font-ui-label font-semibold text-on-surface group-hover:text-primary">Digital De-cluttering</span>
</li>
</ul>
</div>
<!-- Newsletter Subscription -->
<div class="bg-primary-container p-6 rounded-lg text-on-primary">
<h3 class="font-headline-md text-[20px] mb-2">Curated Quiet</h3>
<p class="font-ui-label text-ui-label text-primary-fixed opacity-90 mb-6">Weekly insights on minimalism, delivered straight to your inbox.</p>
<div class="flex flex-col gap-3">
<input class="bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-white/50" placeholder="email@address.com" type="email"/>
<button class="bg-white text-primary font-ui-button text-ui-button py-2 rounded-lg hover:bg-surface transition-all">Subscribe</button>
</div>
</div>
</aside>
</div>
@endsection
