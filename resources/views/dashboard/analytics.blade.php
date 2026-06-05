@extends('layouts.dashboard')

@section('title', 'Dashboard Analytics - Ink & Paper')

@section('page-content')
    <!-- Header Section -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <h1 class="font-headline-md text-headline-md text-on-surface mb-2">Author Dashboard</h1>
            <p class="text-on-surface-variant font-ui-label text-ui-label">Welcome back, monitor your digital publication
                performance.</p>
        </div>
        <div
            class="flex items-center gap-2 bg-surface-container-low border border-outline-variant px-4 py-2 rounded-lg cursor-pointer hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-on-surface-variant text-[20px]">calendar_today</span>
            <span class="font-ui-label text-ui-label text-on-surface">Last 30 Days</span>
            <span class="material-symbols-outlined text-on-surface-variant text-[20px]">expand_more</span>
        </div>
    </section>
    <!-- Quick Stats Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Stat Card 1 -->
        <div
            class="bg-white border border-outline-variant rounded-xl p-6 flex flex-col justify-between hover:shadow-[0_20px_30px_rgba(0,0,0,0.05)] transition-all">
            <div>
                <span class="text-on-surface-variant font-ui-label text-ui-label uppercase tracking-wider">Total Views</span>
                <div class="text-headline-md font-headline-md mt-2">42.5k</div>
            </div>
            <div class="flex items-center gap-1 mt-4 text-primary font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">trending_up</span>
                <span>+12% vs last month</span>
            </div>
        </div>
        <!-- Stat Card 2 -->
        <div
            class="bg-white border border-outline-variant rounded-xl p-6 flex flex-col justify-between hover:shadow-[0_20px_30px_rgba(0,0,0,0.05)] transition-all">
            <div>
                <span class="text-on-surface-variant font-ui-label text-ui-label uppercase tracking-wider">Average Read
                    Time</span>
                <div class="text-headline-md font-headline-md mt-2">4m 12s</div>
            </div>
            <div class="flex items-center gap-1 mt-4 text-on-surface-variant font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">timer</span>
                <span>Stable engagement</span>
            </div>
        </div>
        <!-- Stat Card 3 -->
        <div
            class="bg-white border border-outline-variant rounded-xl p-6 flex flex-col justify-between hover:shadow-[0_20px_30px_rgba(0,0,0,0.05)] transition-all">
            <div>
                <span class="text-on-surface-variant font-ui-label text-ui-label uppercase tracking-wider">Subscriber
                    Growth</span>
                <div class="text-headline-md font-headline-md mt-2">+842</div>
            </div>
            <div class="flex items-center gap-1 mt-4 text-primary font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">person_add</span>
                <span>Significant spike</span>
            </div>
        </div>
        <!-- Stat Card 4 -->
        <div
            class="bg-white border border-outline-variant rounded-xl p-6 flex flex-col justify-between hover:shadow-[0_20px_30px_rgba(0,0,0,0.05)] transition-all">
            <div>
                <span class="text-on-surface-variant font-ui-label text-ui-label uppercase tracking-wider">Total
                    Earnings</span>
                <div class="text-headline-md font-headline-md mt-2">$1,240.00</div>
            </div>
            <div class="flex items-center gap-1 mt-4 text-primary font-ui-label text-ui-label">
                <span class="material-symbols-outlined text-[18px]">payments</span>
                <span>Payout scheduled</span>
            </div>
        </div>
    </section>
    <!-- Main Analytics View -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <!-- Audience Growth Chart -->
        <div class="lg:col-span-2 bg-white border border-outline-variant rounded-xl p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="font-headline-md text-[24px] text-on-surface">Audience Growth</h2>
                <div class="flex gap-4">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-primary-container"></span>
                        <span class="text-ui-label font-ui-label text-on-surface-variant">Views</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-outline"></span>
                        <span class="text-ui-label font-ui-label text-on-surface-variant">Followers</span>
                    </div>
                </div>
            </div>
            <!-- Stylized Mock Chart -->
            <div class="h-[300px] w-full relative">
                <div class="absolute inset-0 flex items-end gap-2 px-2">
                    <div class="flex-1 bg-surface-container-high rounded-t h-[30%] opacity-40"></div>
                    <div class="flex-1 bg-primary-container rounded-t h-[45%]"></div>
                    <div class="flex-1 bg-surface-container-high rounded-t h-[25%] opacity-40"></div>
                    <div class="flex-1 bg-primary-container rounded-t h-[60%]"></div>
                    <div class="flex-1 bg-surface-container-high rounded-t h-[40%] opacity-40"></div>
                    <div class="flex-1 bg-primary-container rounded-t h-[85%]"></div>
                    <div class="flex-1 bg-surface-container-high rounded-t h-[55%] opacity-40"></div>
                    <div class="flex-1 bg-primary-container rounded-t h-[70%]"></div>
                    <div class="flex-1 bg-surface-container-high rounded-t h-[35%] opacity-40"></div>
                    <div class="flex-1 bg-primary-container rounded-t h-[95%]"></div>
                    <div class="flex-1 bg-surface-container-high rounded-t h-[65%] opacity-40"></div>
                    <div class="flex-1 bg-primary-container rounded-t h-[80%]"></div>
                </div>
                <div class="absolute bottom-0 w-full border-b border-outline-variant"></div>
            </div>
            <div class="flex justify-between mt-4 text-metadata font-metadata text-on-surface-variant px-2">
                <span>Week 1</span>
                <span>Week 2</span>
                <span>Week 3</span>
                <span>Week 4</span>
            </div>
        </div>
        <!-- Insights / Secondary Column -->
        <div class="bg-white border border-outline-variant rounded-xl p-8 flex flex-col gap-6">
            <h2 class="font-headline-md text-[24px] text-on-surface">Top Tags</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span
                        class="bg-surface-container px-3 py-1 rounded text-ui-label font-ui-label text-on-surface-variant">#WebDev</span>
                    <span class="font-ui-label text-on-surface font-bold">12.4k views</span>
                </div>
                <div class="flex justify-between items-center">
                    <span
                        class="bg-surface-container px-3 py-1 rounded text-ui-label font-ui-label text-on-surface-variant">#Minimalism</span>
                    <span class="font-ui-label text-on-surface font-bold">8.2k views</span>
                </div>
                <div class="flex justify-between items-center">
                    <span
                        class="bg-surface-container px-3 py-1 rounded text-ui-label font-ui-label text-on-surface-variant">#Philosophy</span>
                    <span class="font-ui-label text-on-surface font-bold">4.1k views</span>
                </div>
            </div>
            <div class="mt-auto p-4 bg-primary-container rounded-lg text-on-primary">
                <div class="font-bold mb-1">Growth Pro-Tip</div>
                <p class="text-sm opacity-90 leading-relaxed">Posts with 'High-Contrast' visuals are performing 40% better
                    this month. Consider adding more editorial photography.</p>
            </div>
        </div>
    </div>
    <!-- Post Performance Section -->
    <section class="bg-white border border-outline-variant rounded-xl overflow-hidden mb-section-gap">
        <div class="px-8 py-6 border-b border-outline-variant flex justify-between items-center">
            <h2 class="font-headline-md text-[24px] text-on-surface">Post Performance</h2>
            <button class="text-primary font-ui-label text-ui-label hover:underline">View All Posts</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead
                    class="bg-surface-container-low text-on-surface-variant font-ui-label text-ui-label uppercase tracking-tight">
                    <tr>
                        <th class="px-8 py-4 font-semibold">Post Title</th>
                        <th class="px-6 py-4 font-semibold">Published</th>
                        <th class="px-6 py-4 font-semibold">Views</th>
                        <th class="px-6 py-4 font-semibold">Read Ratio</th>
                        <th class="px-6 py-4 font-semibold">Comments</th>
                        <th class="px-6 py-4 font-semibold">Earnings</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    <!-- Post 1 -->
                    <tr class="hover:bg-surface-container-lowest transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded overflow-hidden bg-surface-variant flex-shrink-0">
                                    <img class="w-full h-full object-cover"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6_sBht0ehQQN23LlLnq5eX08RRTvkPQM-NzKyX3D8p_Rrg7dDN1vEggukcU3CiMey_-hPyox6a6XF9haFOH7ABq1kgQq7nnsZ54ylxux2KqlnZhB1uthaunJpCgwjmRm0bbdZBF2AOJdZovHajFWnB4isVlObWIY42ev7vzsBPbXXAsf1cBX4_H63l9sGbIerjnN_vOyzrqJSrxIkGlQsWowa1eHXaiV0ky9uLibvGPUEYFXorwODOV9GDQTSan4J4W-54k3pVtou" />
                                </div>
                                <span class="font-headline-md text-body-md text-on-surface block max-w-[280px] truncate">The
                                    Art of Digital Silence: Minimalism in 2024</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-metadata text-on-surface-variant">Oct 12, 2023</td>
                        <td class="px-6 py-6 font-ui-label text-on-surface">14,203</td>
                        <td class="px-6 py-6">
                            <div class="flex items-center gap-2">
                                <span class="font-ui-label text-on-surface">72%</span>
                                <div class="w-16 h-1.5 bg-surface-container-high rounded-full overflow-hidden">
                                    <div class="bg-primary-container h-full w-[72%]"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-ui-label text-on-surface">128</td>
                        <td class="px-6 py-6 font-bold text-on-surface">$412.50</td>
                    </tr>
                    <!-- Post 2 -->
                    <tr class="hover:bg-surface-container-lowest transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded overflow-hidden bg-surface-variant flex-shrink-0">
                                    <img class="w-full h-full object-cover"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAncGT_VdQfovZRqivZazwrunVOq4iPL1YjTw_sIQejzVzIZlx7sYRf56-Hy7odVOgGDcrOozlhQDG7ROP32tKdN98AHvQLCqhdn9y7TZStI8wuMXxtcYHoBxsNVJbMmIJj_Chi9Fd4IxPgT_oeZiRJM-60es2QZGFD1xMt3sd_SaAMOiKOBdv3DF-GeeYvoEFWNsmb38zLYOe0nMO-4W-BNr6uWIm4eKdSLyWMG0xM7FziTEmdzZwZu-wG7m-a2c7o3FPkGUgnj8Ro" />
                                </div>
                                <span
                                    class="font-headline-md text-body-md text-on-surface block max-w-[280px] truncate">Why
                                    Subscriptions are the Future of Independent Writing</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-metadata text-on-surface-variant">Oct 05, 2023</td>
                        <td class="px-6 py-6 font-ui-label text-on-surface">8,542</td>
                        <td class="px-6 py-6">
                            <div class="flex items-center gap-2">
                                <span class="font-ui-label text-on-surface">54%</span>
                                <div class="w-16 h-1.5 bg-surface-container-high rounded-full overflow-hidden">
                                    <div class="bg-primary-container h-full w-[54%]"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-ui-label text-on-surface">45</td>
                        <td class="px-6 py-6 font-bold text-on-surface">$228.10</td>
                    </tr>
                    <!-- Post 3 -->
                    <tr class="hover:bg-surface-container-lowest transition-colors">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded overflow-hidden bg-surface-variant flex-shrink-0">
                                    <img class="w-full h-full object-cover"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9lrrhQgmqmllNzss-PoaENprvfLd0vot-Zzscx0RTBaIZTAMmegHtIJpWtetwmsPdD9L-s8oYqf2Ntn-gncDA7KL984SLpTpoSfUij4LcNsRPlkpLN2lou2E5EshtRYyE5FJM_PzeBxUPHSPLwVXtXpXzr69Ioyx1TLN9Fgwk56fxV0sh1sB9RSlpKVdYiqumpdxLUBg_ssEuiI48X8JzuE8-pR-lCdcbn8Fy8QwdgS9e9YXL9xXigkZkK8TQ14c4DlZbbDXREBYv" />
                                </div>
                                <span
                                    class="font-headline-md text-body-md text-on-surface block max-w-[280px] truncate">Designing
                                    for Intellectual Clarity: A New Framework</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-metadata text-on-surface-variant">Sep 28, 2023</td>
                        <td class="px-6 py-6 font-ui-label text-on-surface">19,891</td>
                        <td class="px-6 py-6">
                            <div class="flex items-center gap-2">
                                <span class="font-ui-label text-on-surface">88%</span>
                                <div class="w-16 h-1.5 bg-surface-container-high rounded-full overflow-hidden">
                                    <div class="bg-primary-container h-full w-[88%]"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-ui-label text-on-surface">212</td>
                        <td class="px-6 py-6 font-bold text-on-surface">$599.40</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
