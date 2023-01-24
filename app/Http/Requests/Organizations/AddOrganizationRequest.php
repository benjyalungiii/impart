<?php

namespace App\Http\Requests\Organizations;

use Illuminate\Foundation\Http\FormRequest;

class AddOrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "string|max:255",
            'address' => "string|max:255|nullable",
            'address_2' => "string|max:255|nullable",
            'city' => "string|max:255",
            'state' => "string|max:255",
            'postal_code' => "string|max:255",
            'phone' => "string|max:255",
            'website' => "string|max:255|nullable",
            'core_cause' => "string|max:255|nullable",
            'location' => "string|max:255",
            'tagline' => "string|nullable",
        ];
    }
}
