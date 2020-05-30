<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationRequest extends FormRequest
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
            'name' => 'required', 
            'setor' => 'required',     
            'empresa' => "required", 
            'centro_custo' => "required", 
            'email_google' => "required", 
            'senha_google' => "required", 
            /*'marca'  => "required", 
            'modelo' => "required", 
            'serial_number' => "required", 
            'IMEI1' => "required", 
            'IMEI2' => "required", 
            'mac_wirelles' => "required", 
            'numero' => "required", 
            'id_chip' => "required", 
            'PIN1' => "required", 
            'PIN2' => "required", 
            'PUNK' => "required", 
            'PUNK2' => "required", 
            'DADOS' => "required", 
            */
        ];
    }

    public function messages()
    {
       return [
        
            'setor.required' => 'Setor é obrigatório',
        
       ];
    }
}
