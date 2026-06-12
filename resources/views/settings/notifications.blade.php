@extends('layouts.settings')

@section('title', 'Notification Settings - Ink & Paper')

@section('settings-content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-surface border border-outline-variant rounded-2xl p-6">
            <h1 class="font-headline-md text-headline-md text-on-surface mb-1">Notifications</h1>
            <p class="font-body-md text-body-md text-secondary">Manage how and when you receive updates from authors and the
                platform.</p>
        </div>

        <form class="space-y-6">
            @csrf

            <!-- Email Notifications -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-5 pb-4 border-b border-outline-variant">
                    <div class="w-9 h-9 rounded-xl bg-primary-container/15 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-[20px]"
                            style="font-variation-settings: 'FILL' 1;">mail</span>
                    </div>
                    <div>
                        <h2 class="font-ui-label text-ui-label font-bold text-on-surface">Email Notifications</h2>
                        <p class="font-metadata text-metadata text-secondary">Sent to {{ auth()->user()->email }}</p>
                    </div>
                </div>

                <div class="divide-y divide-outline-variant">
                    @php
                        $emailItems = [
                            [
                                'label' => 'New articles from followed authors',
                                'desc' => 'Get notified immediately when your favorite writers publish.',
                                'checked' => true,
                            ],
                            [
                                'label' => 'Weekly digest',
                                'desc' => 'A curated summary of the best stories from the past week.',
                                'checked' => true,
                            ],
                            [
                                'label' => 'New followers',
                                'desc' => 'Know as soon as someone follows your work.',
                                'checked' => false,
                            ],
                            [
                                'label' => 'Mentions in comments',
                                'desc' => 'When someone tags you in a discussion.',
                                'checked' => true,
                            ],
                        ];
                    @endphp

                    @foreach ($emailItems as $item)
                        <div class="flex items-center justify-between py-4 first:pt-0 last:pb-0">
                            <div>
                                <p class="font-ui-label text-ui-label font-semibold text-on-surface">{{ $item['label'] }}
                                </p>
                                <p class="font-metadata text-metadata text-secondary mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-6">
                                <input type="checkbox" class="sr-only peer" {{ $item['checked'] ? 'checked' : '' }} />
                                <div
                                    class="w-11 h-6 bg-surface-container-highest rounded-full peer
                            peer-checked:bg-primary
                            after:content-[''] after:absolute after:top-[2px] after:start-[2px]
                            after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all
                            peer-checked:after:translate-x-full peer-focus:ring-2 peer-focus:ring-primary/30">
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Push Notifications -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-5 pb-4 border-b border-outline-variant">
                    <div class="w-9 h-9 rounded-xl bg-primary-container/15 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-[20px]"
                            style="font-variation-settings: 'FILL' 1;">phonelink_ring</span>
                    </div>
                    <div>
                        <h2 class="font-ui-label text-ui-label font-bold text-on-surface">Push Notifications</h2>
                        <p class="font-metadata text-metadata text-secondary">Real-time alerts on your devices</p>
                    </div>
                </div>

                <div class="divide-y divide-outline-variant">
                    @php
                        $pushItems = [
                            [
                                'label' => 'Activity on my articles',
                                'desc' => 'Likes, highlights, and comments on your published work.',
                                'checked' => true,
                            ],
                            [
                                'label' => 'Direct messages',
                                'desc' => 'Instant alerts for private conversations.',
                                'checked' => true,
                            ],
                        ];
                    @endphp

                    @foreach ($pushItems as $item)
                        <div class="flex items-center justify-between py-4 first:pt-0 last:pb-0">
                            <div>
                                <p class="font-ui-label text-ui-label font-semibold text-on-surface">{{ $item['label'] }}
                                </p>
                                <p class="font-metadata text-metadata text-secondary mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-6">
                                <input type="checkbox" class="sr-only peer" {{ $item['checked'] ? 'checked' : '' }} />
                                <div
                                    class="w-11 h-6 bg-surface-container-highest rounded-full peer
                            peer-checked:bg-primary
                            after:content-[''] after:absolute after:top-[2px] after:start-[2px]
                            after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all
                            peer-checked:after:translate-x-full peer-focus:ring-2 peer-focus:ring-primary/30">
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Marketing -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-5 pb-4 border-b border-outline-variant">
                    <div class="w-9 h-9 rounded-xl bg-primary-container/15 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-[20px]"
                            style="font-variation-settings: 'FILL' 1;">campaign</span>
                    </div>
                    <div>
                        <h2 class="font-ui-label text-ui-label font-bold text-on-surface">Marketing &amp; Updates</h2>
                        <p class="font-metadata text-metadata text-secondary">Product news and special offers</p>
                    </div>
                </div>

                <div class="divide-y divide-outline-variant">
                    @php
                        $marketingItems = [
                            [
                                'label' => 'Platform updates',
                                'desc' => 'Major new feature releases and community announcements.',
                                'checked' => false,
                            ],
                            [
                                'label' => 'Special offers',
                                'desc' => 'Discounts on premium memberships and workshop access.',
                                'checked' => false,
                            ],
                        ];
                    @endphp

                    @foreach ($marketingItems as $item)
                        <div class="flex items-center justify-between py-4 first:pt-0 last:pb-0">
                            <div>
                                <p class="font-ui-label text-ui-label font-semibold text-on-surface">{{ $item['label'] }}
                                </p>
                                <p class="font-metadata text-metadata text-secondary mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-6">
                                <input type="checkbox" class="sr-only peer" {{ $item['checked'] ? 'checked' : '' }} />
                                <div
                                    class="w-11 h-6 bg-surface-container-highest rounded-full peer
                            peer-checked:bg-primary
                            after:content-[''] after:absolute after:top-[2px] after:start-[2px]
                            after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all
                            peer-checked:after:translate-x-full peer-focus:ring-2 peer-focus:ring-primary/30">
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3">
                <button type="button"
                    class="px-6 py-3 border border-outline-variant font-ui-button text-ui-button rounded-xl hover:bg-surface-container transition-all text-on-surface">
                    Discard Changes
                </button>
                <button type="submit"
                    class="px-6 py-3 bg-primary-container text-on-primary font-ui-button text-ui-button rounded-xl hover:opacity-90 active:scale-95 transition-all shadow-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Save Preferences
                </button>
            </div>
        </form>
    </div>
@endsection
