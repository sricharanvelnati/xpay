<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->description = "User is Admin of UBank Admin";
        $admin->save();

        $user = new Role();
        $user->name = "user";
        $user->display_name = "User";
        $user->description = "User of UBank";
        $user->save();

        $createUser = new Permission();
        $createUser->name = "create-users";
        $createUser->display_name = "Create Users";
        $createUser->description = "Create New Users";
        $createUser->save();

        $editUser = new Permission();
        $editUser->name = "edit-users";
        $editUser->display_name = "Edit Users";
        $editUser->description = "Edit Users";
        $editUser->save();

        $deleteUser = new Permission();
        $deleteUser->name = "delete-users";
        $deleteUser->display_name = "Delete Users";
        $deleteUser->description = "Delete Users";
        $deleteUser->save();

        $user = new User();
        $user->first_name = 'WOS';
        $user->last_name = 'Software';
        $user->email = 'admin@gmail.com';
        $user->contactNumber = '8569541258';
        $user->countryCode = '91';
        $user->countryName = 'in';
        $user->password = Hash::make('admin123');
        $user->save();

        $admin->attachPermissions(array($createUser, $editUser, $deleteUser));

        $user->attachRole($admin);
    }
}
