<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class relationseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tableone::create([
            'name' => 'abc',
            'address' => 'xyz',
        ]);
        tabletwo::create([
            'email' => 'abc@gmail.com',
            'one_id' => '1',
        ]);
    }
}