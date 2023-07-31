<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
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
            'name' => 'required|alpha_num',
            'body' => 'required|alpha_num',
            'price' => 'required|numeric',
            'old_price' => 'sometimes|nullable|numeric',
            'salon' => 'sometimes|nullable|alpha_num',
            'kpp' => 'sometimes|nullable|alpha_num',
            'year' => 'sometimes|nullable|numeric|gte:0',
            'color' => 'sometimes|nullable|alpha_num',
            'is_new' => 'sometimes|nullable|accepted',
            'engine_id' => 'required|numeric',
            'carcase_id' => 'required|numeric',
            'class_id' => 'required|numeric',
        ];
    }
}
