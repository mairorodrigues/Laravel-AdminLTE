<?php 

namespace App\Http\Requests\User; 

use App\Http\Requests\Request; 

class UpdateRoleRequest extends Request 
{ 
	public function authorize() 
	{ 
		return true; 
	} 

	public function messages() 
	{ 
		return [ 
			
		]; 
	} 

	public function rules() 
	{ 
		return [ 			
			'name' => 'required|string|min:4|max:255',
		]; 
	} 
}