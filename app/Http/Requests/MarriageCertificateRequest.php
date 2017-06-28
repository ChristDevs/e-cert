<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MarriageCertificateRequest extends FormRequest
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
            'groom_first_name' => 'required|alpha',
            'groom_last_name' => 'required|alpha',
            'groom_dob' => 'required|date|before:'.Carbon::now()->subYears(18)->format('Y-m-d'),
            'groom_id_no' => 'required|numeric|min:7',
            'groom_email' => 'email',
            'bride_first_name' => 'required|alpha',
            'bride_last_name' => 'required|alpha',
            'bride_dob' => 'required|date|before:'.Carbon::now()->subYears(18)->format('Y-m-d'),
            'bride_id_no' => 'required|numeric|min:7',
            'bride_email' => 'email',
            'overseen_by' => 'required',
            'witness1_name' => 'required',
            'witness1_id_no' => 'required|numeric|min:7',
            'witness2_name' => 'required',
            'witness2_id_no' => 'required|numeric|min:7',
            'witness3_name' => 'required',
            'witness3_id_no' => 'required|numeric|min:7',
            'witness4_name' => 'required',
            'witness4_id_no' => 'required|numeric|min:7',
            'witness5_name' => 'required',
            'witness5_id_no' => 'required|numeric|min:7'
            //
        ];
    }
}
