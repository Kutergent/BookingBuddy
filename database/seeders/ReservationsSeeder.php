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
            'reserve_date' => Carbon::parse('2023-06-06'),
            'reserve_time' => '12:00:00',
            'reserve_duration' => 3,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 12,
            'reserve_date' => Carbon::parse('2023-06-08'),
            'reserve_time' => '09:00:00',
            'reserve_duration' => 2,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 13,
            'reserve_date' => Carbon::parse('2023-06-12'),
            'reserve_time' => '13:00:00',
            'reserve_duration' => 4,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 13,
            'reserve_date' => Carbon::parse('2023-06-15'),
            'reserve_time' => '18:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 14,
            'reserve_date' => Carbon::parse('2023-06-18'),
            'reserve_time' => '10:00:00',
            'reserve_duration' => 2,
            'status' => 'pending'
        ]);


        Reservations::create([
            'users_id' => 15,
            'reserve_date' => Carbon::parse('2023-06-20'),
            'reserve_time' => '09:00:00',
            'reserve_duration' => 3,
            'status' => 'canceled'
        ]);


        Reservations::create([
            'users_id' => 15,
            'reserve_date' => Carbon::parse('2023-06-25'),
            'reserve_time' => '15:00:00',
            'reserve_duration' => 1,
            'status' => 'confirmed'
        ]);


        Reservations::create([
            'users_id' => 15,
            'reserve_date' => Carbon::parse('2023-06-28'),
            'reserve_time' => '14:00:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);


        Reservations::create([
            'users_id' => 11,
            'reserve_date' => Carbon::parse('2023-07-01'),
            'reserve_time' => '10:00:00',
            'reserve_duration' => 3,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 11,
            'reserve_date' => Carbon::parse('2023-07-05'),
            'reserve_time' => '12:00:00',
            'reserve_duration' => 1,
            'status' => 'canceled'
        ]);

        Reservations::create([
            'users_id' => 16,
            'reserve_date' => Carbon::parse('2023-05-12'),
            'reserve_time' => '10:00:00',
            'reserve_duration' => 2,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 16,
            'reserve_date' => Carbon::parse('2023-06-20'),
            'reserve_time' => '09:00:00',
            'reserve_duration' => 3,
            'status' => 'canceled'
        ]);

        Reservations::create([
            'users_id' => 17,
            'reserve_date' => Carbon::parse('2023-07-10'),
            'reserve_time' => '14:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 17,
            'reserve_date' => Carbon::parse('2023-05-30'),
            'reserve_time' => '15:30:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 18,
            'reserve_date' => Carbon::parse('2023-07-15'),
            'reserve_time' => '11:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 18,
            'reserve_date' => Carbon::parse('2023-05-28'),
            'reserve_time' => '16:00:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 19,
            'reserve_date' => Carbon::parse('2023-06-12'),
            'reserve_time' => '13:00:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

        Reservations::create([
            'users_id' => 19,
            'reserve_date' => Carbon::parse('2023-07-05'),
            'reserve_time' => '18:30:00',
            'reserve_duration' => 3,
            'status' => 'canceled'
        ]);

        Reservations::create([
            'users_id' => 20,
            'reserve_date' => Carbon::parse('2023-05-15'),
            'reserve_time' => '20:00:00',
            'reserve_duration' => 2,
            'status' => 'confirmed'
        ]);

        Reservations::create([
            'users_id' => 20,
            'reserve_date' => Carbon::parse('2023-06-25'),
            'reserve_time' => '17:30:00',
            'reserve_duration' => 1,
            'status' => 'pending'
        ]);

    }
}
