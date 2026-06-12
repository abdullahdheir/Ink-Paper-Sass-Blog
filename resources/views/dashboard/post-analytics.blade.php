@extends('layouts.dashboard')

@section('title', 'Article Analytics - Ink & Paper')

@section('page-content')
    <!-- Dashboard Header -->
    <div class="mb-12">
        <a class="flex items-center gap-2 text-primary font-ui-label text-ui-label mb-6 group" href="#">
            <span class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
            Back to Dashboard
        </a>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="max-w-article-max">
                <div class="flex items-center gap-3 mb-3">
                    <span
                        class="bg-surface-container-high text-on-surface-variant px-3 py-1 rounded-full text-metadata font-metadata uppercase tracking-wider">Published</span>
                    <span class="text-secondary text-metadata font-metadata">Oct 12, 2023</span>
                </div>
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface leading-tight">The Art
                    of Digital Silence: Minimalism in a Wired World</h1>
            </div>
            <div class="flex gap-4">
                <button
                    class="px-6 py-2 border border-outline text-on-surface font-ui-button text-ui-button rounded-lg hover:bg-surface-container transition-all">Edit
                    Article</button>
                <button
                    class="px-6 py-2 bg-on-surface text-surface font-ui-button text-ui-button rounded-lg hover:opacity-90 transition-all">View
                    Live</button>
            </div>
        </div>
    </div>
    <!-- Hero Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
            <div class="flex items-center gap-2 text-secondary mb-4">
                <span class="material-symbols-outlined text-lg">visibility</span>
                <span class="font-ui-label text-ui-label">Total Views</span>
            </div>
            <div class="font-headline-md text-headline-md text-on-surface">14,203</div>
            <div class="flex items-center gap-1 text-primary text-metadata font-metadata mt-2">
                <span class="material-symbols-outlined text-sm">trending_up</span>
                <span>12% from last week</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
            <div class="flex items-center gap-2 text-secondary mb-4">
                <span class="material-symbols-outlined text-lg">timer</span>
                <span class="font-ui-label text-ui-label">Avg. Read Time</span>
            </div>
            <div class="font-headline-md text-headline-md text-on-surface">5m 12s</div>
            <div class="flex items-center gap-1 text-secondary text-metadata font-metadata mt-2">
                <span class="material-symbols-outlined text-sm">remove</span>
                <span>Stable engagement</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
            <div class="flex items-center gap-2 text-secondary mb-4">
                <span class="material-symbols-outlined text-lg">payments</span>
                <span class="font-ui-label text-ui-label">Total Earnings</span>
            </div>
            <div class="font-headline-md text-headline-md text-on-surface">$412.50</div>
            <div class="flex items-center gap-1 text-primary text-metadata font-metadata mt-2">
                <span class="material-symbols-outlined text-sm">trending_up</span>
                <span>8% increase</span>
            </div>
        </div>
    </div>
    <!-- Main Dashboard Content -->
    <div class="grid grid-cols-12 gap-8">
        <!-- Left Column: Engagement & Charts -->
        <div class="col-span-12 lg:col-span-8 space-y-8">
            <!-- Read-Through Rate Visualization -->
            <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h2 class="font-headline-md text-2xl text-on-surface mb-1">Read-Through Rate</h2>
                        <p class="text-secondary font-metadata text-metadata">Percentage of users who reached each section
                        </p>
                    </div>
                    <div class="text-right">
                        <span class="font-headline-md text-2xl text-primary">68%</span>
                        <p class="text-secondary font-metadata text-metadata">Completion Rate</p>
                    </div>
                </div>
                <div class="h-64 flex items-end justify-between gap-4">
                    <div class="flex-1 flex flex-col items-center gap-3">
                        <div class="w-full bg-primary-container h-[100%] rounded-t-sm opacity-100"></div>
                        <span class="text-metadata font-metadata text-secondary">Intro</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-3">
                        <div class="w-full bg-primary-container h-[92%] rounded-t-sm opacity-90"></div>
                        <span class="text-metadata font-metadata text-secondary">Sec 1</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-3">
                        <div class="w-full bg-primary-container h-[85%] rounded-t-sm opacity-80"></div>
                        <span class="text-metadata font-metadata text-secondary">Sec 2</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-3">
                        <div class="w-full bg-primary-container h-[74%] rounded-t-sm opacity-70"></div>
                        <span class="text-metadata font-metadata text-secondary">Sec 3</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center gap-3">
                        <div class="w-full bg-primary-container h-[68%] rounded-t-sm opacity-60"></div>
                        <span class="text-metadata font-metadata text-secondary">Conc.</span>
                    </div>
                </div>
            </div>
            <!-- Engagement Grid -->
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl text-center">
                    <span class="material-symbols-outlined text-primary mb-2">chat_bubble</span>
                    <div class="font-headline-md text-xl text-on-surface">128</div>
                    <div class="text-secondary font-ui-label text-ui-label">Comments</div>
                </div>
                <div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl text-center">
                    <span class="material-symbols-outlined text-primary mb-2">bookmark</span>
                    <div class="font-headline-md text-xl text-on-surface">45</div>
                    <div class="text-secondary font-ui-label text-ui-label">Bookmarks</div>
                </div>
                <div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl text-center">
                    <span class="material-symbols-outlined text-primary mb-2">share</span>
                    <div class="font-headline-md text-xl text-on-surface">82</div>
                    <div class="text-secondary font-ui-label text-ui-label">Shares</div>
                </div>
            </div>
            <!-- Traffic Sources -->
            <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
                <h2 class="font-headline-md text-2xl text-on-surface mb-8">Traffic Sources</h2>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <div class="flex justify-between font-ui-label text-ui-label">
                            <span class="text-on-surface">Direct</span>
                            <span class="text-secondary">42% (5,965)</span>
                        </div>
                        <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                            <div class="bg-on-surface h-full w-[42%]"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between font-ui-label text-ui-label">
                            <span class="text-on-surface">Search</span>
                            <span class="text-secondary">28% (3,976)</span>
                        </div>
                        <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full w-[28%]"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between font-ui-label text-ui-label">
                            <span class="text-on-surface">Social</span>
                            <span class="text-secondary">20% (2,840)</span>
                        </div>
                        <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container opacity-60 h-full w-[20%]"></div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between font-ui-label text-ui-label">
                            <span class="text-on-surface">Referrals</span>
                            <span class="text-secondary">10% (1,422)</span>
                        </div>
                        <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container opacity-30 h-full w-[10%]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Column: Geography & Sentiment -->
        <div class="col-span-12 lg:col-span-4 space-y-8">
            <!-- Reader Sentiment -->
            <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
                <h2 class="font-headline-md text-2xl text-on-surface mb-6">Reader Sentiment</h2>
                <div class="flex items-center justify-center py-8 relative">
                    <!-- Simplified Sentiment Gauge -->
                    <div class="text-center">
                        <span class="material-symbols-outlined text-6xl text-primary"
                            data-weight="fill">sentiment_very_satisfied</span>
                        <div class="mt-4 font-headline-md text-3xl">84%</div>
                        <div class="text-secondary font-metadata text-metadata">Positive Score</div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 border-t border-outline-variant pt-6 mt-2">
                    <div class="text-center">
                        <div class="text-primary font-bold">84%</div>
                        <div class="text-[10px] uppercase tracking-tighter text-secondary">Positive</div>
                    </div>
                    <div class="text-center">
                        <div class="text-on-surface font-bold">12%</div>
                        <div class="text-[10px] uppercase tracking-tighter text-secondary">Neutral</div>
                    </div>
                    <div class="text-center">
                        <div class="text-error font-bold">4%</div>
                        <div class="text-[10px] uppercase tracking-tighter text-secondary">Negative</div>
                    </div>
                </div>
                <p class="mt-6 text-secondary text-metadata font-metadata italic leading-relaxed">
                    "Most readers appreciate the practical advice on digital detoxing, though some requested more specific
                    app recommendations."
                </p>
            </div>
            <!-- Audience Geography -->
            <div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
                <h2 class="font-headline-md text-2xl text-on-surface mb-6">Top Locations</h2>
                <div class="mb-8 rounded-lg overflow-hidden h-40 bg-surface-container flex items-center justify-center">
                    <img data-alt="A stylized, minimalist map visualization of the world using a clean monochromatic palette. Dark charcoal continents sit on a light grey background, with small, soft-glowing violet dots indicating high activity clusters in North America, Europe, and Asia. The design is precise, high-contrast, and fits a premium editorial aesthetic."
                        data-location="London"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkF4U-ZKGh0jcv0t-ibUq7u45zkUzUmXbUX2QvqnnsjPefz2YcaZCnRZxDn0XgClolSelb97T4BNO56pSA2asa-J3r1Y7blSNBTRDp3_-SvJXgxDFf-KfiY3ykBDNJ40EVUU0d-eQ1nh38NL-40MqwwXpTEU_UMIEKTnYzeU6CavxVNxDNiAE6fEBATbuBXFi_G3k3Gmju6I77hQKix97Ll8ljEuerwNWLJpsq_n9IaBsClja7yh8bDr1OFEcJo5lChhCfEXxewNSt" />
                </div>
                <ul class="space-y-4">
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="font-ui-label text-ui-label text-on-surface">United States</span>
                        </div>
                        <span class="text-secondary font-metadata text-metadata">5,102</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="font-ui-label text-ui-label text-on-surface">United Kingdom</span>
                        </div>
                        <span class="text-secondary font-metadata text-metadata">2,410</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="font-ui-label text-ui-label text-on-surface">Germany</span>
                        </div>
                        <span class="text-secondary font-metadata text-metadata">1,895</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="font-ui-label text-ui-label text-on-surface">Canada</span>
                        </div>
                        <span class="text-secondary font-metadata text-metadata">1,204</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="font-ui-label text-ui-label text-on-surface">Japan</span>
                        </div>
                        <span class="text-secondary font-metadata text-metadata">956</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
