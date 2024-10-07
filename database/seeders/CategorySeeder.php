<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'web development',
            'slug' => 'web-development',
            'color' => 'red',
        ]);
        Category::create([
            'name' => 'web Design',
            'slug' => 'web-design',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'green'
        ]);
        Category::create([
            'name' => 'Game Desgin',
            'slug' => 'game-design',
            'color' => 'yellow'
        ]);
    }
}
