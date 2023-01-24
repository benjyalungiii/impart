<?php

namespace App\Http\Requests\Beacons;

use Illuminate\Foundation\Http\FormRequest;

class AddBeaconRequest extends FormRequest
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
            'pickup_address' => 'string|max:255',
            'pickup_adresss_2' => 'string|max:255',
            'pickup_state' => 'string|max:255',
            'pickup_postal_code' => 'string|max:10',
            'dropoff_address' => 'string|max:255',
            'dropoff_adress_2' => 'string|max:255',
            'dropoff_city' => 'string|max:255',
            'dropoff_state' => 'string|max:255',
            'dropoff_postalcode' => 'string|max:10',
            'instructions' => 'string|nullable',
        ];
    }
}
