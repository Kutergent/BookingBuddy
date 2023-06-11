<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Zanuka Abidin',
            'email' => 'zanukaabidin1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
        ]);

        User::create([
            'name' => 'Ahmad Baruuk',
            'email' => 'ahmadbaruuk1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
        ]);

        User::create([
            'name' => 'Siti Gara',
            'email' => 'sitigara1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Ivara Rahmawati',
            'email' => 'ivararahmawati1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Volt Pranata',
            'email' => 'voltpranata1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Frost Nugroho',
            'email' => 'frostnugroho1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Mag Widjaja',
            'email' => 'magwidjaja1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
        ]);

        User::create([
            'name' => 'Ember Wibowo',
            'email' => 'emberwibowo1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Excalibur Suryadi',
            'email' => 'excalibursuryadi1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Wukong Lim',
            'email' => 'wukonglim1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
        ]);

    }
}
