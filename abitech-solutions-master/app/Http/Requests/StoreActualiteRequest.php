<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActualiteRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'additional_information' => 'nullable|array',
            'photo1' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo2' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo3' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo4' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo5' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

           
        ];
    }
}
