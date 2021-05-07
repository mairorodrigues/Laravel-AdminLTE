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
            'app_name.required'=>'Application name is required.',
            'app_name.max'=>'Name must be up to 30 characters.',
            'caminho_img_login.image'=>'Select an image.',
            'favicon.image'=>'Select an image.',
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
