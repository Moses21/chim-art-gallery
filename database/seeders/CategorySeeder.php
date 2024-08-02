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
        Category::create(['name' => 'Artworks','description' => 'Artworks']);
        Category::create(['name' => 'Paintings','description' => 'Paintings']);
        Category::create(['name' => 'Tshirts','description' => 'Tshirts']);
        Category::create(['name' => 'Pencil Sketches','description' => 'Pencil Sketches']);
        Category::create(['name' => 'Portraits','description' => 'Portraits']);
        Category::create(['name' => 'Graffiti','description' => ' Graffiti']);
    }
}
