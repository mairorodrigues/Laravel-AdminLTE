<?php 

namespace App\Http\Requests\User; 

use App\Http\Requests\Request; 

class StoreUserRequest extends Request 
{ 
	public function authorize() 
	{ 
		return true; 
	} 

	public function messages() 
	{ 
		return [ 
			'email.unique'=>'E-mail already registered in the system.', 
		]; 
	} 

	public function rules() 
	{ 
		return [ 
			'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
		]; 
	} 
}