<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            ['name' => 'Action', 'category' => 'Movie'],
            ['name' => 'War', 'category' => 'Movie'],
            ['name' => 'Romantic', 'category' => 'Movie'],
            ['name' => 'Comedy', 'category' => 'Movie'],
            ['name' => 'Programming', 'category' => 'Course'],
            ['name' => 'Design', 'category' => 'Course'],
            ['name' => 'Action', 'category' => 'Game'],
            ['name' => 'War', 'category' => 'Game'],
            ['name' => 'Anime', 'category' => 'Series'],
            ['name' => 'Turkey', 'category' => 'Series'],
            ['name' => 'Arabic', 'category' => 'Series'],
        ];

        foreach ($subcategories as $subcategory) {
            $category = Category::where('name', $subcategory['category'])->first();

            if ($category) {
                SubCategory::create([
                    'name' => $subcategory['name'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
