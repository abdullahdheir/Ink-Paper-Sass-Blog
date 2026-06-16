@extends('layouts.public')

@section('title', 'Julian Vane Profile - Ink & Paper')

@section('page-content')
    <div class="max-w-container-max mx-auto px-gutter">

        <!-- Profile Header Section -->
        <section class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start mb-16">
            <div class="md:col-span-3 flex justify-center md:justify-start">
                <div class="relative">
                    <img class="w-48 h-48 rounded-xl border border-outline-variant object-cover bg-surface-container shadow-sm"
                        data-alt="A professional studio portrait illustration of a creative director in a minimalist style. The character has sharp features, wearing modern glasses and a charcoal turtleneck, set against a clean off-white background. The lighting is soft and directional, creating subtle depth. The overall aesthetic is editorial and high-contrast, echoing a premium digital publication vibe."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBM459mxuCXQR-OFb9TxxieJNcMeGV9QuXgcS4Q8lBG8r-AW-O-8k1q9EklQWceJsBCTrVTgRooLOqdpxF-y6-_FwuxPAZXAQDXzImEYk8O_Op4It23YCD-hdu0KTGsRx_tw5RKpH9iJzC3PCV33_EqFIeiN7VvgobOtqneEUjOZDjF2c0-gzDLes-RA4nDe0aF-FzN_euGrPVTL6qKhA3akQ4MrkhRX0jVLT-7JWSXA6ANjGtRSNGVccFKaO1boz0b-_sajqeeLYkS" />
                </div>
            </div>
            <div class="md:col-span-6 space-y-6">
                <div class="space-y-2">
                    <h1 class="font-display-lg text-display-lg text-on-surface">Julian Vane</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        Design Lead at Studio Ink. Writing about the intersection of tech and human behavior. Exploring how
                        digital interfaces shape our collective psychology.
                    </p>
                </div>
                <div class="flex flex-wrap gap-8">
                    <div class="flex flex-col">
                        <span class="font-headline-md text-headline-md text-on-surface">1.2k</span>
                        <span class="font-metadata text-metadata text-secondary">Followers</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-headline-md text-headline-md text-on-surface">482</span>
                        <span class="font-metadata text-metadata text-secondary">Following</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-headline-md text-headline-md text-on-surface">24</span>
                        <span class="font-metadata text-metadata text-secondary">Articles</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3">
                        <a class="text-secondary hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined" data-icon="language">language</span>
                        </a>
                        <a class="text-secondary hover:text-primary transition-colors" href="#">
                            <span class="material-symbols-outlined" data-icon="alternate_email">alternate_email</span>
                        </a>
                    </div>
                    <div class="h-4 w-px bg-outline-variant mx-2"></div>
                    <span class="font-metadata text-metadata text-secondary flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]" data-icon="location_on">location_on</span>
                        London, UK
                    </span>
                </div>
            </div>
            <div class="md:col-span-3 flex md:justify-end">
                <button
                    class="w-full md:w-auto bg-primary text-on-primary px-8 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all shadow-sm">
                    Follow
                </button>
            </div>
        </section>
        <!-- Content Tabs -->
        <div class="border-b border-outline-variant mb-12">
            <div class="flex gap-10">
                <button
                    class="pb-4 border-b-2 border-primary text-on-surface font-bold font-ui-label text-ui-label">Articles</button>
                <button
                    class="pb-4 border-b-2 border-transparent text-secondary hover:text-on-surface transition-colors font-ui-label text-ui-label">About</button>
                <button
                    class="pb-4 border-b-2 border-transparent text-secondary hover:text-on-surface transition-colors font-ui-label text-ui-label">Bookmarks</button>
            </div>
        </div>
        <!-- Articles Grid (Bento Style & High-End Cards) -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Featured Article Card -->
            <article
                class="md:col-span-8 group border border-outline-variant rounded-xl overflow-hidden bg-surface-container-lowest transition-all hover:border-primary">
                <div class="flex flex-col md:flex-row h-full">
                    <div class="md:w-1/2 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            data-alt="A clean top-down view of a modern workstation featuring a mechanical keyboard, a high-end fountain pen, and a blank paper notebook. The lighting is soft morning sunlight filtering through a window, creating long, soft shadows. The color palette is composed of muted greys, warm wood tones, and crisp whites, embodying a focused and intellectual atmosphere for a tech-writer's office."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7aTU33r_4kVzxFeFLPkrqWxshj9A_-Bq0OZRodfymjikdn--tEpAB0QlwmnFAchdaO0LcyMRmSGpGywNQPZgokqcxjbVvqBBpa6uXfHniMeoMyqxP5FS0qiKbocGZOPfd8NWsY4sZ8XQxQIhLBRBG8yEiOog3GDUZLuT8ANnXMgw6-nByA81rNM8EiHAZ83Zidy5xKeiu6qJVrtf2_hYtqxqjPlQItk44EuKk7htXUzb2R0mSLIFQerPYK-GSsrm8Nhltx7K4Eo5j" />
                    </div>
                    <div class="md:w-1/2 p-8 flex flex-col justify-between">
                        <div class="space-y-4">
                            <span
                                class="font-metadata text-metadata text-primary uppercase tracking-wider font-bold">Featured
                                Analysis</span>
                            <h2
                                class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                                The Architecture of Attention: Why Minimalism Still Matters</h2>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-3">In an era of cognitive
                                overload, the design systems we build either serve the user's focus or exploit it. Exploring
                                the
                                ethics of interaction design.</p>
                        </div>
                        <div class="mt-8 flex items-center justify-between">
                            <span class="font-metadata text-metadata text-secondary">Oct 24, 2024 · 12 min read</span>
                            <span class="material-symbols-outlined text-primary"
                                data-icon="arrow_forward">arrow_forward</span>
                        </div>
                    </div>
                </div>
            </article>
            <!-- Sidebar/Metadata Stats -->
            <div class="md:col-span-4 space-y-8">
                <div class="p-6 border border-outline-variant rounded-xl bg-surface-container-low">
                    <h3 class="font-ui-label text-ui-label font-bold text-on-surface mb-4">Topic Expertise</h3>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="px-3 py-1 bg-surface-container-highest rounded-full font-metadata text-metadata text-on-surface-variant">UX
                            Design</span>
                        <span
                            class="px-3 py-1 bg-surface-container-highest rounded-full font-metadata text-metadata text-on-surface-variant">Cognitive
                            Science</span>
                        <span
                            class="px-3 py-1 bg-surface-container-highest rounded-full font-metadata text-metadata text-on-surface-variant">SaaS</span>
                        <span
                            class="px-3 py-1 bg-surface-container-highest rounded-full font-metadata text-metadata text-on-surface-variant">Typography</span>
                        <span
                            class="px-3 py-1 bg-surface-container-highest rounded-full font-metadata text-metadata text-on-surface-variant">Behavioral
                            Econ</span>
                    </div>
                </div>
                <div class="p-6 border border-outline-variant rounded-xl border-dashed">
                    <p class="font-metadata text-metadata text-secondary italic">"Design is not just what it looks like and
                        feels like. Design is how it works."</p>
                </div>
            </div>
            <!-- More Articles -->
            <article
                class="md:col-span-4 group border border-outline-variant rounded-xl overflow-hidden bg-surface-container-lowest transition-all hover:border-primary">
                <div class="h-48 overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="An abstract visualization of digital data flowing through a dark, sleek architectural space. Glowing violet light trails contrast against deep charcoal surfaces, representing the speed and beauty of human-computer interaction. The image is rendered with a shallow depth of field, highlighting the intricate digital patterns in the foreground while the background dissolves into soft, moody bokehs."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEEsxkyFRljDqETRcL8WEU0fa7GhniRi6YcpsmWIFcVK3aPE5aBbir-9Yv1nj7jfJSFjzAo6eVknPHfNNPNKQfovubHHCEitNlXEgOd9pzMEYYDH5liaZ3_rR1UoeqNWZYS9693U9MrjsMITBxsA-yrN8W7erR0dHp6zHmnQXLX4gGj3HSZGLoKjglvRpolZFeQly3HXzLW1MpkYguBZkvh_XAJSSyb_D2WYL9gYTr2PTVkAbUfUK1Zh5PBxnwPWy-dmgnAhokph8q" />
                </div>
                <div class="p-6 space-y-3">
                    <span class="font-metadata text-metadata text-secondary">Technology</span>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface group-hover:text-primary transition-colors">
                        Bridging the Gap: AI and Empathy</h3>
                    <p class="font-metadata text-metadata text-on-surface-variant line-clamp-2">How generative models are
                        forcing us to redefine what it means to be a creative collaborator.</p>
                </div>
            </article>
            <article
                class="md:col-span-4 group border border-outline-variant rounded-xl overflow-hidden bg-surface-container-lowest transition-all hover:border-primary">
                <div class="h-48 overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="A candid, high-contrast black and white photograph of a design team collaborating in a bright, modern studio. The walls are adorned with large-scale typographic articleers and wireframe sketches. Natural light spills across a large communal table where people are engaged in deep discussion. The mood is professional, creative, and highly focused, capturing the spirit of a high-end design agency."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBz9-Xs2eM1zX8ejapH0WiWscCPHBCcnKS6-VsyHvlGi5TdN6Oi-RaD9NOLDdGys1O4pUOyeeXQcWpIgiMvRUFIroln0rZ7JXrlhtXBenPejKO1VDdkOH71cEX3XyyrH9mjpx0zyNooKC_5E0_1fCceOJjmxjSudhch0WP0cAW7664aNEyEMWQ3j87oztXKQ7TswlkqD7zdZ7jtU5HcU9-6Dsw7QvziGOPFyS0LMS2r-tas6E39V5vbKgfjF9PpPr7MStG-wqarxc4O" />
                </div>
                <div class="p-6 space-y-3">
                    <span class="font-metadata text-metadata text-secondary">Culture</span>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface group-hover:text-primary transition-colors">
                        The Future of Studio Ink</h3>
                    <p class="font-metadata text-metadata text-on-surface-variant line-clamp-2">Reflections on building a
                        design-first culture in a remote-first world.</p>
                </div>
            </article>
            <article
                class="md:col-span-4 group border border-outline-variant rounded-xl overflow-hidden bg-surface-container-lowest transition-all hover:border-primary">
                <div class="h-48 overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="A close-up macro shot of ink spreading through high-quality textured paper. The photograph captures the intricate fibers of the paper and the rich, deep black pigment of the ink as it bleeds and creates organic patterns. The lighting is dramatic and directional, highlighting the physical texture and 'paper and ink' philosophy. The color palette is monochromatic with extreme clarity."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDJpGuT1J0ij9f-O3wcEijP8Gzuh8IMPYYw6JbEW5fkRlLE6bJIEzyQVs2vxheDdVSb51ehSjvVp8PF0TSlQWkB682fhM4gqH-PZqCMTE9fIHs8rBphJRBsaqDCrgv6QXgb3WE1s1XdqQOn4pSxZ5gJjF4-7N1ZLOFKo3fGk-Uhe0tPgt2ucuGtAEIT8ERQGag3BamKb2uqI7BcrJHDGHLsGue0XhWdLDlITW7N6rw05jI7Od93WFJ__BX2tIqqVPAQzAWIVEb6GOeU" />
                </div>
                <div class="p-6 space-y-3">
                    <span class="font-metadata text-metadata text-secondary">Process</span>
                    <h3
                        class="font-ui-label text-ui-label font-bold text-on-surface group-hover:text-primary transition-colors">
                        Ink to Pixels: Analog Roots</h3>
                    <p class="font-metadata text-metadata text-on-surface-variant line-clamp-2">Why sketching by hand is
                        still
                        the most efficient way to solve complex architectural problems.</p>
                </div>
            </article>
        </div>
        <!-- Pagination/Load More -->
        <div class="mt-16 flex justify-center">
            <button
                class="px-8 py-3 border border-outline text-on-surface rounded-lg font-ui-label text-ui-label hover:bg-surface-container transition-colors">
                Load more articles
            </button>
        </div>
    </div>
@endsection
