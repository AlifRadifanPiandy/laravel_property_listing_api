<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'address' => ['required', 'string', 'unique:properties'],
            'listing_type' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:5'],
            'description' => ['required'],
            'build_year' => ['required', 'numeric', 'digits:4'],
            'price' => ['required', 'numeric'],
            'bedrooms' => ['required', 'numeric'],
            'bathrooms' => ['required', 'numeric'],
            'sqft' => ['required', 'numeric'],
            'price_sqft' => ['required', 'numeric'],
            'property_type' => ['required'],
            'property_status' => ['required']
        ];
    }
}
