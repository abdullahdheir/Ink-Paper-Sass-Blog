@extends('layouts.public')

@section('title', 'Category Hub - Ink & Paper')

@section('page-content')
<!-- Category Header -->
<header class="max-w-container-max mx-auto px-gutter mb-12">
<div class="max-w-article-max">
<div class="flex items-center gap-2 mb-4 text-primary font-ui-label text-ui-label uppercase tracking-widest">
<span>Category</span>
</div>
<h1 class="font-display-lg text-display-lg mb-6 text-on-surface">Design</h1>
<p class="font-body-lg text-body-lg text-secondary leading-relaxed">
                    Exploring the intersection of aesthetics, utility, and human behavior. From the fundamentals of grid systems to the future of generative UI, we chronicle the evolving visual language of the digital age.
                </p>
</div>
</header>
<div class="max-w-container-max mx-auto px-gutter">
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Main Content: Featured & Feed -->
<div class="md:col-span-8">
<!-- Featured Section -->
<section class="mb-section-gap">
<div class="flex items-center justify-between mb-8">
<h2 class="font-headline-md text-headline-md text-on-surface">Featured Insight</h2>
<div class="h-px flex-grow mx-6 bg-outline-variant"></div>
</div>
<article class="group cursor-pointer">
<div class="relative overflow-hidden rounded-xl aspect-[16/9] mb-6">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="A clean and professional photograph of a modern designer's workspace. A slim laptop sits on a light oak desk next to a textured ceramic mug of coffee. The lighting is soft and natural, streaming in from a nearby window, creating a serene and focused editorial atmosphere. The color palette is minimal, dominated by warm wood tones, soft whites, and deep charcoal accents, embodying a sophisticated high-end design aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqUea0n3297U8g60MXeD-4rWtm1pX7x35g85nk68PqlQLcVwjmKJv9vxwjor689pankY2-rb0etdqSCkxGgwhx3XE6h5bWja_RhDP93R4vGPvpY0ZK0zzXBrgMkejLY3WT8oErtK1owK8sUXwLiEccOG53ge8ucL8UMwFVYSLPop2yOlBQ0shv0u9ca3ASk4eEByBNP0y0doWhBJ9kvm9KlKJW5rD8R4PYifpYe_vA-zm95FP9ChjhmRcMTSx2LfJwz-ERpg70q5ez"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
</div>
<div>
<span class="font-ui-label text-ui-label text-primary mb-2 block">Long Form • 12 min read</span>
<h3 class="font-headline-md text-headline-md mb-4 group-hover:text-primary transition-colors">The Editorial Renaissance: Why Web Design is Returning to Print Fundamentals</h3>
<p class="font-body-md text-body-md text-secondary mb-6 line-clamp-3">
                                    As digital noise reaches a fever pitch, designers are looking backward to move forward. Discover how the rigid grids and deliberate whitespace of mid-century print magazines are reclaiming the web canvas.
                                </p>
<div class="flex items-center gap-4">
<img alt="Elara Vance" class="w-10 h-10 rounded-full border border-outline-variant" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8Tx8W8Y3fg5KDu8JFJOw1My_1wF8uyUVjlVKi09fMx4FEx4rP-h_gsl5PIenh8FdzOm10hoH9NkOFB8KSC1tHpXTuMbRKkc3yNAJUZkaMn1KDZrqz3JxtZxiUdYhC-ygw2ciJqPh4FtXuU81w6P_klrsLTIXqNEX-tVWeZhhWFeoXhElPLboEHAzYbdk-BNZx6enCk9_N450KSsgGHPmnMbiln3zsL7yeINh3bS4zQQ6s-2NRmBcZkf-3Px7k0VQxNj3MZMRlu_t3"/>
<div>
<p class="font-ui-label text-ui-label text-on-surface font-bold">Elara Vance</p>
<p class="font-metadata text-metadata text-secondary">Design Lead at Studio Ink</p>
</div>
</div>
</div>
</article>
</section>
<!-- Popular Tags Grid (Asymmetric) -->
<section class="mb-section-gap bg-surface-container rounded-xl p-8 border border-outline-variant">
<h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary mb-8">Popular Sub-Categories</h3>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
<a class="bg-surface p-6 rounded-lg border border-outline-variant hover:border-primary group transition-all" href="#">
<span class="material-symbols-outlined text-primary mb-3 block group-hover:scale-110 transition-transform">layers</span>
<span class="font-ui-label text-ui-label font-bold block">UI/UX Design</span>
<span class="font-metadata text-metadata text-secondary">1.2k articles</span>
</a>
<a class="bg-surface p-6 rounded-lg border border-outline-variant hover:border-primary group transition-all" href="#">
<span class="material-symbols-outlined text-primary mb-3 block group-hover:scale-110 transition-transform">text_fields</span>
<span class="font-ui-label text-ui-label font-bold block">Typography</span>
<span class="font-metadata text-metadata text-secondary">850 articles</span>
</a>
<a class="bg-surface p-6 rounded-lg border border-outline-variant hover:border-primary group transition-all" href="#">
<span class="material-symbols-outlined text-primary mb-3 block group-hover:scale-110 transition-transform">brush</span>
<span class="font-ui-label text-ui-label font-bold block">Color Theory</span>
<span class="font-metadata text-metadata text-secondary">420 articles</span>
</a>
<a class="bg-surface p-6 rounded-lg border border-outline-variant hover:border-primary group transition-all" href="#">
<span class="material-symbols-outlined text-primary mb-3 block group-hover:scale-110 transition-transform">token</span>
<span class="font-ui-label text-ui-label font-bold block">Design Systems</span>
<span class="font-metadata text-metadata text-secondary">930 articles</span>
</a>
</div>
</section>
<!-- Feed Items -->
<section class="space-y-12">
<div class="flex items-center justify-between">
<h2 class="font-headline-md text-headline-md text-on-surface">Latest Discussions</h2>
</div>
<!-- List Item 1 -->
<div class="grid md:grid-cols-4 gap-8 pb-12 border-b border-outline-variant group">
<div class="md:col-span-1 rounded-lg overflow-hidden bg-surface-container h-32">
<img class="w-full h-full object-cover" data-alt="A high-contrast macro photograph of metallic typography blocks used in traditional letterpress printing. The sharp edges of the ink-stained metal are highlighted by dramatic, directional lighting. The aesthetic is industrial yet refined, focusing on the tactile quality of graphic design history. Deep shadows and bright highlights emphasize the 'Ink &amp; Paper' brand philosophy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3Ceyu5bxKxKKaP5wVOrj9OW_4DtylZasPauSrDoiov8LL0bj_WH238CbD_NYE1uI48I0NnSPQfpCzK-vHofHZoz9ADkTlHRYS147KSOUzVg7lBN5j-Eiesk8vGCITP4VXjhSNnGjqnGu_4xLrH7ThnndeAElZx3qOl60ROMh_xUGJ5gRA594LNUzeqAI5vIwB1czBA2aQdpoP4hVhc32aKnbMZJWFQdeC7GE3mpXAREhirrpoZG5j8Us21hygF3oDHjZod4SvFCAk"/>
</div>
<div class="md:col-span-3">
<span class="font-metadata text-metadata text-secondary mb-2 block">Typography • 5h ago</span>
<h4 class="font-body-lg text-body-lg font-bold mb-2 group-hover:text-primary transition-colors">The subtle psychology of Variable Fonts in responsive interfaces</h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-4">Beyond performance benefits, variable fonts allow for a level of micro-expression that was previously impossible in digital typesetting.</p>
<div class="flex items-center gap-2">
<span class="font-ui-label text-ui-label font-bold">Julian Rossi</span>
<span class="text-outline-variant">•</span>
<span class="font-metadata text-metadata text-secondary">4 min read</span>
</div>
</div>
</div>
<!-- List Item 2 -->
<div class="grid md:grid-cols-4 gap-8 pb-12 border-b border-outline-variant group">
<div class="md:col-span-1 rounded-lg overflow-hidden bg-surface-container h-32">
<img class="w-full h-full object-cover" data-alt="A minimalist abstract 3D render of floating geometric glass shapes with subtle chromatic aberration at the edges. The shapes are suspended in a soft, light-grey void, reflecting a clean digital minimalist aesthetic. The lighting is ethereal and diffused, creating a high-end tech-art feel with purple and violet light refractions that align with the Electric Violet primary brand color." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIdoZZhTury3KfQ063f4e4AC6iP0p3jqb7EAffRId4_C2sJSmTlRPRpRIQm06MLebY-3XN1GW8SaMGJ8v1xJAsUpzNqQ3NCqdwoFz1nlmnwNywWbloqqpqzU64hTt0Ih-k51iCt88pRtTsW-lwl4eiQY2cnf10Z-wzIslcW5vs_QmoxSIt-llnWtB-GttqRN9FxyGJgNnzJOgyq01NnOQ-d0cRAzYsI0UjQo7TpWWMPUxoiCNsERiA5WCMmou_ATlpD-XncqgbnSaD"/>
</div>
<div class="md:col-span-3">
<span class="font-metadata text-metadata text-secondary mb-2 block">Minimalism • 1d ago</span>
<h4 class="font-body-lg text-body-lg font-bold mb-2 group-hover:text-primary transition-colors">Why "Digital Quiet" is the most important UX trend of 2024</h4>
<p class="font-body-md text-body-md text-secondary line-clamp-2 mb-4">Designing for focus in an era of distraction requires more than just removing features; it requires a structural rethink of intent.</p>
<div class="flex items-center gap-2">
<span class="font-ui-label text-ui-label font-bold">Sasha K.</span>
<span class="text-outline-variant">•</span>
<span class="font-metadata text-metadata text-secondary">8 min read</span>
</div>
</div>
</div>
</section>
</div>
<!-- Sidebar: Trending Authors -->
<aside class="md:col-span-4 space-y-12">
<section class="sticky top-24">
<div class="border border-outline-variant rounded-xl p-6 bg-surface">
<h3 class="font-ui-label text-ui-label uppercase tracking-widest text-on-surface mb-6 border-b border-outline-variant pb-4">Trending Designers</h3>
<ul class="space-y-6">
<li class="flex items-center justify-between group">
<div class="flex items-center gap-3">
<img alt="Author" class="w-10 h-10 rounded-full grayscale group-hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkZqqJzicRXp7UecU6lNa0lrzUpdu_keabT-k6hWQXW0bF0OfAqGQXk0Lq_WkTsrsSXgXYPk8EZGsSE32VMjNj9xLMC_B_AIJ1VJajfFUQ8DF2-dsZw7HNc1qAb5M9jqvtEP2ow0-cEsqfi4OoVFcFOe3t6NPBSAraYv4LHHz2RSxz2kfepD9eFahhmkCDHFy19lRlPgTslxg-1G2ZZav8OPOEmE6Mj4ylonOkutO__wQ3uzhzoBghDBivdBTVVtq6uZQTZ8qouUCB"/>
<div>
<p class="font-ui-label text-ui-label font-bold">Marcus Thorne</p>
<p class="font-metadata text-metadata text-secondary">System Architect</p>
</div>
</div>
<button class="text-primary font-ui-label text-ui-label hover:underline">Follow</button>
</li>
<li class="flex items-center justify-between group">
<div class="flex items-center gap-3">
<img alt="Author" class="w-10 h-10 rounded-full grayscale group-hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBXOdMksUwYtOZQMs5yIuSEQnPXSAILzbh49Ryj6YY0r5WYtwwy2iEFu3DfFTgOuL5IBYJpvl7WZgfBBSgYmtcJqUXijxf0fTtpol_r6qfDxu-mJBdQ4d7KUP7dStka3OQzlGGWaYs10SWLiYzoY9zr8YdicPzMCTovIm29b3S0E-hkf3R5gwPNBqH7jdRnn445oe49WlWtj57X5i1l1aOmyIPnMdZbV0beWlE2HevPxY6h02EDJ-pqslNMBxSBmjTHWmgwuwy2jZXa"/>
<div>
<p class="font-ui-label text-ui-label font-bold">Lena Chen</p>
<p class="font-metadata text-metadata text-secondary">Visual Futurist</p>
</div>
</div>
<button class="text-primary font-ui-label text-ui-label hover:underline">Follow</button>
</li>
<li class="flex items-center justify-between group">
<div class="flex items-center gap-3">
<img alt="Author" class="w-10 h-10 rounded-full grayscale group-hover:grayscale-0 transition-all" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAa5Bt5ZOOUEGJb5x5msPEiA4QmIn5_wP_OqmLFLj5zn0TXEY3iOZDIHEh6vmp284D_Ubvu5e1tcY4s2B_8BmflEWTHcwFEcIj3w94hUmp9e2bDmBL5u4JaJbndKcZ54UoJwqoTx97ZM_e5zRDdwJB9dt0Eh7JZvsYJSSRNrnOQwDtfQ90I9i6oraR5F432MPPdctI870Y6DtPaUG-5G4aqeGoUK2b_YQRmpXoyrYLS5APJWhW6FKrcNbqSr5P-zdxD-Ng_KZswgKQO"/>
<div>
<p class="font-ui-label text-ui-label font-bold">David Sacks</p>
<p class="font-metadata text-metadata text-secondary">UX Researcher</p>
</div>
</div>
<button class="text-primary font-ui-label text-ui-label hover:underline">Follow</button>
</li>
</ul>
</div>
<!-- Newsletter Anchor -->
<div class="mt-8 p-6 bg-primary rounded-xl text-on-primary">
<h4 class="font-headline-md text-[20px] mb-2">Weekly Design Digest</h4>
<p class="font-body-md text-sm opacity-90 mb-4">The best of Design, delivered to your inbox every Sunday morning.</p>
<div class="flex flex-col gap-3">
<input class="bg-on-primary/10 border border-on-primary/20 rounded-lg px-4 py-2 text-white placeholder:text-white/60 focus:ring-on-primary focus:border-on-primary" placeholder="Email address" type="email"/>
<button class="bg-on-primary text-primary px-4 py-2 rounded-lg font-ui-button text-ui-button">Subscribe</button>
</div>
</div>
</section>
</aside>
</div>
</div>
@endsection
