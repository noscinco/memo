<?php

use App\User;
use App\Administrator;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', '=', 'Admin')->first();
        $adminPermission = Permission::where('name','=','Administrator')->first();
        $permissions = Permission::all();

        /*
         * Add Users
        */
        if (User::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = User::create([
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);
            $newAdmin = Administrator::create([
                'user_id'=>$newUser->id,
            ]);

            $newUser->attachRole($adminRole);
            $newUser->attachPermission($adminPermission);
            
        }
    }
}
