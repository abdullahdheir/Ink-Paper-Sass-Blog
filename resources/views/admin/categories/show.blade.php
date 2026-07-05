@extends('layouts.admin')

@section('title', 'Show Category - Ink & Paper')

@section('page-content')
    <!-- Main Content -->
    <div class="max-w-article-max mx-auto">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Category Details</h1>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-800">Back to
                    Categories</a>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="mb-4">
                    <span class="text-gray-500 text-sm">ID</span>
                    <p class="text-gray-900 font-semibold">{{ $category->id }}</p>
                </div>

                <div class="mb-4">
                    <span class="text-gray-500 text-sm">Name</span>
                    <p class="text-gray-900 font-semibold">{{ $category->name }}</p>
                </div>

                <div class="mb-4">
                    <span class="text-gray-500 text-sm">Description</span>
                    <p class="text-gray-900">{{ $category->description ?? 'No description' }}</p>
                </div>

                <div class="mb-4">
                    <span class="text-gray-500 text-sm">Created At</span>
                    <p class="text-gray-900">{{ $category->created_at->format('M d, Y H:i') }}</p>
                </div>

                <div class="mb-4">
                    <span class="text-gray-500 text-sm">Updated At</span>
                    <p class="text-gray-900">{{ $category->updated_at->format('M d, Y H:i') }}</p>
                </div>

                <div class="mt-6 pt-6 border-t">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-3 transition duration-200">
                        Edit
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-200"
                            onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
