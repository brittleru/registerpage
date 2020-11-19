<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'first' => 'Mocanu',
            'last' => 'Sebastian',
            'email' => 'smocanu10@yahoo.com',
            'password' => Hash::make('Admin23!'),
            'password2' => Hash::make('Admin23!'),
        ]);

        $user = User::create([
            'first' => 'Mogoase',
            'last' => 'Medi',
            'email' => 'm.mogoase23@gmail.com',
            'password' => Hash::make('User23!'),
            'password2' => Hash::make('User23!'),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
