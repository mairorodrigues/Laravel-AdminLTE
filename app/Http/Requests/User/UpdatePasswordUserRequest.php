<?php 

namespace App\Http\Requests\User; 

use App\Http\Requests\Request; 

class UpdatePasswordUserRequest extends Request 
{ 
	public function authorize() 
	{ 
		return true; 
	} 

	public function messages() 
	{ 
		return [ 
			//'email.unique'=>'E-mail já cadastrado no sistema.', 
		]; 
	} 

	public function rules() 
	{ 
		return [ 
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
		]; 
	} 
}