<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class PermissionGroup extends Model
{
	protected $fillable = [
        'name',
    ];

	public function permissions()
    {
    	return $this->hasMany('App\Models\Permission');
    }
}
