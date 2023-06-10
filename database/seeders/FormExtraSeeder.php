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
            'name' => 'Additional note 1',
            'textbox' => 'Tipenya ya Textbox 1',
            'enabled' => true
        ]);

        FormExtra::create([
            'forms_id' => 1,
            'name' => 'Additional note 2',
            'textbox' => 'Tipenya ya Textbox 2',
            'enabled' => true
        ]);

        FormExtra::create([
            'forms_id' => 1,
            'name' => 'Additional note 3',
            'textbox' => 'Tipenya ya Textbox 3',
            'enabled' => true
        ]);
    }
}
