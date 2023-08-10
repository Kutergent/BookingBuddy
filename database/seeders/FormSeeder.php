<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Form::create([
            'limit' => 2,
            'range' => 365,
            'phone_number' => true,
            'dob' => true,
            'interval' => 30,
            'open' => '09:00:00',
            'close' => '18:00:00',
            'dp_amt' => 50000,
            'tax_amt' => 10
        ]);
    }
}
