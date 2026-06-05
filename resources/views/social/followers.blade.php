@extends('layouts.dashboard')

@section('title', 'Followers - Ink & Paper')

@section('page-content')
<div class="max-w-article-max mx-auto">
<!-- Header Section -->
<div class="mb-12">
<h1 class="font-display-lg text-display-lg mb-4 text-on-surface">Your Network</h1>
<p class="text-on-surface-variant max-w-lg">Manage your connections and discover what the thinkers you follow are publishing.</p>
</div>
<!-- Tabbed Interface -->
<div class="flex gap-8 mb-8 border-b border-outline-variant">
<button class="pb-4 text-primary font-bold border-b-2 border-primary font-ui-label text-ui-label">Followers (1.2k)</button>
<button class="pb-4 text-on-surface-variant font-medium hover:text-on-surface transition-colors font-ui-label text-ui-label">Following (842)</button>
</div>
<!-- Author List Grid (Asymmetric Layout/Bento Feel) -->
<div class="space-y-6">
<!-- List Item 1 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex flex-col md:flex-row gap-6 items-start transition-all hover:shadow-sm">
<img class="w-20 h-20 rounded-lg object-cover" data-alt="An editorial style headshot of a female author with an intelligent and creative gaze. The lighting is natural and bright, coming from a large window in a clean, minimalist workspace. She is wearing a dark, elegant turtleneck that contrasts with the light, paper-like background. The image feels high-end, artistic, and professional, reflecting a premium content creator identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjPEZJg-NeQcDjJOTwzC9SencHioNUj1hdsemnBwW5u1SoilpopEbt3symRYOukEyRvEBV55MwXc7cDE4QSy3v0fqJFlu4LkMZlae0ojrFqWmF4Kxv9wn1NkfCGU18fAJfzR3rcmoPIm49hqPKuy_POaDZPD6G0tCrrwCh7bZL-B3MgCj1Dn70XtCwyqdPTPf0NtqokehoxrUDulni2GiV4NIdkh0YfwavodOFw_U95Sfq2R9_TkmH0uxeR9hGYhKw-KCQM9T_YUlU"/>
<div class="flex-grow">
<div class="flex justify-between items-start mb-2">
<div>
<h3 class="font-headline-md text-[24px] text-on-surface">Elena Vance</h3>
<p class="text-primary font-ui-label text-metadata uppercase tracking-wider mb-2">Philosophy &amp; Tech Ethics</p>
</div>
<button class="bg-primary text-on-primary px-4 py-1.5 rounded-full font-ui-button text-metadata hover:opacity-90 transition-opacity">Follow Back</button>
</div>
<p class="text-on-surface-variant font-body-md text-[16px] leading-relaxed">Exploring the intersection of artificial intelligence and human phenomenology. Contributor at The Atlantic and Wired.</p>
</div>
</div>
<!-- List Item 2 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex flex-col md:flex-row gap-6 items-start transition-all hover:shadow-sm">
<img class="w-20 h-20 rounded-lg object-cover" data-alt="A portrait of a male developer and writer in a crisp, white shirt. He is set against a background of a minimalist library with white bookshelves. The image uses high-contrast lighting to create sharp, ink-like shadows, mirroring the platform's 'Paper &amp; Ink' aesthetic. The overall mood is focused, intellectual, and modern." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpQSCADiFRLOj4zvv-zCtspK6P4amMN79bTvhH2JSOnbLhEISIvft-7TZYdcs-aK5-4btVd6rhSf7LY4MUtHFiTrQClvZATGEupHmacCOjWKip_5L-_QkGguwn8e_KKBCvmMf_cuZObGLctmslqcf1LnHzXVYgRnqBhnFm_fafrf3dzCQfoc-Ec6H6cPvU9Sb_wBezxY9VT5Emnqh59G-5kN2KqSAnpe_0eLIu8VgU0stP2pPP6OUW1iFR3S_wD9O3HLxpksjyTqk8"/>
<div class="flex-grow">
<div class="flex justify-between items-start mb-2">
<div>
<h3 class="font-headline-md text-[24px] text-on-surface">Marcus Thorne</h3>
<p class="text-primary font-ui-label text-metadata uppercase tracking-wider mb-2">Full-stack engineering</p>
</div>
<button class="border border-on-surface text-on-surface px-4 py-1.5 rounded-full font-ui-button text-metadata hover:bg-surface-container transition-colors">Unfollow</button>
</div>
<p class="text-on-surface-variant font-body-md text-[16px] leading-relaxed">Building open-source tools for the next generation of researchers. I write about React, Rust, and distributed systems.</p>
</div>
</div>
<!-- List Item 3 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex flex-col md:flex-row gap-6 items-start transition-all hover:shadow-sm">
<img class="w-20 h-20 rounded-lg object-cover" data-alt="A striking, close-cropped portrait of a mature man with glasses, looking directly into the camera. The style is strictly editorial, with a clean white background and soft, diffused light that creates a bright, airy feeling. His expression is welcoming yet authoritative. The image captures the essence of a seasoned intellectual and thought leader in a modern digital space." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKfprhQG0xll-UuoV7t1Ypb6rQK16EC3QGm2kO6-GrxJuf43El33_sEhM-f0u526RgHmS5rWRrKzHUMI5FtVa-31umLnVLyeFNQnTPOv26fAcxlkZ8FDs_L-Mj_hg8M50VnUG4t5GwZH4yx8mXxYK1o4rVskPdVg1JrmIjcvrjxvGo5--4B3oxjClElK7itBe0jpJA2pQcIK3azhBpEZuJVfDcjRwhiRcROyvwustmHxj4gXBrd7CsuZRYe4tyaGMKqO0ZeFqs8uER"/>
<div class="flex-grow">
<div class="flex justify-between items-start mb-2">
<div>
<h3 class="font-headline-md text-[24px] text-on-surface">Julian Aris</h3>
<p class="text-primary font-ui-label text-metadata uppercase tracking-wider mb-2">Economic History</p>
</div>
<button class="bg-primary text-on-primary px-4 py-1.5 rounded-full font-ui-button text-metadata hover:opacity-90 transition-opacity">Follow Back</button>
</div>
<p class="text-on-surface-variant font-body-md text-[16px] leading-relaxed">Analyzing the cycle of innovation and debt across the last four centuries. Author of "The Silent Capital".</p>
</div>
</div>
<!-- List Item 4 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex flex-col md:flex-row gap-6 items-start transition-all hover:shadow-sm">
<img class="w-20 h-20 rounded-lg object-cover" data-alt="A portrait of a young woman in a bright, sunlit room filled with green plants. The aesthetic is clean and minimalist, with a focus on natural light and soft shadows. She has a warm, confident smile. The color palette is dominated by whites and greens, punctuated by her dark hair, creating a high-contrast but welcoming visual consistent with the platform's design language." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrALVBlFhP8aMMgT46swcEL0ArBo-wrLydzbd7BSjscVS_pV4crXSNoh5dhdlLbMT_MzwnnkHxKDe1eApZV83ZmjOsDk8EsDEgOcaBE6osuADlW508NjZK58jLQLF_JNVn-L4Ro1dWFMkdniSP8VB4Cc9pfcnkToGJC2zoKjRb7VvVzYIfgPaoNC2aq5VB3bP4FpR_R8ko6FeykFkMVGIpJ7xRpLLHFeZHy0tsC_kd1YU_EepEkFZE166Bf_DVcsydAyZGGuVNyHZ9"/>
<div class="flex-grow">
<div class="flex justify-between items-start mb-2">
<div>
<h3 class="font-headline-md text-[24px] text-on-surface">Sarah Jenkins</h3>
<p class="text-primary font-ui-label text-metadata uppercase tracking-wider mb-2">Design Systems</p>
</div>
<button class="border border-on-surface text-on-surface px-4 py-1.5 rounded-full font-ui-button text-metadata hover:bg-surface-container transition-colors">Unfollow</button>
</div>
<p class="text-on-surface-variant font-body-md text-[16px] leading-relaxed">Designer at Figma. Obsessed with tokens, accessibility, and the future of collaborative design tools.</p>
</div>
</div>
</div>
<!-- Pagination/Load More -->
<div class="mt-12 text-center">
<button class="inline-flex items-center gap-2 border border-outline text-on-surface px-8 py-3 rounded-full font-ui-button text-ui-button hover:bg-surface-container transition-all">
<span>Load More Authors</span>
<span class="material-symbols-outlined text-[18px]">expand_more</span>
</button>
</div>
</div>
@endsection
