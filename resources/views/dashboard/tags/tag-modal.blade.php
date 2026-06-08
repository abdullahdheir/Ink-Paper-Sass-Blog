<!-- Tag Modal -->
<div x-data="{ open: false, mode: 'create', tag: null }" @keydown.escape.window="open = false" class="relative z-50">
    <!-- Backdrop -->
    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm" aria-hidden="true" @click="open = false"></div>

    <!-- Modal -->
    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 flex items-center justify-center p-4">

        <div @click.stop
            class="relative bg-surface-container-lowest w-full max-w-md border border-outline-variant/30 rounded-xl custom-shadow overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-5 border-b border-outline-variant/20 flex justify-between items-center">
                <h2 class="font-headline-md text-xl text-on-surface"
                    x-text="mode === 'create' ? 'Create New Tag' : 'Edit Tag'"></h2>
                <button @click="open = false" aria-label="Close"
                    class="p-1 hover:bg-surface-container rounded-full transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant">close</span>
                </button>
            </div>

            <!-- Form Content -->
            <form method="POST" :action="mode === 'create' ? route('tags.store') : route('tags.update', tag?.id)"
                class="p-6 space-y-6">
                @csrf
                @if ($mode === 'edit')
                    @method('PUT')
                @endif

                <!-- Tag Name Input -->
                <div class="space-y-2">
                    <label class="font-ui-label text-ui-label text-on-surface-variant flex justify-between"
                        for="tag-name">
                        <span>Tag Name</span>
                        <span class="text-metadata opacity-60">Required</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-outline font-medium">#</span>
                        <input
                            class="w-full pl-8 pr-4 py-3 bg-surface border border-outline-variant/50 rounded-lg focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-on-surface font-ui-label"
                            id="tag-name" name="name" type="text" required :value="tag?.name || ''"
                            placeholder="AI" />
                    </div>
                </div>

                <!-- Slug Input -->
                <div class="space-y-2">
                    <label class="font-ui-label text-ui-label text-on-surface-variant" for="tag-slug">
                        URL Slug
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-outline font-medium">/</span>
                        <input
                            class="w-full pl-8 pr-4 py-3 bg-surface border border-outline-variant/50 rounded-lg focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-on-surface font-ui-label"
                            id="tag-slug" name="slug" type="text" required :value="tag?.slug || ''"
                            placeholder="ai" />
                    </div>
                </div>

                <!-- Description TextArea -->
                <div class="space-y-2">
                    <label class="font-ui-label text-ui-label text-on-surface-variant" for="tag-description">
                        Description
                    </label>
                    <textarea
                        class="w-full px-4 py-3 bg-surface border border-outline-variant/50 rounded-lg focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-on-surface font-ui-label resize-none"
                        id="tag-description" name="description" rows="3" placeholder="Briefly describe the theme of this tag..."
                        x-text="tag?.description || ''"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="pt-4 flex gap-3">
                    <button type="button" @click="open = false"
                        class="flex-1 px-4 py-3 border border-on-background/20 text-on-surface font-ui-button text-ui-button rounded-lg hover:bg-surface-container transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 bg-primary-container text-on-primary font-ui-button text-ui-button rounded-lg hover:brightness-110 shadow-lg shadow-primary-container/20 transition-all">
                        <span x-text="mode === 'create' ? 'Add Tag' : 'Save Changes'"></span>
                    </button>
                </div>
            </form>

            <!-- Preview Tip -->
            <div class="bg-surface-container-low px-6 py-4 border-t border-outline-variant/20">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary-container"
                        style="font-variation-settings: 'opsz' 20;">info</span>
                    <p class="font-metadata text-metadata text-on-surface-variant">
                        Tags help <span class="font-medium text-on-surface">creators</span> organize intellectual
                        content and improve discovery in the digital quiet.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Global function to open tag modal
    window.openTagModal = function(mode = 'create', tag = null) {
        const modal = document.querySelector('[x-data*="open: false"]');
        if (modal) {
            const alpineData = Alpine.$data(modal);
            alpineData.open = true;
            alpineData.mode = mode;
            alpineData.tag = tag;
        }
    };
</script>
