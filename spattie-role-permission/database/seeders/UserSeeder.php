<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@mail.com',
            'password' => Hash::make(12345678),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Role',
            'email' => 'user@mail.com',
            'password' => Hash::make(12345678),
        ]);
        $user->assignRole('user');
    }
}
