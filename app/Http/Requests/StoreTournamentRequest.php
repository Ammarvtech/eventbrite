<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTournamentRequest extends FormRequest
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
            'title' => 'required|string',
            // 'slug' => 'required|string',
            'category_id' => 'required|string',
            // 'type' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'registration_dead_line' => 'required|string',
            'event_type' => 'required|string',
            'country_id' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
            'number_of_teams' => 'required|string',
            'format' => 'required|string',
            'prize_distribution' => 'required|string',
            'level' => 'required|string',
            'entry_fee' => 'required|string',
            'rules' => 'required|string',
            'code_of_conduct' => 'required|string',
            'age' => 'required|string',
            'equipment_requirements' => 'required|string',
            'schedule_date' => 'required|string',
            'schedule_time' => 'required|string',
            'schedule_breaks' => 'required|string',
            'venue_availability' => 'required|string',
            'second_match_date' => 'required|string',
            'second_match_time' => 'required|string',
            'second_match_breaks' => 'required|string',
            'second_venue_availability' => 'required|string',
            'third_match_date' => 'required|string',
            'third_match_time' => 'required|string',
            'third_match_breaks' => 'required|string',
            'third_venue_availability' => 'required|string',
            'fourth_match_date' => 'required|string',
            'fourth_match_time' => 'required|string',
            'fourth_match_breaks' => 'required|string',
            'fourth_venue_availability' => 'required|string',
            'contact_information' => 'required|string',
            'roles_and_responsibilities' => 'required|string',
            'sponsor_information' => 'required|string',
            // 'overview' => 'required|string',
            'logos' => 'required|array',
            // 'logos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banners' => 'required|array',
            // 'banners.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
