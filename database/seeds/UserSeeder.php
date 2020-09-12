<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Administrator')->first();
        $user = new User();
        $user->name = "Sebastian Rodriguez";
        $user->email = "admin@grytte.org";
        $user->password = Hash::make('Admin_Password123');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
