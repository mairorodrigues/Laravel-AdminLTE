<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleTablesSeeder extends Seeder
{
	/**
     * @var Collection;
     */
    private $role;

    /**
     * @var Collection;
     */
    private $permissions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// cria os papéis
    	$this->createRoles();

    	// cria os grupos de persmissões
        $this->createPermissionGroups();

        // cria as permissões
        $this->createPermissions();

        // vincula as permissões aos papéis
        $this->sync();    	    
    }

    private function createRoles()
    {
        Role::create([
            'name' => 'Developer', 
            'label'  => 'System Developer'
        ]);       

        Role::create([
            'name' => 'Administrators', 
            'label'  => 'System Administrators'
        ]); 

        $this->command->info('Roles created!');
    }

    private function createPermissionGroups()
    {
        PermissionGroup::create([
            'name' => 'Developer Settings', //1
        ]);

        PermissionGroup::create([
            'name' => 'System Settings', //2
        ]);       

        PermissionGroup::create([
            'name' => 'Users', //3
        ]); 

        PermissionGroup::create([
            'name' => 'Permissions', //4
        ]);

        $this->command->info('Permission Groups created!');
    }

    private function createPermissions()
    {
        Permission::create([
            'permission_group_id' => '1', 
            'name' => 'root-dev', 
            'label'  => 'Developer Permission'
        ]);

    	Permission::create([
            'permission_group_id' => '2', 
            'name' => 'edit-config', 
            'label'  => 'Edit System Settings'
        ]);       

        Permission::create([
            'permission_group_id' => '3', 
            'name' => 'show-user', 
            'label'  => 'View User'
        ]); 

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'create-user', 
            'label'  => 'Add User'
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'edit-user', 
            'label'  => 'Edit User'
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'destroy-user', 
            'label'  => 'Delete User'
        ]); 

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'show-role', 
            'label'  => 'View Permission'
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'create-role', 
            'label'  => 'Add Permission'
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'edit-role', 
            'label'  => 'Edit Permission'
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'destroy-role', 
            'label'  => 'Delete Permission'
        ]); 

        $this->command->info('Permissions created!');
    }

    private function sync()
    { 
        $permissions_id = Permission::permissionsId(1);
        $role = Role::find(1);        
        $role->permissions()->sync($permissions_id);

        $permissions_id = Permission::permissionsId(2);
        $role = Role::find(2);
        $role->permissions()->sync($permissions_id);

        $this->command->info('Persistence linked to roles!');
    }
}
