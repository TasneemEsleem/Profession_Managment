<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::factory(1)->create();
        //  $allPermission= Permission::where('guard_name','admin')->get();
        // Role::create([
        //     'name'=>'Super-Admin',
        //     'guard_name'=>'admin'
        // ])->givePermissionTo($allPermission);
                Admin::create([
                    'name' => 'Test',
                    'email' => 'test@gmail.com',
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),]);
                    Admin::first()->assignRole(1);
    }
}
