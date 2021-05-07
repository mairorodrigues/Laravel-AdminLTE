<?php 

namespace App\Http\Requests\User; 

use App\Http\Requests\Request; 

class UpdateUserRequest extends Request 
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
            'email' => 'required|email|unique:users,email,'.$this->id
		]; 
	} 
}