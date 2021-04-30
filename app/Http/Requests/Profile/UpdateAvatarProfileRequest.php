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
			//'email.unique'=>'E-mail já cadastrado no sistema.', 
		]; 
	} 

	public function rules() 
	{ 
		return [ 
            //'password' => 'required|string|min:6|confirmed',
		]; 
	} 
}