<?php

namespace App\Http\Requests;

use App\Enums\ArticleStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AutoSaveArticleRequest extends FormRequest
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
        $rules =  [
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'reading_time' => 'nullable|integer',
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => ['nullable', 'image', 'max:1024'],
            'status' => 'required|string|in:' . ArticleStatus::imploaded(),
        ];

        if ($this->routeIs('articles.autosave.new')) {
            $rules['slug'] = 'nullable|string|unique:articles,slug';
        } else {
            $rules['slug'] = 'nullable|string|unique:articles,slug,' . $this->route('article.id') . ',id';
        }

        return $rules;
    }
}
