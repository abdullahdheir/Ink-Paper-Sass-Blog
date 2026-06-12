@extends('layouts.settings')

@section('title', 'Profile Settings - Ink & Paper')

@section('settings-content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="bg-surface border border-outline-variant rounded-2xl p-6">
            <h1 class="font-headline-md text-headline-md text-on-surface mb-1">Public Profile</h1>
            <p class="font-body-md text-body-md text-secondary">Control how others see you on the Ink &amp; Paper platform.
            </p>
        </div>

        <!-- Profile Form -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if (session('status') === 'profile-updated')
                <div
                    class="mb-4 flex items-center gap-3 bg-primary-container/10 border border-primary/20 text-primary p-4 rounded-xl font-ui-label text-ui-label">
                    <span class="material-symbols-outlined text-[20px]"
                        style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Profile updated successfully.
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="mb-4 bg-error-container/20 border border-error/20 text-error p-4 rounded-xl font-ui-label text-ui-label">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Avatar Section -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6 mb-6">
                <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-4">Profile Photo</h2>
                <div class="flex items-center gap-6">
                    <div class="relative group flex-shrink-0">
                        <div
                            class="w-24 h-24 rounded-full overflow-hidden border-2 border-outline-variant bg-surface-container-low">
                            <img alt="Avatar" class="w-full h-full object-cover" id="avatar-preview"
                                src="{{ auth()->user()->avatar_path ? Storage::url(auth()->user()->avatar_path) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'U') . '&background=6750A4&color=fff&size=128' }}" />
                        </div>
                        <label for="avatar-input"
                            class="absolute inset-0 bg-on-surface/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center rounded-full cursor-pointer">
                            <span class="material-symbols-outlined text-white">photo_camera</span>
                        </label>
                        <input type="file" id="avatar-input" name="avatar" class="hidden" accept="image/*"
                            onchange="previewAvatar(event)" />
                    </div>
                    <div>
                        <label for="avatar-input"
                            class="inline-flex items-center gap-2 px-4 py-2 border border-outline font-ui-button text-ui-button rounded-lg hover:bg-surface-container transition-all cursor-pointer">
                            <span class="material-symbols-outlined text-[18px]">upload</span>
                            Upload New Photo
                        </label>
                        <p class="font-metadata text-metadata text-secondary mt-2">PNG or JPG. Max size 5MB.</p>
                    </div>
                </div>
            </div>

            <!-- Name & Username -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6 mb-6">
                <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-1.5">
                        <label class="font-ui-label text-ui-label text-on-surface-variant font-medium" for="name">Full
                            Name</label>
                        <input id="name" name="name" type="text"
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md text-body-md bg-surface @error('name') border-error @enderror"
                            value="{{ old('name', auth()->user()->name) }}" />
                        @error('name')
                            <p class="text-error font-metadata text-metadata">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="font-ui-label text-ui-label text-on-surface-variant font-medium"
                            for="username">Username</label>
                        <div class="relative">
                            <span
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-secondary font-body-md select-none">@</span>
                            <input id="username" name="username" type="text"
                                class="w-full border border-outline-variant rounded-xl pl-8 pr-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md text-body-md bg-surface @error('username') border-error @enderror"
                                value="{{ old('username', auth()->user()->username) }}" />
                        </div>
                        @error('username')
                            <p class="text-error font-metadata text-metadata">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Bio -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6 mb-6">
                <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-4">Bio</h2>
                <div class="flex flex-col gap-1.5">
                    <textarea id="bio" name="bio" rows="4"
                        class="w-full border border-outline-variant rounded-xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md text-body-md bg-surface resize-none"
                        maxlength="500" placeholder="Tell the world a little bit about yourself...">{{ old('bio', auth()->user()->bio) }}</textarea>
                    <p class="font-metadata text-metadata text-secondary text-right" id="bio-count">
                        <span id="bio-len">{{ strlen(auth()->user()->bio ?? '') }}</span> / 500 characters
                    </p>
                </div>
            </div>

            <!-- Social Links -->
            <div class="bg-surface border border-outline-variant rounded-2xl p-6 mb-6">
                <h2 class="font-ui-label text-ui-label font-bold text-on-surface mb-4">Social Links</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-xl bg-surface-container-low flex-shrink-0">
                            <span class="material-symbols-outlined text-secondary">language</span>
                        </div>
                        <input id="website" name="website" type="url"
                            class="flex-grow border border-outline-variant rounded-xl px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md text-body-md bg-surface"
                            placeholder="https://yourwebsite.com" value="{{ old('website', auth()->user()->website) }}" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 flex items-center justify-center border border-outline-variant rounded-xl bg-surface-container-low flex-shrink-0">
                            <span class="material-symbols-outlined text-secondary">alternate_email</span>
                        </div>
                        <input id="twitter" name="twitter" type="url"
                            class="flex-grow border border-outline-variant rounded-xl px-4 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none font-body-md text-body-md bg-surface"
                            placeholder="https://twitter.com/yourhandle"
                            value="{{ old('twitter', auth()->user()->twitter) }}" />
                    </div>
                </div>
            </div>

            <!-- Bento Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                <div class="p-5 bg-surface-container rounded-xl border border-outline-variant flex gap-4">
                    <span class="material-symbols-outlined text-primary mt-0.5 flex-shrink-0"
                        style="font-variation-settings: 'FILL' 1;">visibility</span>
                    <div>
                        <h4 class="font-ui-label text-ui-label font-bold mb-1">Visibility Settings</h4>
                        <p class="font-metadata text-metadata text-secondary">Your profile is <strong>public</strong> —
                            articles and bio are visible to everyone on the internet.</p>
                    </div>
                </div>
                <div class="p-5 bg-surface-container rounded-xl border border-outline-variant flex gap-4">
                    <span class="material-symbols-outlined text-primary mt-0.5 flex-shrink-0"
                        style="font-variation-settings: 'FILL' 1;">verified</span>
                    <div>
                        <h4 class="font-ui-label text-ui-label font-bold mb-1">Verified Author</h4>
                        <p class="font-metadata text-metadata text-secondary">Your verified badge appears next to your
                            username across all public feeds.</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('feed') }}"
                    class="px-6 py-3 border border-outline-variant font-ui-button text-ui-button rounded-xl hover:bg-surface-container transition-all">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-3 bg-primary-container text-on-primary font-ui-button text-ui-button rounded-xl hover:opacity-90 transition-all active:scale-95 shadow-sm shadow-primary/20 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('avatar-preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        const bioTextarea = document.getElementById('bio');
        const bioLen = document.getElementById('bio-len');
        if (bioTextarea) {
            bioTextarea.addEventListener('input', () => {
                bioLen.textContent = bioTextarea.value.length;
            });
        }
    </script>
@endsection
