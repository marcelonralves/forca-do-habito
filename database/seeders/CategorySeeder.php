<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Grátis',
            'color' => 'red'
        ]);

        Category::create([
            'title' => 'Normal',
            'color' => 'blue'
        ]);

        Category::create([
            'title' => 'Prêmio',
            'color' => 'grey'
        ]);
    }
}
