@extends('layouts.dashboard')

@section('title', 'Create Tag - Ink & Paper')

@section('page-content')
<!-- Modal Backdrop -->
<div class="fixed inset-0 bg-on-background/10 backdrop-blur-sm z-40 transition-opacity"></div>
<!-- Create Tag Modal -->
<div class="relative bg-surface-container-lowest w-full max-w-md border border-outline-variant/30 rounded-xl custom-shadow z-50 overflow-hidden transform transition-all">
<!-- Header -->
<div class="px-6 py-5 border-b border-outline-variant/20 flex justify-between items-center">
<h2 class="font-headline-md text-xl text-on-surface">Create New Tag</h2>
<button aria-label="Close" class="p-1 hover:bg-surface-container rounded-full transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">close</span>
</button>
</div>
<!-- Form Content -->
<form class="p-6 space-y-6">
<!-- Tag Name Input -->
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant flex justify-between" for="tag-name">
<span>Tag Name</span>
<span class="text-metadata opacity-60">Required</span>
</label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 text-outline font-medium">#</span>
<input class="w-full pl-8 pr-4 py-3 bg-surface border border-outline-variant/50 rounded-lg focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-on-surface font-ui-label" id="tag-name" placeholder="AI" type="text"/>
</div>
</div>
<!-- Description TextArea -->
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant" for="tag-description">
                    Description
                </label>
<textarea class="w-full px-4 py-3 bg-surface border border-outline-variant/50 rounded-lg focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all text-on-surface font-ui-label resize-none" id="tag-description" placeholder="Briefly describe the theme of this tag..." rows="3"></textarea>
</div>
<!-- Featured Toggle -->
<div class="flex items-center justify-between py-2">
<div class="space-y-0.5">
<p class="font-ui-label text-ui-label text-on-surface">Featured Tag</p>
<p class="font-metadata text-metadata text-on-surface-variant">Promote this tag on the exploration feed</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" id="featured-toggle" type="checkbox" value=""/>
<div class="w-11 h-6 bg-secondary-container peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Action Buttons -->
<div class="pt-4 flex gap-3">
<button class="flex-1 px-4 py-3 border border-on-background/20 text-on-surface font-ui-button text-ui-button rounded-lg hover:bg-surface-container transition-colors" type="button">
                    Cancel
                </button>
<button class="flex-1 px-4 py-3 bg-primary-container text-on-primary font-ui-button text-ui-button rounded-lg hover:brightness-110 shadow-lg shadow-primary-container/20 transition-all" type="submit">
                    Add Tag
                </button>
</div>
</form>
<!-- Preview Tip -->
<div class="bg-surface-container-low px-6 py-4 border-t border-outline-variant/20">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary-container" style="font-variation-settings: 'opsz' 20;">info</span>
<p class="font-metadata text-metadata text-on-surface-variant">
                    Tags help <span class="font-medium text-on-surface">creators</span> organize intellectual content and improve discovery in the digital quiet.
                </p>
</div>
</div>
</div>
<script>
        // Simple Interaction: Close modal effect (simulation)
        document.querySelector('[aria-label="Close"]').addEventListener('click', () => {
            const modal = document.querySelector('.relative.bg-surface-container-lowest');
            const backdrop = document.querySelector('.fixed.inset-0');
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.95)';
            backdrop.style.opacity = '0';
            setTimeout(() => {
                modal.parentElement.style.display = 'none';
            }, 300);
        });

        // Form Submission visual feedback
        document.querySelector('form').addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalText = btn.innerText;
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin">progress_activity</span>';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = 'Success!';
                btn.classList.replace('bg-primary-container', 'bg-green-600');
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.classList.replace('bg-green-600', 'bg-primary-container');
                    btn.disabled = false;
                }, 2000);
            }, 1000);
        });
    </script>
@endsection
