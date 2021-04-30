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
            'name' => 'Desenvolvedor', 
            'label'  => 'Desenvolvedor do sistema'
        ]);       

        Role::create([
            'name' => 'Administradores', 
            'label'  => 'Administradores do Sistema'
        ]); 

        $this->command->info('Roles created!');
    }

    private function createPermissionGroups()
    {
        PermissionGroup::create([
            'name' => 'Configurações de Desenvolvedor', //1
        ]);

        PermissionGroup::create([
            'name' => 'Configurações do Sistema', //2
        ]);       

        PermissionGroup::create([
            'name' => 'Usuários', //3
        ]); 

        PermissionGroup::create([
            'name' => 'Permissões', //4
        ]);

        $this->command->info('Permission Groups created!');
    }

    private function createPermissions()
    {
        Permission::create([
            'permission_group_id' => '1', 
            'name' => 'root-dev', 
            'label'  => 'Permissão de Desenvolvedor'
        ]);

    	Permission::create([
            'permission_group_id' => '2', 
            'name' => 'edit-config', 
            'label'  => 'Editar Configurações do Sistema'
        ]);       

        Permission::create([
            'permission_group_id' => '3', 
            'name' => 'show-user', 
            'label'  => 'Visualizar Usuário'
        ]); 

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'create-user', 
            'label'  => 'Adicionar Usuário'
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'edit-user', 
            'label'  => 'Editar Usuário'
        ]);

        Permission::create([
            'permission_group_id' => '3',
            'name' => 'destroy-user', 
            'label'  => 'Excluir Usuário'
        ]); 

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'show-role', 
            'label'  => 'Visualizar Permissão'
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'create-role', 
            'label'  => 'Adicionar Permissão'
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'edit-role', 
            'label'  => 'Editar Permissão'
        ]);

        Permission::create([
            'permission_group_id' => '4',
            'name' => 'destroy-role', 
            'label'  => 'Excluir Permissão'
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
