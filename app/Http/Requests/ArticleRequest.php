<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|between:5,100',
            'description' => 'required|max:255',
            'body' => 'required',
            'image' => 'sometimes|nullable|image',
        ];
    }

    protected function prepareForValidation()
    {
        $publishedAt = $this->get('published_at');
        if (!strtotime($publishedAt)) {
            if (isset($publishedAt)) {
                $publishedAt = date('Y-m-d H:i:s');
            } else {
                $publishedAt = null;
            }
        }
        $this->merge(['published_at' => $publishedAt]);

        $this->merge(['slug' => Str::slug($this->get('title'))]);
    }
}
