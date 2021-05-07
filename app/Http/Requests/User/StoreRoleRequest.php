<?php 

namespace App\Http\Requests\User; 

use App\Http\Requests\Request; 

class StoreRoleRequest extends Request 
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
			
		]; 
	} 
}