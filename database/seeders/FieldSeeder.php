<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Field::create([
            'reservations_id' => 1,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 2,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 3,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 4,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 5,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 6,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 7,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 8,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 9,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

        Field::create([
            'reservations_id' => 10,
            'formextra_id' => 1,
            'textbox' => 'MASUK WOE!!!'
        ]);

    }
}
