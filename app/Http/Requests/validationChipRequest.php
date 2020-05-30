<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationChipRequest extends FormRequest
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
            'numero' => "required", 
            'id_chip' => "required", 
            'PIN1' => "required", 
            'PIN2' => "required", 
            'PUNK' => "required", 
            'PUNK2' => "required", 
            'DADOS' => "required",
        ];
    }
}
