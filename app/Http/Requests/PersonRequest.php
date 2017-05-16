<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'mobile' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable|email|unique:people',
            'id_no' => 'nullable|numeric|unique:people',
            'city' => 'required',
            'zip' => 'nullable|numeric|min:5',
            'dob' => 'required|date|before:'.\Carbon\Carbon::now(),
        ];
    }
}
