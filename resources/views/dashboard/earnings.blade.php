@extends('layouts.dashboard')

@section('title', 'Earnings - Ink & Paper')

@section('page-content')
<!-- Page Header -->
<div class="mb-12">
<h1 class="font-display-lg text-display-lg text-on-surface mb-2">Earnings &amp; Payouts</h1>
<p class="text-on-surface-variant font-ui-label">Manage your revenue, track pending balances, and request payouts.</p>
</div>
<!-- Summary Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
<div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl shadow-sm">
<p class="text-on-surface-variant font-ui-label mb-1">Available for Payout</p>
<h2 class="font-display-lg text-display-lg text-primary mb-6">$4,280.50</h2>
<button class="w-full bg-primary-container text-on-primary-container py-4 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all shadow-md">
                    Request Payout
                </button>
</div>
<div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
<p class="text-on-surface-variant font-ui-label mb-1">Pending Earnings</p>
<h2 class="font-headline-md text-headline-md text-on-surface mb-2">@section('page-content'),120.00</h2>
<p class="text-metadata text-metadata text-secondary">Expected clearance: Aug 24, 2024</p>
<div class="mt-8 pt-8 border-t border-outline-variant">
<div class="flex items-center justify-between">
<span class="text-ui-label font-ui-label text-on-surface-variant">Last Payout</span>
<span class="text-ui-label font-ui-label text-on-surface">
<div class="text-center py-20">
<h1 class="font-headline-md text-headline-md text-on-surface mb-4">Earnings</h1>
<p class="text-on-surface-variant">This page is under construction. Full template coming soon.</p>
</div>
,450.00</span>
</div>
</div>
</div>
<div class="bg-surface-container-lowest border border-outline-variant p-8 rounded-xl">
<p class="text-on-surface-variant font-ui-label mb-1">Total Lifetime Earnings</p>
<h2 class="font-headline-md text-headline-md text-on-surface mb-2">$52,940.00</h2>
<p class="text-metadata text-metadata text-secondary">Since joining in January 2023</p>
<div class="mt-8 pt-8 border-t border-outline-variant">
<div class="flex items-center justify-between">
<span class="text-ui-label font-ui-label text-on-surface-variant">Average Monthly</span>
<span class="text-ui-label font-ui-label text-on-surface">@endsection,114.00</span>
</div>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12">
<!-- Left Column: Chart and History -->
<div class="lg:col-span-8 space-y-8">
<!-- Earnings Overview Chart Section -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl">
<div class="flex items-center justify-between mb-8">
<h3 class="font-headline-md text-headline-md text-[24px]">Earnings Overview</h3>
<div class="flex gap-2">
<button class="px-3 py-1 text-ui-label font-ui-label border border-outline-variant rounded-full hover:bg-surface-container-high">3M</button>
<button class="px-3 py-1 text-ui-label font-ui-label bg-on-surface text-surface rounded-full">6M</button>
<button class="px-3 py-1 text-ui-label font-ui-label border border-outline-variant rounded-full hover:bg-surface-container-high">1Y</button>
</div>
</div>
<!-- Mock Chart Visualization -->
<div class="h-64 flex items-end justify-between gap-2 px-4">
<div class="flex-1 bg-surface-container-highest rounded-t-lg h-[40%] transition-all hover:bg-primary-container/40 relative group">
<span class="absolute -top-8 left-1/2 -translate-x-1/2 text-metadata opacity-0 group-hover:opacity-100">
<div class="text-center py-20">
<h1 class="font-headline-md text-headline-md text-on-surface mb-4">Earnings</h1>
<p class="text-on-surface-variant">This page is under construction. Full template coming soon.</p>
</div>
.1k</span>
</div>
<div class="flex-1 bg-surface-container-highest rounded-t-lg h-[65%] transition-all hover:bg-primary-container/40 relative group">
<span class="absolute -top-8 left-1/2 -translate-x-1/2 text-metadata opacity-0 group-hover:opacity-100">@endsection.4k</span>
</div>
<div class="flex-1 bg-surface-container-highest rounded-t-lg h-[55%] transition-all hover:bg-primary-container/40 relative group">
<span class="absolute -top-8 left-1/2 -translate-x-1/2 text-metadata opacity-0 group-hover:opacity-100">
<div class="text-center py-20">
<h1 class="font-headline-md text-headline-md text-on-surface mb-4">Earnings</h1>
<p class="text-on-surface-variant">This page is under construction. Full template coming soon.</p>
</div>
.9k</span>
</div>
<div class="flex-1 bg-primary-container rounded-t-lg h-[90%] transition-all hover:opacity-90 relative group">
<span class="absolute -top-8 left-1/2 -translate-x-1/2 text-metadata opacity-0 group-hover:opacity-100 font-bold">$4.8k</span>
</div>
<div class="flex-1 bg-surface-container-highest rounded-t-lg h-[75%] transition-all hover:bg-primary-container/40 relative group">
<span class="absolute -top-8 left-1/2 -translate-x-1/2 text-metadata opacity-0 group-hover:opacity-100">@endsection.9k</span>
</div>
<div class="flex-1 bg-surface-container-highest rounded-t-lg h-[82%] transition-all hover:bg-primary-container/40 relative group">
<span class="absolute -top-8 left-1/2 -translate-x-1/2 text-metadata opacity-0 group-hover:opacity-100">$4.3k</span>
</div>
</div>
<div class="flex justify-between mt-4 px-4 text-metadata text-secondary">
<span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span>
</div>
</div>
<!-- Payout History Table -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden">
<div class="p-6 border-b border-outline-variant flex items-center justify-between">
<h3 class="font-headline-md text-headline-md text-[24px]">Payout History</h3>
<button class="text-primary font-ui-label hover:underline">View All</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container border-b border-outline-variant">
<tr>
<th class="px-6 py-4 font-ui-label text-ui-label text-secondary">Date</th>
<th class="px-6 py-4 font-ui-label text-ui-label text-secondary">Amount</th>
<th class="px-6 py-4 font-ui-label text-ui-label text-secondary">Status</th>
<th class="px-6 py-4 font-ui-label text-ui-label text-secondary text-right">Receipt</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<tr class="hover:bg-surface transition-colors">
<td class="px-6 py-4 font-metadata text-on-surface">Aug 12, 2024</td>
<td class="px-6 py-4 font-ui-label text-on-surface">
<div class="text-center py-20">
<h1 class="font-headline-md text-headline-md text-on-surface mb-4">Earnings</h1>
<p class="text-on-surface-variant">This page is under construction. Full template coming soon.</p>
</div>
,450.00</td>
<td class="px-6 py-4 font-metadata">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Paid</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary hover:opacity-70"><span class="material-symbols-outlined" data-icon="download">download</span></button>
</td>
</tr>
<tr class="hover:bg-surface transition-colors">
<td class="px-6 py-4 font-metadata text-on-surface">Jul 15, 2024</td>
<td class="px-6 py-4 font-ui-label text-on-surface">@endsection,120.50</td>
<td class="px-6 py-4 font-metadata">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Paid</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-primary hover:opacity-70"><span class="material-symbols-outlined" data-icon="download">download</span></button>
</td>
</tr>
<tr class="hover:bg-surface transition-colors">
<td class="px-6 py-4 font-metadata text-on-surface">Jun 10, 2024</td>
<td class="px-6 py-4 font-ui-label text-on-surface">@section('page-content'),980.00</td>
<td class="px-6 py-4 font-metadata">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">Processing</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-outline cursor-not-allowed"><span class="material-symbols-outlined" data-icon="download">download</span></button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!-- Right Column: Payout Method and Details -->
<div class="lg:col-span-4 space-y-8">
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl">
<div class="flex items-center justify-between mb-6">
<h3 class="font-headline-md text-headline-md text-[20px]">Payout Method</h3>
<button class="text-primary font-ui-label hover:underline">Edit</button>
</div>
<div class="flex items-center gap-4 p-4 border border-outline-variant rounded-lg bg-surface mb-6">
<div class="w-12 h-12 bg-white rounded flex items-center justify-center shadow-sm border border-outline-variant">
<span class="material-symbols-outlined text-primary" data-icon="account_balance">account_balance</span>
</div>
<div>
<p class="font-ui-label text-on-surface">Chase Bank</p>
<p class="text-metadata text-secondary">Ending in •••• 9012</p>
</div>
</div>
<div class="space-y-4">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-green-600 text-sm" data-icon="check_circle">check_circle</span>
<div>
<p class="font-ui-label text-xs uppercase tracking-wider text-secondary">Status</p>
<p class="text-on-surface text-ui-label">Verified &amp; Active</p>
</div>
</div>
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-sm" data-icon="speed">speed</span>
<div>
<p class="font-ui-label text-xs uppercase tracking-wider text-secondary">Estimated Arrival</p>
<p class="text-on-surface text-ui-label">2-3 Business Days</p>
</div>
</div>
</div>
</div>
<div class="bg-primary text-on-primary p-6 rounded-xl relative overflow-hidden group">
<div class="relative z-10">
<h4 class="font-headline-md text-[20px] mb-2">Automate Payouts</h4>
<p class="text-sm opacity-90 mb-4">Enable smart payouts to automatically receive funds when your balance exceeds $500.</p>
<button class="bg-white text-primary px-4 py-2 rounded-lg font-ui-label text-sm hover:bg-opacity-90 transition-all">Configure</button>
</div>
<!-- Subtle background graphic for editorial feel -->
<div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform duration-500">
<span class="material-symbols-outlined text-[120px]" data-icon="auto_awesome">auto_awesome</span>
</div>
</div>
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl">
<h3 class="font-headline-md text-[20px] mb-4">Tax Documents</h3>
<div class="space-y-3">
<a class="flex items-center justify-between p-3 rounded-lg hover:bg-surface transition-colors border border-transparent hover:border-outline-variant" href="#">
<span class="text-ui-label">2023 Form 1099-K</span>
<span class="material-symbols-outlined text-secondary" data-icon="open_in_new">open_in_new</span>
</a>
<a class="flex items-center justify-between p-3 rounded-lg hover:bg-surface transition-colors border border-transparent hover:border-outline-variant" href="#">
<span class="text-ui-label">Income Summary Report</span>
<span class="material-symbols-outlined text-secondary" data-icon="open_in_new">open_in_new</span>
</a>
</div>
</div>
</div>
</div>
@endsection
