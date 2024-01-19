<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => ['sometimes', 'string', 'unique:properties'],
            'listing_type' => ['sometimes'],
            'city' => ['sometimes', 'string', 'max:255'],
            'zip_code' => ['sometimes', 'string', 'max:5'],
            'description' => ['sometimes'],
            'build_year' => ['sometimes', 'numeric', 'digits:4'],
            'price' => ['sometimes', 'numeric'],
            'bedrooms' => ['sometimes', 'numeric'],
            'bathrooms' => ['sometimes', 'numeric'],
            'sqft' => ['sometimes', 'numeric'],
            'price_sqft' => ['sometimes', 'numeric'],
            'property_type' => ['sometimes'],
            'property_status' => ['sometimes']
        ];
    }
}
