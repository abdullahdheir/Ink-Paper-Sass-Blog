<?php

namespace App\Http\Requests;

use App\Enums\ArticleStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug,' . $this->route('article')->id . ',id',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'reading_time' => 'nullable|integer',
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => ['nullable', 'image', 'max:1024'],
            'status' => 'required|string|in:' . ArticleStatus::imploaded(),
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'scheduled_at' => 'required_if:status,' . ArticleStatus::SCHEDULED->value . '|nullable|date',
            'allow_comments' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'notify_subs' => 'nullable|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'required|string|max:155',
            'seo.title' => 'nullable|string|max:255',
            'seo.description' => 'nullable|string|max:255',
            'seo.keywords' => 'nullable|string|max:255',
        ];
    }
}
