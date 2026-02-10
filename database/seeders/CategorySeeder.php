<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['category_name' => 'General']);
        Category::create(['category_name' => 'Announcements']);
        Category::create(['category_name' => 'Questions / Help']);
        Category::create(['category_name' => 'Discussion']);
        Category::create(['category_name' => 'News & Updates']);
        Category::create(['category_name' => 'Events']);
    }
}

