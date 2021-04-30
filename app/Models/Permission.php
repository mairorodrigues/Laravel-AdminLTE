<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
	protected $fillable = [
        'name', 'label',
    ];

	public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }

    static function permissionsRole($role)
    {
		$permissions_ids = [];

     	foreach ($role->permissions as $permission) {
     		$permissions_ids[] = $permission->id;
     	}

     	return $permissions_ids;
    }

    static function permissionsId($var)
    {
        $permissions_ids = [];

        foreach (Permission::all() as $permission) {
            if($var == 1){
                $permissions_ids[] = $permission->id;
            }
            if($var == 2){
                if($permission->id > 1){
                    $permissions_ids[] = $permission->id;
                }
            }           
        }

        return $permissions_ids;
    }
}
