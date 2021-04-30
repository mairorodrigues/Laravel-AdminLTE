<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfigRequest extends Request
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

    public function messages()
    {
        return [
            'app_name.required'=>'Nome do aplicativo é obrigatório.',
            'app_name.max'=>'Nome deve ter até 30 caracteres.',
            'caminho_img_login.image'=>'Deve ser uma imagem.',
            'favicon.image'=>'Deve ser uma imagem.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_name'=>'required|max:30',
            'caminho_img_login'=>'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            'favicon'=>'image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
        ];
    }
}
