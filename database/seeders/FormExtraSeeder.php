<?php

namespace Database\Seeders;

use App\Models\FormExtra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormExtra::create([
            'forms_id' => 1,
            'name' => 'Studio Type',
            'enabled' => true
        ]);

        FormExtra::create([
            'forms_id' => 1,
            'name' => 'Number of People',
            'enabled' => false
        ]);
    }
}
