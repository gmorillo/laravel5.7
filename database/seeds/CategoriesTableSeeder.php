<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Escort'
        ]);
        Category::create([
            'name' => 'Gay'
        ]);
        Category::create([
            'name' => 'Trans'
        ]);
        Category::create([
            'name' => 'Agencias'
        ]);
        Category::create([
            'name' => 'Clubs'
        ]);
    }
}
