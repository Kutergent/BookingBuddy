<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Reservations;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = User::where('role', 'Customer')->get();

        foreach ($users as $user) {
            $userId = $user->id;
            $reserveDate = $faker->dateTimeBetween('2023-01-01', '2024-12-31')->format('Y-m-d');
            $reserveTime = $faker->dateTimeBetween('09:00:00', '18:00:00')->format('H:i:s');
            $reserveTime = Carbon::parse($reserveTime)->ceil('30 minutes')->format('H:i:s');
            $reserveDuration = $faker->numberBetween(1, 3);
            $status = $faker->randomElement(['pending', 'canceled', 'confirmed']);

            $generate_invoice = null;

            for ($i = 0; $i < 9; $i++) {
                $temp = strval(rand(0, 9));
                $generate_invoice .= $temp;
            }

            $invoice = 'RES'.$generate_invoice.'DP';

            $reservation = Reservations::create([
                'users_id' => $userId,
                'reserve_date' => $reserveDate,
                'reserve_time' => $reserveTime,
                'reserve_duration' => $reserveDuration,
                'status' => $status,
                'invoice' => $invoice
            ]);

            Field::create([
                'reservations_id' => $reservation->id,
                'formextra_id' => 1,
                'textbox' => 'Note ' . $faker->numberBetween(1, 15)
            ]);

            Field::create([
                'reservations_id' => $reservation->id,
                'formextra_id' => 2,
                'textbox' => 'Note ' . $faker->numberBetween(16, 30)
            ]);




    // Randomly trigger a second reservation entry with a 25% chance
            if ($faker->boolean(25)) {
                $reserveDate = $faker->dateTimeBetween('2023-05-01', '2023-08-31')->format('Y-m-d');
                $reserveTime = $faker->dateTimeBetween('09:00:00', '18:00:00')->format('H:i:s');
                $reserveTime = Carbon::parse($reserveTime)->ceil('30 minutes')->format('H:i:s');
                $status = $faker->randomElement(['pending', 'canceled', 'confirmed']);

                $generate_invoice = null;

                for ($i = 0; $i < 9; $i++) {
                    $temp = strval(rand(0, 9));
                    $generate_invoice .= $temp;
                }

                $invoice = 'RES'.$generate_invoice.'DP';


                $reservation1 = Reservations::create([
                    'users_id' => $userId,
                    'reserve_date' => $reserveDate,
                    'reserve_time' => $reserveTime,
                    'reserve_duration' => $faker->numberBetween(1, 3),
                    'status' => $faker->randomElement(['pending', 'canceled', 'confirmed']),
                    'invoice' => $invoice
                ]);

                Field::create([
                    'reservations_id' => $reservation1->id,
                    'formextra_id' => 1,
                    'textbox' => 'Note ' . $faker->numberBetween(1, 15)
                ]);

                Field::create([
                    'reservations_id' => $reservation1->id,
                    'formextra_id' => 2,
                    'textbox' => 'Note ' . $faker->numberBetween(16, 30)
                ]);
            }
        }
    }
}
