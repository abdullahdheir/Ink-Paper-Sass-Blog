<?php

namespace App\Http\Requests;

use App\Rules\ArticlePublishedRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'article_id' => ['required', 'integer', new ArticlePublishedRule()],
            'body' => 'required|string',
            'comment_id' => 'nullable|integer|exists:users,id,deleted_at,NULL',
        ];
    }
}
