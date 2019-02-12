<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Permissions
         */
        if (Permission::where('name', '=', 'Administrator')->first() === null) {
            Permission::create([
                'name'        => 'Administrator',
                'slug'        => 'administrator',
                'description' => 'controll system',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Server Authorized')->first() === null) {
            Permission::create([
                'name'        => 'Server Authorized',
                'slug'        => 'server.authorized',
                'description' => 'Can access system',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Server Admin Authorized')->first() === null) {
            Permission::create([
                'name'        => 'Server Admin Authorized',
                'slug'        => 'server.admin.authorized',
                'description' => 'Can to manage sector',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Can access memo')->first() === null) {
            Permission::create([
                'name'        => 'Can access memo',
                'slug'        => 'access.memo',
                'description' => 'Can access memo',
                'model'       => 'Permission',
            ]);
        }
    }
}
