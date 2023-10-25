<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_uuid' => ['string', 'required', Rule::exists('categories', 'id')],
            'name' => ['string', 'max:255', 'required', Rule::unique('categories', 'name')->ignore($this->category_uuid)],
            'description' => ['string', 'required'],
            'duration' => ['string', 'required'],
            'sector' => ['string', 'required'],
        ];
    }
}
