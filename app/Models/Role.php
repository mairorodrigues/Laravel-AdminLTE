<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class Role extends Model
{
	protected $fillable = [
        'name', 'label', 
    ];

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

    static function rolesUser($user)
    {
		$roles_ids = [];

     	foreach ($user->roles as $role) {
     		$roles_ids[] = $role->id;
     	}

     	return $roles_ids;
    }
}