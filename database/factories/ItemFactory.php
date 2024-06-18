<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            // 'bio' => $this->faker->text(rand(10, 50)),
            'size' => $this->faker->randomNumber(4),
            'price' => $this->faker->randomNumber(4),
            'rate' => $this->faker->randomNumber(1),
            'duration' => $this->faker->randomNumber(3),
            'resolution' => $this->faker->randomElement(['480' , '720' ,'1080']),
            'date' => $this->faker->date(),
            'author' => $this->faker->text(rand(10, 50)),
            'lang' => $this->faker->randomElement(['ARABIC' , 'ENGLISH' ,'FRENCH']),
            'category_id' => Category::inRandomOrder()->first()->id,
            'subcategory_id' => SubCategory::inRandomOrder()->first()->id,
        ];
    }
}
