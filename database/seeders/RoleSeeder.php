<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        $admin = User::create([
            'name' => 'Joko Kopling',
            'email' => 'jokopling@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'habieell',
            'email' => 'habieell@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);
    }
}
