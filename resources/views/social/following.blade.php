@extends('layouts.dashboard')

@section('title', 'Following - Ink & Paper')

@section('page-content')
<!-- Section Header -->
<div class="max-w-article-max mx-auto mb-16">
<h1 class="font-display-lg text-display-lg text-on-surface mb-4">My Network</h1>
<div class="flex gap-8 border-b border-outline-variant">
<button class="pb-4 font-ui-label text-ui-label text-secondary hover:text-on-surface transition-all">Recommended</button>
<button class="pb-4 border-b-2 border-primary font-ui-label text-ui-label text-on-surface font-bold">Following</button>
<button class="pb-4 font-ui-label text-ui-label text-secondary hover:text-on-surface transition-all">Followers</button>
</div>
</div>
<!-- Asymmetric Bento Grid for Authors -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Author Card 1 (Large focus) -->
<div class="md:col-span-8 bg-surface-container-lowest border border-outline-variant p-8 rounded-xl flex flex-col md:flex-row gap-8 items-start hover:shadow-sm transition-shadow">
<div class="w-32 h-32 flex-shrink-0 rounded-lg overflow-hidden border border-outline-variant">
<img alt="Author Profile" class="w-full h-full object-cover" data-alt="A professional headshot of a woman with short dark hair, wearing glasses and a crisp white shirt. The lighting is soft and natural, coming from a large window in a high-end minimalist office space. The color palette is clean, dominated by whites and soft greys with sharp ink-like contrast. She looks confident and focused." src="https://lh3.googleusercontent.com/aida-public/AB6AXuApsO3LRfWSgTBuFGRjwdJIS7R0l31Fo1lJgQY2We0ombzXlej7T8sucko5egR-4MDiFXLEQJJIj2VcTs0BZH8ZHgcl11oO9kcvPXisEcwwL0hQUB6w4Hs51SsuMBN22kFCisDs2vM-_Axfh9nv8bVVMMHUw2Q1FS3b1KLL7xrq12OsyMmIykNYa0S5fqwps9XVoZWdFlIpFqnSZYugjNdXmJU4mU5SLlnrv2GniPk5jMqQBThu12HFaiGfw3QyqrZx5AgFPoCrA1S2"/>
</div>
<div class="flex-grow">
<div class="flex justify-between items-start mb-4">
<div>
<h2 class="font-headline-md text-headline-md text-on-surface leading-none mb-1">Dr. Elena Vance</h2>
<p class="font-metadata text-metadata text-secondary mb-4">Joined July 2023 • 142 Articles</p>
</div>
<button class="px-6 py-2 border border-on-surface text-on-surface rounded-full font-ui-button text-ui-label hover:bg-surface-container transition-all">
                            Unfollow
                        </button>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-6 leading-relaxed">
                        Explaining the intersection of behavioral psychology and digital interfaces. Currently researching how minimal design impacts cognitive focus in high-stress environments.
                    </p>
<div class="flex flex-wrap gap-2">
<span class="px-3 py-1 bg-surface-container-low border border-outline-variant rounded-full font-metadata text-metadata text-on-surface-variant">Cognitive Science</span>
<span class="px-3 py-1 bg-surface-container-low border border-outline-variant rounded-full font-metadata text-metadata text-on-surface-variant">UX Design</span>
<span class="px-3 py-1 bg-surface-container-low border border-outline-variant rounded-full font-metadata text-metadata text-on-surface-variant">Minimalism</span>
</div>
</div>
</div>
<!-- Author Card 2 (Compact) -->
<div class="md:col-span-4 bg-surface-container-lowest border border-outline-variant p-8 rounded-xl flex flex-col hover:shadow-sm transition-shadow">
<div class="w-16 h-16 mb-6 rounded-full overflow-hidden border border-outline-variant">
<img alt="Author Profile" class="w-full h-full object-cover" data-alt="A sharp, monochromatic portrait of a middle-aged man with a groomed beard and thoughtful expression. The background is a stark, textured light grey paper-like surface. High contrast lighting creates deep ink-black shadows. The image reflects a serious, intellectual mood consistent with a premium editorial platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsxUryXKUOGohWz-9wfA5BXyfHvxlrtTkxCPs0Xr1vHWBAhU7ElV05g1480ZivjMJxu4OErwW_shK9K9QcfwuNX1yJ-K147y-Qe1JhxSNrdsFkh7P7IHtTn2xJNXiQ1z6S2CGBDWs2iZyh8fIk3G0bwTGwEoM2qrT7FLGsx4gBIEJ2_3L85IcZ1rSkQtPYXJ7tiPVr6MnGav1apXrz90KK7IMPUl_DgRZhizgk9xBT4iWwX-2sYraFRHgHMGL0anF-QXaexBEbr1Wk"/>
</div>
<div class="mb-6">
<h2 class="font-headline-md text-headline-md text-on-surface text-2xl leading-tight mb-2">Julian K. Thorne</h2>
<div class="flex flex-wrap gap-2">
<span class="px-2 py-0.5 bg-primary-container/10 text-primary border border-primary/20 rounded font-metadata text-metadata">Systems Architecture</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-8 text-sm line-clamp-2">
                    Writing about the invisible layers of global infrastructure and their societal impacts.
                </p>
<button class="w-full py-2 border border-on-surface text-on-surface rounded-full font-ui-button text-ui-label hover:bg-surface-container transition-all mt-auto">
                    Unfollow
                </button>
</div>
<!-- Author Card 3 (Compact) -->
<div class="md:col-span-4 bg-surface-container-lowest border border-outline-variant p-8 rounded-xl flex flex-col hover:shadow-sm transition-shadow">
<div class="w-16 h-16 mb-6 rounded-full overflow-hidden border border-outline-variant">
<img alt="Author Profile" class="w-full h-full object-cover" data-alt="A portrait of a young woman with a vibrant, creative energy. She is smiling slightly, set against a bright, airy background with soft, diffused sunlight. The lighting is high-key and modern. The overall aesthetic is clean and editorial, using a sophisticated palette of white and subtle violet tones to match the digital quiet brand style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkaDGxXjs5aMuxB3VI1vOejFUudYvZ_4tX50KiI6Hi4gRBBHbMeCouh4GDR8f6HjqJQL_GHK9OXkwG6zfntEgH1GoIRq73UArJlPpxkN-KMztvo4Tsny-3gPDZfck9LbFa5mtzA8CtSdFROPYNs4qAd9I5Zj4KHCdCMk1L4_28K-LYnRo0j7MfK-0vWxfAk9hr6XAMm25g53m12Sxs6EHWX1iOWEPyLN7Rh7CnJFg2jAnTCJBlrp6WexukzH-ZRFqay9Yuys5NnTJD"/>
</div>
<div class="mb-6">
<h2 class="font-headline-md text-headline-md text-on-surface text-2xl leading-tight mb-2">Sarah Chen</h2>
<div class="flex flex-wrap gap-2">
<span class="px-2 py-0.5 bg-primary-container/10 text-primary border border-primary/20 rounded font-metadata text-metadata">Creative Code</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-8 text-sm line-clamp-2">
                    Exploring generative art and the philosophy of open-source creativity.
                </p>
<button class="w-full py-2 border border-on-surface text-on-surface rounded-full font-ui-button text-ui-label hover:bg-surface-container transition-all mt-auto">
                    Unfollow
                </button>
</div>
<!-- Author Card 4 (Horizontal Mid) -->
<div class="md:col-span-8 bg-surface-container-lowest border border-outline-variant p-8 rounded-xl flex flex-col sm:flex-row gap-6 items-center hover:shadow-sm transition-shadow">
<div class="w-24 h-24 flex-shrink-0 rounded-full overflow-hidden border border-outline-variant">
<img alt="Author Profile" class="w-full h-full object-cover" data-alt="A close-up portrait of a man in his 30s with a sharp, analytical gaze. He is positioned in a modern, minimalist workspace with clean lines and soft ambient lighting. The color scheme is predominantly monochromatic with high contrast ink-like blacks and paper-whites, evoking a sense of digital quiet and professional focus." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCZJhqY8AXShMLNNf7jGXlqI49dbUcfgRFyv0_xK44AFhKU-2Zp2PJM9UZRSTPJ_KZzmaqWPzr3_Wcna_klTsMTXPiif6I3SYwEuw6zmJF-ZnAN5WgLBcPkYdxetBoNX7iLHrWIRuYVYicl9tZV4Zs05fcGonsJzrVvRSi50gWodGO9ahnyAD97DV0Fg7hlWxUcGtqlZC5ELQQzjpMELatzeFP2Jdu5Agu_kXflRJR0L1Wb45VNjntdyjoepAA8S5b-MR3WbWOP6flt"/>
</div>
<div class="flex-grow text-center sm:text-left">
<h2 class="font-headline-md text-headline-md text-on-surface text-2xl mb-1">Marcus Aurelius Jr.</h2>
<p class="font-metadata text-metadata text-primary mb-3">Ethics in AI • Digital Sovereignty</p>
<p class="font-body-md text-body-md text-on-surface-variant text-base line-clamp-2 mb-0">
                        Modern stoicism for the digital age. Helping developers navigate the ethical complexities of the current technological revolution.
                    </p>
</div>
<div class="flex-shrink-0">
<button class="px-6 py-2 border border-on-surface text-on-surface rounded-full font-ui-button text-ui-label hover:bg-surface-container transition-all">
                        Unfollow
                    </button>
</div>
</div>
<!-- Author Card 5 (List Style) -->
<div class="md:col-span-12 bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex items-center gap-6 hover:bg-surface transition-colors">
<div class="w-12 h-12 rounded-full overflow-hidden border border-outline-variant">
<img alt="Author Profile" class="w-full h-full object-cover" data-alt="A professional profile photo of a woman with a calm, intellectual demeanor. She is set against a simple off-white background with professional studio lighting. The high-contrast monochromatic style emphasizes clarity and sophistication, perfectly fitting a modern minimalist SaaS design system." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmCPDVeucd0h4gFYXezxkGBZ-wEmtMt6rW244eA53pGH_otX_GCle40lW1I57-i3KDnARZ8NvfuRG-k9PFsuMwBM6xAUzj0FLjRC66dloItWMsVgTbut7_Ap5xLCxYz4WiuZvTra0xF0Ck3PKxK2WNLmXmgfn6UXGOP4qEQa9anJQpkV-B7LDg88NE21FV1K83x5kGAu-LDtfDHxrfnHfZhsK5HkjKgUzUoCvJxAgnZ04gtJxmYR2-O0MiAYrjRl23518JxjLdK2_j"/>
</div>
<div class="flex-grow flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h3 class="font-ui-label text-on-surface font-bold text-lg">Amara Okafor</h3>
<p class="font-metadata text-metadata text-secondary">Expertise in Quantum Computing &amp; Data Ethics</p>
</div>
<div class="flex items-center gap-4">
<div class="hidden md:flex gap-2">
<span class="px-2 py-0.5 border border-outline-variant rounded font-metadata text-metadata text-secondary">Physics</span>
<span class="px-2 py-0.5 border border-outline-variant rounded font-metadata text-metadata text-secondary">Ethics</span>
</div>
<button class="px-4 py-1.5 border border-on-surface text-on-surface rounded-full font-ui-button text-xs hover:bg-surface-container transition-all">
                            Unfollow
                        </button>
</div>
</div>
</div>
</div>
<!-- Pagination/Load More -->
<div class="mt-16 flex justify-center">
<button class="px-8 py-3 border border-outline-variant text-on-surface-variant rounded-lg font-ui-button hover:border-on-surface hover:text-on-surface transition-all flex items-center gap-2">
                Show more authors
                <span class="material-symbols-outlined text-sm" data-icon="keyboard_arrow_down">keyboard_arrow_down</span>
</button>
</div>
@endsection
