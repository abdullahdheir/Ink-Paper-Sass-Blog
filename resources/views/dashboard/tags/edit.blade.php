@extends('layouts.dashboard')

@section('title', 'Edit Tag - Ink & Paper')

@section('page-content')
<!-- Header Section -->
<div class="flex items-center justify-between mb-8">
<div class="flex items-center gap-2 text-primary font-ui-label text-ui-label">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
<a class="hover:underline" href="{{ route('manage.tags') }}">Back to Tags</a>
</div>
</div>

<!-- Edit Tag Form -->
<div class="max-w-2xl mx-auto">
<div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-8">
<h1 class="font-headline-md text-headline-md text-on-surface mb-6">Edit Tag: {{ $tag->name }}</h1>

<form action="{{ route('tags.update', $tag->id) }}" method="POST" class="space-y-6">
@csrf
@method('PUT')

@if($errors->any())
<div class="bg-error-container border border-error text-on-error-container px-4 py-3 rounded mb-4">
<ul class="list-disc list-inside">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<!-- Name Field -->
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant block" for="name">Tag Name</label>
<input class="w-full bg-white border border-outline-variant px-4 py-3 rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-ui-label transition-all" id="name" name="name" type="text" value="{{ old('name', $tag->name) }}" required>
</div>

<!-- Slug Field -->
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant block" for="slug">URL Slug</label>
<div class="flex">
<span class="bg-surface-container px-4 py-3 border border-r-0 border-outline-variant rounded-l-lg font-metadata text-on-surface-variant">inkpaper.com/tag/</span>
<input class="w-full bg-white border border-outline-variant px-4 py-3 rounded-r-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-ui-label transition-all" id="slug" name="slug" type="text" value="{{ old('slug', $tag->slug) }}" required>
</div>
</div>

<!-- Description Field -->
<div class="space-y-2">
<label class="font-ui-label text-ui-label text-on-surface-variant block" for="description">Description</label>
<textarea class="w-full bg-white border border-outline-variant px-4 py-3 rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary-container outline-none font-body-md transition-all" id="description" name="description" rows="4" placeholder="Brief description of this tag...">{{ old('description', $tag->description) }}</textarea>
</div>

<!-- Form Actions -->
<div class="flex items-center justify-between pt-4 border-t border-outline-variant">
<form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline">
@csrf
@method('DELETE')
<button type="submit" class="text-error font-ui-button flex items-center gap-2 hover:bg-error-container/20 px-4 py-2 rounded-lg transition-colors" onclick="return confirm('Are you sure you want to delete this tag?')">
<span class="material-symbols-outlined">delete</span>
Delete Tag
</button>
</form>
<div class="flex gap-4">
<a href="{{ route('manage.tags') }}" class="border border-on-surface text-on-surface px-6 py-2.5 rounded-lg font-ui-button hover:bg-surface-container transition-all">Cancel</a>
<button type="submit" class="bg-primary-container text-on-primary px-8 py-2.5 rounded-lg font-ui-button hover:bg-primary shadow-md transition-all">Save Changes</button>
</div>
</div>
</form>
</div>
</div>
@endsection
