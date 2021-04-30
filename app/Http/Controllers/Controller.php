<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() 
	{ 
		$this->middleware("auth");		
	} 

	public function flashMessage($icon, $message, $alert){
		\Session::flash('flash_message',[
			'msg'=>"<i class='fa fa-fw fa-$icon'></i> $message",
			'class'=>"alert-$alert"
    	]);
	}	
}
