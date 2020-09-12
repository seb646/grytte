<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'Member';
        $role_user->description = 'The default member role.';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Contributor';
        $role_user->description = 'The default contributor role.';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Manager';
        $role_user->description = 'The default manager role.';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Administrator';
        $role_user->description = 'The administrator role.';
        $role_user->save();
    }
}
