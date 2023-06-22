<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Ahmad Baruuk',
            'email' => 'ahmadbaruuk1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Siti Gara',
            'email' => 'sitigara1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Ivara Rahmawati',
            'email' => 'ivararahmawati1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Volt Pranata',
            'email' => 'voltpranata1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Frost Nugroho',
            'email' => 'frostnugroho1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Mag Widjaja',
            'email' => 'magwidjaja1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Ember Wibowo',
            'email' => 'emberwibowo1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Excalibur Suryadi',
            'email' => 'excalibursuryadi1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Wukong Lim',
            'email' => 'wukonglim1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Aurandi Emran Astrawinata',
            'email' => 'randiemran1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211113333',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Nicky Lianto',
            'email' => 'lianto1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Marxen',
            'email' => 'marxen22@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Gladiia',
            'email' => 'gladiia@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Skadi',
            'email' => 'skadi@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Specter',
            'email' => 'specter@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Kroos',
            'email' => 'kroos@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Melantha',
            'email' => 'melantha@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Yato',
            'email' => 'yato@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Steerner',
            'email' => 'steerner@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Yonta',
            'email' => 'yonta@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '081211112222',
            'dob' => Carbon::parse('2001-09-03'),
        ]);

    }
}
