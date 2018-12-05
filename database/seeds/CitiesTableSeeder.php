<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Ciudad de panamá'
        ]);
        City::create([
            'name' => 'Coclé'
        ]);
        City::create([
            'name' => 'Emberá'
        ]);
        City::create([
            'name' => 'Chiriquí'
        ]);
        City::create([
            'name' => 'Los Santos'
        ]);
    }
}