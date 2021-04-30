<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    	$this->command->info('Initializing...');
    	$this->command->info('Deleting tables...');

    	DB::table('configs')->truncate();
    	DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();        
        DB::table('permissions')->truncate();
        DB::table('permission_groups')->truncate();
        DB::table('roles')->truncate();        
        DB::table('users')->truncate();

        $this->command->info('Deleted tables!');
        $this->command->info('Creating Tables...');
        
        $this->call([
            ConfigTableSeeder::class,
            PermissionRoleTablesSeeder::class,
            RoleUserTablesSeeder::class,
        ]);

        $this->command->info('Finished!');

    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
