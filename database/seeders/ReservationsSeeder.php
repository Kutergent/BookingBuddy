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
            'name' => "John Doe",
            'email' => 'johndoe@coolmail.com',
            'phone_number' => '08596498545',
            'dob' => Carbon::parse('2001-09-03'),
            'reserve_date' => Carbon::parse('2023-06-06'),
            'reserve_duration' => 3
        ]);


        Reservations::create([
            'name' => "Jane Smith",
            'email' => 'janesmith@example.com',
            'phone_number' => '0987654321',
            'dob' => Carbon::parse('1995-12-15'),
            'reserve_date' => Carbon::parse('2023-06-08'),
            'reserve_duration' => 2
        ]);


        Reservations::create([
            'name' => "David Johnson",
            'email' => 'davidjohnson@gmail.com',
            'phone_number' => '123-456-7890',
            'dob' => Carbon::parse('1988-07-20'),
            'reserve_date' => Carbon::parse('2023-06-12'),
            'reserve_duration' => 4
        ]);


        Reservations::create([
            'name' => "Sarah Davis",
            'email' => 'sarahdavis@hotmail.com',
            'phone_number' => '9876543210',
            'dob' => Carbon::parse('1992-03-10'),
            'reserve_date' => Carbon::parse('2023-06-15'),
            'reserve_duration' => 1
        ]);


        Reservations::create([
            'name' => "Michael Brown",
            'email' => 'mbrown@example.com',
            'phone_number' => '987654321',
            'dob' => Carbon::parse('1990-05-25'),
            'reserve_date' => Carbon::parse('2023-06-18'),
            'reserve_duration' => 2
        ]);


        Reservations::create([
            'name' => "Emily Wilson",
            'email' => 'ewilson@gmail.com',
            'phone_number' => '123-456-7890',
            'dob' => Carbon::parse('1998-11-12'),
            'reserve_date' => Carbon::parse('2023-06-20'),
            'reserve_duration' => 3
        ]);


        Reservations::create([
            'name' => "Alexandra Lee",
            'email' => 'alexlee@example.com',
            'phone_number' => '876543210',
            'dob' => Carbon::parse('1985-09-08'),
            'reserve_date' => Carbon::parse('2023-06-25'),
            'reserve_duration' => 1
        ]);


        Reservations::create([
            'name' => "Robert Johnson",
            'email' => 'robertjohnson@example.com',
            'phone_number' => '987654321',
            'dob' => Carbon::parse('1982-08-15'),
            'reserve_date' => Carbon::parse('2023-06-28'),
            'reserve_duration' => 2
        ]);


        Reservations::create([
            'name' => "Emma Thompson",
            'email' => 'ethompson@gmail.com',
            'phone_number' => '123-456-7890',
            'dob' => Carbon::parse('1996-03-22'),
            'reserve_date' => Carbon::parse('2023-07-01'),
            'reserve_duration' => 3
        ]);

        Reservations::create([
            'name' => "Oliver Martinez",
            'email' => 'omartinez@example.com',
            'phone_number' => '876543210',
            'dob' => Carbon::parse('1979-11-02'),
            'reserve_date' => Carbon::parse('2023-07-05'),
            'reserve_duration' => 1
        ]);


    }
}
