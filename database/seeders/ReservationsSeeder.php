<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservations::create([
            'users_id' => 12,
            'name' => "John Doe",
            'email' => 'johndoe@coolmail.com',
            'phone_number' => '081234567890',
            'dob' => Carbon::parse('2001-09-03'),
            'reserve_date' => Carbon::parse('2023-06-06'),
            'reserve_time' => '12:00:00',
            'reserve_duration' => 3,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 12,
            'name' => "Jane Smith",
            'email' => 'janesmith@example.com',
            'phone_number' => '082345678901',
            'dob' => Carbon::parse('1995-12-15'),
            'reserve_date' => Carbon::parse('2023-06-08'),
            'reserve_time' => '09:00:00',
            'reserve_duration' => 2,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 13,
            'name' => "David Johnson",
            'email' => 'davidjohnson@gmail.com',
            'phone_number' => '083456789012',
            'dob' => Carbon::parse('1988-07-20'),
            'reserve_date' => Carbon::parse('2023-06-12'),
            'reserve_time' => '13:00:00',
            'reserve_duration' => 4,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 13,
            'name' => "Sarah Davis",
            'email' => 'sarahdavis@hotmail.com',
            'phone_number' => '084567890123',
            'dob' => Carbon::parse('1992-03-10'),
            'reserve_date' => Carbon::parse('2023-06-15'),
            'reserve_time' => '18:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 14,
            'name' => "Michael Brown",
            'email' => 'mbrown@example.com',
            'phone_number' => '085678901234',
            'dob' => Carbon::parse('1990-05-25'),
            'reserve_date' => Carbon::parse('2023-06-18'),
            'reserve_time' => '10:00:00',
            'reserve_duration' => 2,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 11,
            'name' => "Emily Wilson",
            'email' => 'ewilson@gmail.com',
            'phone_number' => '086789012345',
            'dob' => Carbon::parse('1998-11-12'),
            'reserve_date' => Carbon::parse('2023-06-20'),
            'reserve_time' => '09:00:00',
            'reserve_duration' => 3,
            'status' => 'canceled'
        ]);


        Reservations::create([
            'users_id' => 11,
            'name' => "Alexandra Lee",
            'email' => 'alexlee@example.com',
            'phone_number' => '087890123456',
            'dob' => Carbon::parse('1985-09-08'),
            'reserve_date' => Carbon::parse('2023-06-25'),
            'reserve_time' => '15:00:00',
            'reserve_duration' => 1,
            'status' => 'confirmed'
        ]);


        Reservations::create([
            'users_id' => 11,
            'name' => "Robert Johnson",
            'email' => 'robertjohnson@example.com',
            'phone_number' => '088901234567',
            'dob' => Carbon::parse('1982-08-15'),
            'reserve_date' => Carbon::parse('2023-06-28'),
            'reserve_time' => '14:00:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);


        Reservations::create([
            'users_id' => 11,
            'name' => "Emma Thompson",
            'email' => 'ethompson@gmail.com',
            'phone_number' => '089012345678',
            'dob' => Carbon::parse('1996-03-22'),
            'reserve_date' => Carbon::parse('2023-07-01'),
            'reserve_time' => '10:00:00',
            'reserve_duration' => 3,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Oliver Martinez",
            'email' => 'omartinez@example.com',
            'phone_number' => '090123456789',
            'dob' => Carbon::parse('1979-11-02'),
            'reserve_date' => Carbon::parse('2023-07-05'),
            'reserve_time' => '12:00:00',
            'reserve_duration' => 1,
            'status' => 'canceled'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Michael Ash",
            'email' => 'mash@example.com',
            'phone_number' => '091234567890',
            'dob' => Carbon::parse('1990-05-25'),
            'reserve_date' => Carbon::parse('2023-05-12'),
            'reserve_time' => '10:00:00',
            'reserve_duration' => 2,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Ember Wijaya",
            'email' => 'ewijaya@gmail.com',
            'phone_number' => '092345678901',
            'dob' => Carbon::parse('1998-06-18'),
            'reserve_date' => Carbon::parse('2023-06-20'),
            'reserve_time' => '09:00:00',
            'reserve_duration' => 3,
            'status' => 'canceled'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Excalibur Kurniawan",
            'email' => 'ekurniawan@example.com',
            'phone_number' => '093456789012',
            'dob' => Carbon::parse('1995-07-03'),
            'reserve_date' => Carbon::parse('2023-07-10'),
            'reserve_time' => '14:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Loki Santoso",
            'email' => 'lsantoso@gmail.com',
            'phone_number' => '094567890123',
            'dob' => Carbon::parse('1992-05-08'),
            'reserve_date' => Carbon::parse('2023-05-30'),
            'reserve_time' => '15:30:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Mag Purnomo",
            'email' => 'magpurnomo@example.com',
            'phone_number' => '095678901234',
            'dob' => Carbon::parse('1994-06-27'),
            'reserve_date' => Carbon::parse('2023-07-15'),
            'reserve_time' => '11:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Rhino Gunawan",
            'email' => 'rhinogunawan@example.com',
            'phone_number' => '096789012345',
            'dob' => Carbon::parse('1993-05-17'),
            'reserve_date' => Carbon::parse('2023-05-28'),
            'reserve_time' => '16:00:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Trinity Wulandari",
            'email' => 'twulandari@gmail.com',
            'phone_number' => '097890123456',
            'dob' => Carbon::parse('1996-06-10'),
            'reserve_date' => Carbon::parse('2023-06-12'),
            'reserve_time' => '13:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Volt Suryadi",
            'email' => 'voltsuryadi@example.com',
            'phone_number' => '098901234567',
            'dob' => Carbon::parse('1991-07-22'),
            'reserve_date' => Carbon::parse('2023-07-05'),
            'reserve_time' => '18:30:00',
            'reserve_duration' => 3,
            'status' => 'canceled'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Frost Wicaksana",
            'email' => 'frostwicaksana@gmail.com',
            'phone_number' => '099012345678',
            'dob' => Carbon::parse('1997-05-03'),
            'reserve_date' => Carbon::parse('2023-05-15'),
            'reserve_time' => '20:00:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 11,
            'name' => "Nyx Kusuma",
            'email' => 'nyxkusuma@example.com',
            'phone_number' => '090123456789',
            'dob' => Carbon::parse('1992-06-30'),
            'reserve_date' => Carbon::parse('2023-06-25'),
            'reserve_time' => '17:30:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

    }
}
