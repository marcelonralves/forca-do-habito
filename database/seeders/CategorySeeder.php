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
        Category::create(['title' => 'Grátis']);
        Category::create(['title' => 'Normal']);
        Category::create(['title' => 'Prêmio']);
    }
}
