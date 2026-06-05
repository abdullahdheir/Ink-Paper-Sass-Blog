@extends('layouts.public')

@section('title', 'Feed - Ink & Paper')

@section('page-content')
    <!-- Left Sidebar: Navigation & Tags -->
    <aside class="hidden md:block md:col-span-2 space-y-8">
        <div class="space-y-4">
            <h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary font-bold">Discover</h3>
            <ul class="space-y-2">
                <li><a class="flex items-center gap-3 text-primary font-bold font-ui-label text-ui-label py-1"
                        href="#"><span class="material-symbols-outlined"
                            style="font-variation-settings: 'FILL' 1;">explore</span>Explore</a></li>
                <li><a class="flex items-center gap-3 text-on-surface-variant hover:text-primary transition-colors font-ui-label text-ui-label py-1"
                        href="#"><span class="material-symbols-outlined">trending_up</span>Popular</a></li>
                <li><a class="flex items-center gap-3 text-on-surface-variant hover:text-primary transition-colors font-ui-label text-ui-label py-1"
                        href="#"><span class="material-symbols-outlined">history</span>Recent</a></li>
            </ul>
        </div>
        <div class="space-y-4">
            <h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary font-bold">Your Tags</h3>
            <div class="flex flex-wrap gap-2">
                <a class="px-3 py-1 bg-surface-container border border-outline-variant rounded-full font-metadata text-metadata hover:bg-outline-variant transition-colors"
                    href="#">#Development</a>
                <a class="px-3 py-1 bg-surface-container border border-outline-variant rounded-full font-metadata text-metadata hover:bg-outline-variant transition-colors"
                    href="#">#DesignSystems</a>
                <a class="px-3 py-1 bg-surface-container border border-outline-variant rounded-full font-metadata text-metadata hover:bg-outline-variant transition-colors"
                    href="#">#Minimalism</a>
                <a class="px-3 py-1 bg-surface-container border border-outline-variant rounded-full font-metadata text-metadata hover:bg-outline-variant transition-colors"
                    href="#">#Typography</a>
                <a class="px-3 py-1 bg-surface-container border border-outline-variant rounded-full font-metadata text-metadata hover:bg-outline-variant transition-colors"
                    href="#">#Future</a>
            </div>
        </div>
    </aside>
    <!-- Center Feed -->
    <section class="col-span-1 md:col-span-7 space-y-12">
        <!-- Featured Article (Bento Style) -->
        <article
            class="group border border-outline-variant rounded-xl overflow-hidden bg-white hover:border-primary transition-colors duration-300">
            <div class="aspect-[16/9] overflow-hidden">
                <img alt=""
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBFBSyj6CkyvBOD_SRQ5A-cSY1Cdw5WCfpcpMbK6wt1gNKpKVEBIHZC_rRMCEvC8iTE1zTEYRtsP81jrHP0bo9ffojhdYOzgAhgs1Cz0q8QFqa0nSD_IfSMhW9ztTCe15twvtGHZkIn0PtjzGAqIbQpqDXsAI-wV5oooi_CA4cwuHj96Y1K7UbHK1q_5sWUMDjows8tWRxj4iMYvIBUd-ops3T519EOJ6RlLxzk1jn0Wtk_8HWTjpj__S_xDppqNI1tnhqIX3QSUad" />
            </div>
            <div class="p-8 space-y-4">
                <div class="flex items-center gap-3 font-metadata text-metadata text-secondary">
                    <span
                        class="bg-primary-container text-on-primary px-2 py-0.5 rounded font-bold uppercase tracking-wider">Featured</span>
                    <span>•</span>
                    <span>May 12, 2024</span>
                    <span>•</span>
                    <span>8 min read</span>
                </div>
                <h2
                    class="font-headline-md text-headline-md text-on-surface leading-tight group-hover:text-primary transition-colors">
                    The Architecture of Quiet: Why Minimalist Design Wins the Long Game</h2>
                <p class="text-on-surface-variant font-body-md text-body-md line-clamp-3">In an era of digital noise,
                    the most powerful statement a brand can make is silence. We explore the structural psychology behind
                    'Paper &amp; Ink' aesthetics and how whitespace drives user focus in SaaS environments.</p>
                <div class="flex items-center justify-between pt-4 border-t border-outline-variant">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-surface-container border border-outline-variant overflow-hidden">
                            <img alt="Author" class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlYHQ2yPKl-Weyq3JRVjhy936Wd9AaAVvFRAHsIQrKrnCv4i5A-cQ6YF0zqrKz1Ma7N9cW9R6NimpSIUyDmkSyzdN0Sf4wwyS7Jf5Iq_UrWBpwB9MPN5QGbUNdxa82Mz2YU2I0GnXGjM6DDPi-mIODcm-LUOTsZb-C7V1GgUyP3AvuztsY0A5OKbR2TsqCVVxpF70-TiHMB2Jsyd2ojVnbA0gj9jJ03QY9BqD7puDZnBBYI5PyKBtwtQiGWMcknmNIjCWUWokSAMSR" />
                        </div>
                        <div>
                            <p class="font-ui-label text-ui-label font-bold text-on-surface">Julian Thorne</p>
                            <p class="font-metadata text-metadata text-secondary">Design Principal</p>
                        </div>
                    </div>
                    <button class="text-primary p-2 rounded-full hover:bg-primary-container/10 transition-colors">
                        <span class="material-symbols-outlined">bookmark_add</span>
                    </button>
                </div>
            </div>
        </article>
        <!-- Grid of Regular Articles -->
        <div class="grid grid-cols-1 gap-12">
            <!-- Article 2 -->
            <article class="flex flex-col md:flex-row gap-8 group">
                <div
                    class="w-full md:w-1/3 aspect-video md:aspect-square overflow-hidden rounded-lg border border-outline-variant">
                    <img alt=""
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtSx0MXlyyHL9GDHEXpmVuFjybH99-q36c7QJTv0fLQwy0bb3eBj178Az7BSSJoknhXuC_7o1TO5kPZgkPkWw6yJq4AsDaf1guCajS-XLG4CGZQdWf_DqrRyYz2887catDIoVg0ESyyurHoHI12XjIlwQkmpdearKFbgD7sR0iEuiBjHsf9_eLT9hloE9e0ZMvny6jI2TH7fAujx5JzCyOoevEgM56_cZpD7VBzsm-j99FpzfXdYfrGKV6LuXD0wvmX0mRJnCkKLyF" />
                </div>
                <div class="w-full md:w-2/3 space-y-3">
                    <div class="flex items-center gap-2 font-metadata text-metadata text-secondary">
                        <span class="text-primary font-bold">Typography</span>
                        <span>•</span>
                        <span>May 10, 2024</span>
                    </div>
                    <h3
                        class="font-headline-md text-[24px] leading-snug text-on-surface group-hover:text-primary transition-colors">
                        The Resurgence of Serif Fonts in High-Contrast Digital Interfaces</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md line-clamp-2">How modern high-resolution
                        displays are bringing back the elegance of the serif, and why readability is the new luxury.</p>
                    <div class="flex items-center gap-3 pt-2">
                        <p class="font-ui-label text-ui-label text-on-surface font-medium">Elena Vance</p>
                        <span class="text-secondary text-metadata">•</span>
                        <span class="text-secondary font-metadata text-metadata">5 min read</span>
                    </div>
                </div>
            </article>
            <!-- Article 3 -->
            <article class="flex flex-col md:flex-row gap-8 group">
                <div
                    class="w-full md:w-1/3 aspect-video md:aspect-square overflow-hidden rounded-lg border border-outline-variant">
                    <img alt=""
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYOfwZva0F3aWqjVIFQtGgNkCRYq1JRNEMXBD0AkUlEEjMZc6s0G8_FIOJqlR7yUPsMAgaN5Mdk12msCp-vZTcDx14FpUnXYFZzVv1Fq6wMmIlqAAKNp2s-nOvKHpc67EHg38exnymuQfAi1za4cPulsSu4YQPqnlXKqR-6_4BuLfVgV-Z0U_Bn-6UOhyvzHxMcXiLf5MAHC1XglUgOp2FIPbALir4i9sBSPPX2gTLdVe1K42tVpGIA3mG6VHeWCvjOQoBYKgFVIAu" />
                </div>
                <div class="w-full md:w-2/3 space-y-3">
                    <div class="flex items-center gap-2 font-metadata text-metadata text-secondary">
                        <span class="text-primary font-bold">Productivity</span>
                        <span>•</span>
                        <span>May 08, 2024</span>
                    </div>
                    <h3
                        class="font-headline-md text-[24px] leading-snug text-on-surface group-hover:text-primary transition-colors">
                        Curating Your Digital Canvas: A Guide to Focused Workspaces</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md line-clamp-2">Reducing cognitive load
                        through environmental design. Learn how to strip away the non-essential from your workflow.</p>
                    <div class="flex items-center gap-3 pt-2">
                        <p class="font-ui-label text-ui-label text-on-surface font-medium">Marcus Chen</p>
                        <span class="text-secondary text-metadata">•</span>
                        <span class="text-secondary font-metadata text-metadata">12 min read</span>
                    </div>
                </div>
            </article>
        </div>
        <div class="pt-8 flex justify-center">
            <button
                class="px-8 py-3 border border-primary text-primary font-ui-button text-ui-button rounded-lg hover:bg-primary-container/5 transition-all">
                Load More Stories
            </button>
        </div>
    </section>
    <!-- Right Sidebar: Trending & Who to Follow -->
    <aside class="hidden lg:block lg:col-span-3 space-y-12">
        <!-- Trending Section -->
        <div class="bg-white border border-outline-variant rounded-xl p-6 space-y-6">
            <h3 class="font-headline-md text-[20px] text-on-surface">Trending on Ink</h3>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <span class="font-display-lg text-secondary opacity-30 leading-none">01</span>
                    <div class="space-y-1">
                        <h4
                            class="font-ui-label text-ui-label font-bold text-on-surface leading-tight hover:text-primary cursor-pointer">
                            The Carbon Cost of AI Writing</h4>
                        <p class="font-metadata text-metadata text-secondary">Tech • 4 min read</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <span class="font-display-lg text-secondary opacity-30 leading-none">02</span>
                    <div class="space-y-1">
                        <h4
                            class="font-ui-label text-ui-label font-bold text-on-surface leading-tight hover:text-primary cursor-pointer">
                            Interview: The Poet in the Machine</h4>
                        <p class="font-metadata text-metadata text-secondary">Culture • 15 min read</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <span class="font-display-lg text-secondary opacity-30 leading-none">03</span>
                    <div class="space-y-1">
                        <h4
                            class="font-ui-label text-ui-label font-bold text-on-surface leading-tight hover:text-primary cursor-pointer">
                            Reclaiming Your Time from Algorithms</h4>
                        <p class="font-metadata text-metadata text-secondary">Life • 6 min read</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Who to Follow -->
        <div class="space-y-6">
            <h3 class="font-ui-label text-ui-label uppercase tracking-widest text-secondary font-bold">Recommended
                Authors</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img alt="User" class="w-10 h-10 rounded-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_bDNza0_XsizBBXy317LgL0ZlmEMBGHRNKyKJQEHUTZshyhzuRibQZzQeQZzBZYYQiReJ2d-IiJwtoIjp6M6rGrrwY37laL6K4BthiktNmgwhd0qebRtgpHmf8yFhbk-tHrPmUa7BNZsDbuhL6IgYwEAUf_kGkv_NiAdgkdMoXonaLJXpkAtuWiOU1uM4o9ZxZjLoB4P657GWFnuaJ4zwrnfXzPwxL1DmQ-hiP1T0i5Tr4yNY1JUGm0wgGbbwqoDe_zItDbBhPO9s" />
                        <div>
                            <p class="font-ui-label text-ui-label font-bold text-on-surface">Sarah Drasner</p>
                            <p class="font-metadata text-metadata text-secondary">Software Engineer</p>
                        </div>
                    </div>
                    <button
                        class="px-3 py-1 border border-on-surface text-on-surface rounded-full font-metadata text-metadata font-bold hover:bg-on-surface hover:text-white transition-all">Follow</button>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img alt="User" class="w-10 h-10 rounded-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEbvciYQ2X_kcFKWWe0O2L03yycemd88WyF_ooBIPwvG-WUezMyveSVstWiBM3XBuBVeVDzlceL-_gL4AgUIr6BEBpg3Euz2S2UzZN3b7J0xsam1LeGO1NhpU_0esyYJLMpFBq04g-yrbxML5Mh9hqxz5h5TIJ9P7mJfg6g-cWjvM7qDXLTdmFZBp2k_85lHK2C98M3j3TVo-8bN-Fxw0iZjBGwnUEnXJTIzcuZiKkPQIYxNt5ft8vlUeIg_jxv3WpCbfdLVr_BibE" />
                        <div>
                            <p class="font-ui-label text-ui-label font-bold text-on-surface">David Perell</p>
                            <p class="font-metadata text-metadata text-secondary">Writer &amp; Educator</p>
                        </div>
                    </div>
                    <button
                        class="px-3 py-1 border border-on-surface text-on-surface rounded-full font-metadata text-metadata font-bold hover:bg-on-surface hover:text-white transition-all">Follow</button>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img alt="User" class="w-10 h-10 rounded-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBn451ZfbDr0Yg1IXraoXumBVLm-GRjvj1ID8YSBo0NiOHTR4h-nTwkze6WtbjRnNOOMDcBV7PVYIEX2ErQLZ5CS0pjQHCWUfvRmnxBdvz8-Vx2EBwEKvXbfHCqrNa1VTMg8U0jzBuUI677uzcLVYBXfX-MGBuqjb8F88PuUlDth4sZu3gUuA2PIYmrVS-QFLFolBrLmvCbiZ1MixmBXlkAL8-XnIM-WJuv7SMkmfwFvY9i6LBBcJEWfjZDfTG8AOPKgzwjZMRCMCdJ" />
                        <div>
                            <p class="font-ui-label text-ui-label font-bold text-on-surface">Alice Wong</p>
                            <p class="font-metadata text-metadata text-secondary">Ethics in Tech</p>
                        </div>
                    </div>
                    <button
                        class="px-3 py-1 border border-on-surface text-on-surface rounded-full font-metadata text-metadata font-bold hover:bg-on-surface hover:text-white transition-all">Follow</button>
                </div>
            </div>
            <a class="block font-ui-label text-ui-label text-primary font-bold hover:underline" href="#">View
                all recommendations</a>
        </div>
        <!-- Newsletter Sign Up -->
        <div class="p-6 bg-primary-container rounded-xl text-on-primary space-y-4">
            <h3 class="font-headline-md text-[20px]">The Sunday Edition</h3>
            <p class="font-metadata text-metadata text-on-primary-container">Join 40,000+ creators receiving our weekly
                digest on design, code, and intentional living.</p>
            <div class="space-y-2">
                <input
                    class="w-full px-4 py-2 rounded bg-white/10 border border-white/20 text-white placeholder:text-white/60 focus:ring-1 focus:ring-white focus:outline-none"
                    placeholder="email@example.com" type="email" />
                <button
                    class="w-full py-2 bg-white text-primary font-ui-button text-ui-button rounded hover:bg-opacity-90 transition-all">Subscribe</button>
            </div>
        </div>
    </aside>
@endsection
