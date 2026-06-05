@extends('layouts.dashboard')

@section('title', 'Create Category - Ink & Paper')

@section('page-content')
<div class="max-w-article-max mx-auto">
<!-- Header Section -->
<div class="mb-12">
<nav class="flex items-center gap-2 mb-4 text-on-surface-variant font-metadata text-metadata">
<a class="hover:text-primary" href="#">Dashboard</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary" href="#">Categories</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface">New Category</span>
</nav>
<h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-2">Create New Category</h1>
<p class="text-on-surface-variant font-body-md">Organize your content by creating a specialized focus area for your readers.</p>
</div>
<!-- Form Container -->
<div class="bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-8 shadow-sm">
<form class="space-y-8" onsubmit="event.preventDefault();">
<!-- Basic Info -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface" for="category-name">Category Name</label>
<input class="w-full px-4 py-3 bg-surface border border-outline-variant/50 rounded text-on-surface font-ui-label text-ui-label form-input-focus transition-all" id="category-name" oninput="document.getElementById('slug').value = this.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '')" placeholder="e.g. Architectural Theory" type="text"/>
</div>
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface" for="slug">Slug</label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 text-outline font-ui-label text-ui-label">ink-paper.com/</span>
<input class="w-full pl-32 pr-4 py-3 bg-surface border border-outline-variant/50 rounded text-on-surface font-ui-label text-ui-label form-input-focus transition-all" id="slug" placeholder="category-slug" type="text"/>
</div>
</div>
</div>
<!-- Description -->
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface" for="description">Description</label>
<textarea class="w-full px-4 py-3 bg-surface border border-outline-variant/50 rounded text-on-surface font-ui-label text-ui-label form-input-focus transition-all resize-none" id="description" placeholder="Briefly describe the topics covered in this category..." rows="4"></textarea>
</div>
<!-- Cover Image Upload -->
<div class="space-y-4">
<label class="font-ui-label text-ui-label text-on-surface">Cover Image (Optional)</label>
<div class="relative group cursor-pointer border-2 border-dashed border-outline-variant/50 rounded-xl p-8 hover:border-primary-container transition-colors bg-surface-container-low/30" onclick="document.getElementById('image-upload').click()">
<input accept="image/*" class="hidden" id="image-upload" onchange="previewImage(event)" type="file"/>
<div class="flex flex-col items-center justify-center text-center space-y-3" id="upload-placeholder">
<div class="w-12 h-12 rounded-full bg-primary-container/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">add_photo_alternate</span>
</div>
<div class="space-y-1">
<p class="font-ui-label text-ui-label text-on-surface">Click to upload or drag and drop</p>
<p class="font-metadata text-metadata text-on-surface-variant">SVG, PNG, JPG (max. 5MB) • Recommended size 1200x630px</p>
</div>
</div>
<div class="hidden relative aspect-video w-full rounded-lg overflow-hidden border border-outline-variant/30" id="image-preview-container">
<img class="w-full h-full object-cover" data-alt="A minimalist overhead view of a clean workspace with a single high-quality camera and aesthetic stationery on a textured light grey surface. The lighting is soft and directional, creating subtle editorial shadows. The color palette is monochromatic with deep charcoal accents, fitting a premium digital publishing platform aesthetic." id="image-preview-element" src=""/>
<button class="absolute top-4 right-4 bg-inverse-surface/80 text-on-tertiary p-2 rounded-full hover:bg-error transition-colors backdrop-blur-sm" onclick="removeImage(event)" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
</div>
</div>
<!-- Visibility Toggle (Extra Polish) -->
<div class="flex items-center justify-between p-4 bg-surface-container rounded-lg">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-on-surface-variant">visibility</span>
<div>
<p class="font-ui-label text-ui-label text-on-surface leading-tight">Public Category</p>
<p class="font-metadata text-metadata text-on-surface-variant">Visible to all readers and search engines</p>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox"/>
<div class="w-11 h-6 bg-secondary-container peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-container"></div>
</label>
</div>
<!-- Form Actions -->
<div class="pt-6 flex flex-col-reverse md:flex-row gap-4 border-t border-outline-variant/30">
<button class="w-full md:w-auto px-8 py-3 border border-on-surface rounded text-on-surface font-ui-button text-ui-button hover:bg-surface-container-high transition-colors" type="button">
                            Cancel
                        </button>
<button class="w-full md:flex-grow py-3 bg-primary-container text-on-primary-container rounded shadow-lg shadow-primary-container/20 font-ui-button text-ui-button hover:opacity-90 transition-all flex items-center justify-center gap-2" type="submit">
<span>Create Category</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</div>
</form>
</div>
</div>
@endsection
