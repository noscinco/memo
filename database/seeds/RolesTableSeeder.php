<?php

use App\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Roles
         *
         */
        if (Role::where('name', '=', 'Admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'Admin',
                'slug'        => 'admin',
                'level'       => 5,
            ]);
        }
        if (Role::where('name', '=', 'Server')->first() === null) {
            $serverRole = Role::create([
                'name'        => 'Server',
                'slug'        => 'server',
                'level'       => 1,
            ]);
        }
        if(Role::where('name','=','Server_admin')->first()===null){
            $serverAdminRole = Role::create([
                'name'        => 'ServerAdmin',
                'slug'        => 'server_admin',
                'level'       => 1,
            ]);
        }

        if (Role::where('name', '=', 'Server_Unauthorized')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Server_Unauthorized',
                'slug'        => 'server.unauthorized',
                'level'       => 0,
            ]);
        }
    }
}
