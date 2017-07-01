<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DeathCertRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|alpha|min:3',
            'last_name' => 'required|alpha|min:3',
            'sir_name' => 'required|alpha|min:3',
            'overseen_by' => 'required|min:3',
            'residence' => 'required',
            'event_location' => 'required',
            'gender' => 'required|in:male,female',
            'died_on' => 'required|before:'.Carbon::now(),
            'cause_of_death' => 'required|string|min:25',
            'id_no' => 'nullable|numeric|min:7',
            'city' => 'required',
            'zip' => 'nullable|numeric|min:5',
            'dob' => 'required|date|before:'.Carbon::now(),
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $messages = parent::messages();
        return array_merge([
            'overseen_by.*' => 'Please enter a valid name of the medical',
            'died_on.*' => 'Please enter a valid date',
            'event_location.required' => 'The facility, Hospital or place where death occured is required',
        ], $messages);
    }
}
