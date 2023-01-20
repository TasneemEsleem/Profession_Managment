<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'Create-', 'guard_name' => '']);
        // Permission::create(['name' => 'Read-', 'guard_name' => '']);
        // Permission::create(['name' => 'Update-', 'guard_name' => '']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => '']);


        // Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Users', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-User', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Read-Permission', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Categories', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Category', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Category', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-SubCategory', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-SubCategory', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-SubCategory', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-SubCategory', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Account-Setting', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Profile-Personal', 'guard_name' => 'profession']);

        // Permission::create(['name' => 'Create-Portfolio', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Index-Portfolio', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Show-Portfolio', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Update-Portfolio', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Delete-Portfolio', 'guard_name' => 'profession']);

        // Permission::create(['name' => 'Profile-Profession', 'guard_name' => 'profession']);


        // Permission::create(['name' => 'Account-Setting', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Create-Project', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Read-Projects', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Update-Project', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Delete-Project', 'guard_name' => 'user']);

        // Permission::create(['name' => 'All-Projects', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'All-Projects', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'All-Projects', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Read-Professions', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Read-Professions', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Professions', 'guard_name' => 'user']);
        
        // Permission::create(['name' => 'Show-Portfolio', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Show-Portfolio', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Skill', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Skills', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Skill', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Skill', 'guard_name' => 'admin']);
       
        // Permission::create(['name' => 'Create-professionSkill', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Index-professionSkills', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Show-professionSkill', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Update-professionSkill', 'guard_name' => 'profession']);
        // Permission::create(['name' => 'Delete-professionSkill', 'guard_name' => 'profession']);
        
        // Permission::create(['name' => 'All-Profession', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Plans', 'guard_name' => 'profession']);
        Permission::create(['name' => 'comment-profession', 'guard_name' => 'profession']);

    }
}
