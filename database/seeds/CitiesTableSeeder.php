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
            'country_id' => '1',
            'name' => 'Ciudad de panamá'
        ]);
        City::create([
            'country_id' => '1',
            'name' => 'Coclé'
        ]);
        City::create([
            'country_id' => '1',
            'name' => 'Emberá'
        ]);
        City::create([
            'country_id' => '1',
            'name' => 'Chiriquí'
        ]);
        City::create([
            'country_id' => '1',
            'name' => 'Los Santos'
        ]);
    }
}