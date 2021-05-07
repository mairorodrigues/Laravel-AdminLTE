<?php 

namespace App\Http\Requests\Profile; 

use App\Http\Requests\Request; 

class UpdateAvatarProfileRequest extends Request 
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