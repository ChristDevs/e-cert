<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BirthCertificateRequest extends FormRequest
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
            'dob' => 'required|date|before:'.Carbon::now(),
            'gender' => 'required|in:male,female',
            'county_of_birth' => 'required|string|min:3',
            'province_of_birth' => 'required|string|min:3',
            'birth_place' => 'required|string',
            'residence' => 'required|string',
            'name_of_father' => 'required|string|min:3',
            'name_of_mother' => 'required|string|min:3',
        ];
    }
}
