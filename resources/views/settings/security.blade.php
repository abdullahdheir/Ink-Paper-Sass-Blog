@extends('layouts.settings')

@section('title', 'Security Settings - Ink & Paper')

@section('settings-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-surface border border-outline-variant rounded-2xl p-6">
        <h1 class="font-headline-md text-headline-md text-on-surface mb-1">Security</h1>
        <p class="font-body-md text-body-md text-secondary">Protect your account and monitor active sessions.</p>
    </div>

    <!-- Two-Factor Authentication -->
    <div class="bg-surface border border-outline-variant rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-2">
            <h2 class="font-headline-md text-[20px] font-bold text-on-surface">Two-Factor Authentication</h2>
            @if(auth()->user()->two_factor_confirmed_at)
                <span class="bg-primary text-on-primary text-metadata font-bold px-2.5 py-0.5 rounded-full text-[11px] uppercase tracking-wide">Active</span>
            @elseif(auth()->user()->two_factor_secret)
                <span class="bg-warning text-on-surface text-metadata font-bold px-2.5 py-0.5 rounded-full text-[11px] uppercase tracking-wide">Pending Setup</span>
            @else
                <span class="bg-surface-variant text-on-surface-variant text-metadata font-bold px-2.5 py-0.5 rounded-full text-[11px] uppercase tracking-wide">Off</span>
            @endif
        </div>
        <p class="font-body-md text-body-md text-secondary leading-relaxed mb-6">
            Add an extra layer of security by requiring a second verification step every time you sign in.
            We recommend using an authenticator app (Google Authenticator, Authy) for the best protection.
        </p>

        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="mb-4 flex items-center gap-2 text-primary font-ui-label text-ui-label bg-primary-container/10 border border-primary/20 rounded-xl px-4 py-3">
                <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                2FA enabled. Scan the QR code below to finish setup.
            </div>
        @endif

        @if(!auth()->user()->two_factor_secret)
            <form action="{{ url('auth/user/two-factor-authentication') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-primary-container text-on-primary px-6 py-3 rounded-xl font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">verified_user</span>
                    Enable Two-Factor Authentication
                </button>
            </form>
        @else
            @if(!auth()->user()->two_factor_confirmed_at)
                <div class="space-y-5">
                    <div>
                        <p class="font-ui-label text-ui-label text-on-surface font-medium mb-3">Scan this QR code with your authenticator app:</p>
                        <div class="inline-block bg-white p-4 rounded-xl border border-outline-variant">
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                    </div>
                    <form action="{{ url('auth/user/confirmed-two-factor-authentication') }}" method="POST" class="flex items-center gap-3">
                        @csrf
                        <input type="text" name="code" placeholder="Enter 6-digit code"
                            class="border border-outline-variant rounded-xl px-4 py-2.5 font-body-md focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none w-48" required>
                        <button type="submit"
                            class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-ui-button text-ui-button hover:opacity-90 transition-all">
                            Confirm & Activate
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-5">
                    <div class="p-5 bg-surface-container-low border border-outline-variant rounded-xl">
                        <p class="font-ui-label text-ui-label font-bold text-on-surface mb-3">Recovery Codes</p>
                        <p class="font-metadata text-metadata text-secondary mb-3">Store these codes somewhere safe. Each can only be used once.</p>
                        <div class="grid grid-cols-2 gap-1 font-mono text-sm text-on-surface">
                            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                                <div class="bg-surface px-3 py-1.5 rounded-lg border border-outline-variant">{{ $code }}</div>
                            @endforeach
                        </div>
                    </div>
                    <form action="{{ url('auth/user/two-factor-authentication') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-error/10 text-error border border-error/30 px-6 py-2.5 rounded-xl font-ui-button text-ui-button hover:bg-error hover:text-on-error transition-all active:scale-95">
                            Disable 2FA
                        </button>
                    </form>
                </div>
            @endif
        @endif
    </div>

    <!-- Active Sessions -->
    <div class="bg-surface border border-outline-variant rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-outline-variant flex items-center justify-between">
            <div>
                <h2 class="font-headline-md text-[20px] font-bold text-on-surface mb-1">Active Sessions</h2>
                <p class="font-metadata text-metadata text-secondary">Currently signed-in devices. Revoke any you don't recognize.</p>
            </div>
            <button class="px-4 py-2 border border-outline-variant text-on-surface font-ui-button text-ui-button rounded-xl hover:bg-surface-container transition-all text-sm">
                Revoke All Others
            </button>
        </div>
        <div class="divide-y divide-outline-variant">
            <!-- Current Session -->
            <div class="flex items-center justify-between px-6 py-4 hover:bg-surface-container transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-xl bg-primary-container/15 flex items-center justify-center text-primary flex-shrink-0">
                        <span class="material-symbols-outlined">laptop_mac</span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="font-ui-label text-ui-label font-bold text-on-surface">MacBook Pro 14"</h3>
                            <span class="bg-primary text-on-primary text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wide">Current</span>
                        </div>
                        <p class="font-metadata text-metadata text-secondary">San Francisco, USA · Chrome 122</p>
                    </div>
                </div>
                <span class="font-metadata text-metadata text-secondary flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-primary inline-block"></span>
                    Active now
                </span>
            </div>
            <!-- Other sessions -->
            @foreach([['icon' => 'smartphone', 'name' => 'iPhone 15 Pro', 'location' => 'New York, USA · Mobile App', 'time' => '2 hours ago'], ['icon' => 'tablet', 'name' => 'iPad Air', 'location' => 'London, UK · Safari', 'time' => '3 days ago']] as $session)
            <div class="flex items-center justify-between px-6 py-4 hover:bg-surface-container transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant flex-shrink-0">
                        <span class="material-symbols-outlined">{{ $session['icon'] }}</span>
                    </div>
                    <div>
                        <h3 class="font-ui-label text-ui-label font-bold text-on-surface">{{ $session['name'] }}</h3>
                        <p class="font-metadata text-metadata text-secondary">{{ $session['location'] }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="font-metadata text-metadata text-secondary">{{ $session['time'] }}</span>
                    <button class="text-error hover:underline font-metadata text-metadata">Revoke</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Login History -->
    <div class="bg-surface border border-outline-variant rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-outline-variant">
            <h2 class="font-headline-md text-[20px] font-bold text-on-surface mb-1">Login History</h2>
            <p class="font-metadata text-metadata text-secondary">Recent sign-in activity on your account.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container-low">
                        <th class="px-6 py-3 font-metadata text-metadata text-secondary uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 font-metadata text-metadata text-secondary uppercase tracking-wider">IP Address</th>
                        <th class="px-6 py-3 font-metadata text-metadata text-secondary uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 font-metadata text-metadata text-secondary uppercase tracking-wider">Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    @foreach([['ip' => '192.168.1.1', 'loc' => 'San Francisco, US', 'time' => 'March 15, 2024 10:45 AM'], ['ip' => '24.156.32.90', 'loc' => 'New York, US', 'time' => 'March 14, 2024 08:22 PM'], ['ip' => '88.190.23.11', 'loc' => 'London, UK', 'time' => 'March 12, 2024 02:15 PM']] as $log)
                    <tr class="hover:bg-surface-container transition-colors">
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-1.5 text-primary font-ui-label text-ui-label">
                                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                Successful
                            </span>
                        </td>
                        <td class="px-6 py-4 font-mono text-sm text-on-surface-variant">{{ $log['ip'] }}</td>
                        <td class="px-6 py-4 font-ui-label text-ui-label text-on-surface-variant">{{ $log['loc'] }}</td>
                        <td class="px-6 py-4 font-metadata text-metadata text-secondary">{{ $log['time'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-5 flex justify-center border-t border-outline-variant">
            <button class="text-primary font-ui-label text-ui-label hover:underline transition-all">View all activity</button>
        </div>
    </div>
</div>
@endsection
