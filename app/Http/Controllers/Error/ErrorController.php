<?php

namespace App\Http\Controllers\Error; 

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request; 

class ErrorController extends Controller
{
	public function __construct() 
	{ 
		$this->middleware("auth");
	} 

	public function unauthorized()
	{
		return view('errors.unauthorized');
	}
}