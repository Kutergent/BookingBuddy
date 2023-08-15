<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $provider = ['852', '853', '811', '812', '813', '821', '822', '851', '857', '856', '896', '895', '897', '898', '899', '817', '818', '819', '859', '877', '878', '832', '833', '838', '881', '882', '883', '884', '885', '886', '887', '888', '889'];

        User::create([
            'name' => 'Zanuka Abidin',
            'email' => 'zanukaabidin1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),

        ]);

        User::create([
            'name' => 'Ahmad Baruuk',
            'email' => 'ahmadbaruuk1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Siti Gara',
            'email' => 'sitigara1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Ivara Rahmawati',
            'email' => 'ivararahmawati1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Volt Pranata',
            'email' => 'voltpranata1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Frost Nugroho',
            'email' => 'frostnugroho1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Mag Widjaja',
            'email' => 'magwidjaja1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'User Manager',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Ember Wibowo',
            'email' => 'emberwibowo1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Excalibur Suryadi',
            'email' => 'excalibursuryadi1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Wukong Lim',
            'email' => 'wukonglim1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Admin',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);

        User::create([
            'name' => 'Nicky Lianto',
            'email' => 'lianto1337@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'Customer',
            'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
            'dob' => Carbon::parse('2001-09-03'),
        ]);


        for ($i = 0; $i < 150; $i++) {
            $name = $faker->firstName . ' ' . $faker->lastName;
            $email = strtolower(str_replace(' ', '.', $name)) . '@gmail.co.id';

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('123456'),
                'role' => 'Customer',
                'phone_number' => '0' . $faker->randomElement($provider) . $faker->randomNumber(8),
                'dob' => $faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            ]);

            if ($faker->boolean(40)) {
                for ($j = 0; $j < $faker->numberBetween(1, 2); $j++) {
                    ChatMessage::create([
                        'users_id' => $user->id,
                        'role' => 'Customer',
                        'message' => $faker->word,
                    ]);
                }
            }
        }



    }
}
