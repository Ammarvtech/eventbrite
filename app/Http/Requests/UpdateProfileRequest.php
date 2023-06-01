<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'string|email',
            'firstname' => 'string',
            'lastname' => 'string',
            'facebook' => 'string',
            'twitter' => 'string',
            'instagram' => 'string',
            'linkedin' => 'string',
            'secondary_phone' => 'string',
            'secondary_email' => 'string|email',
            'phone_number' => 'string',
            'org_name' => 'string',
            'org_website' => 'string',
            'org_mailing_address' => 'string',
            'org_communication_method' => 'string',
            'org_timezone' => 'string',
            'country' => 'string',
            'city' => 'string',
            'postal_code' => 'string',
            'address' => 'string',
            
        ];
    }
}
