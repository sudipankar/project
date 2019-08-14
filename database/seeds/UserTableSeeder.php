<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $employee = new User();
        $employee->name = 'Super Admin';
        $employee->email = 'myadmin@yopmail.com';
        $employee->password = bcrypt('123456');
        $employee->save();
        $employee->roles()->attach($role_admin);

        $employee = new User();
        $employee->name = 'Test User';
        $employee->email = 'myuser@yopmail.com';
        $employee->password = bcrypt('123456');
        $employee->save();
        $employee->roles()->attach($role_user);
    }
}
