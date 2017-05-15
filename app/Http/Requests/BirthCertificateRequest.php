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
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date|before:'.Carbon::now(),
            'gender' => 'required|in:male,female',
            'county_of_birth' => 'required',
            'province_of_birth' => 'required',
            'birth_place' => 'required',
            'residence' => 'required',
            'name_of_father' => 'required',
            'name_of_mother' => 'required',
        ];
    }
}
