<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $shortName = fake()->sentence(rand(1, 2));
        $colors = ['Chrome', 'Gray', 'Black', 'Pink', 'Brown', 'Red'];

        return [
            'name' => [
                'en' => $shortName,
                'ru' => $shortName,
            ],
            'description' => [
                'en' => fake()->text(),
                'ru' => fake()->text(),
            ],
            'characteristics' => [
                'weight' => rand(10, 99) . ' ' . 'kg',
                'color' => fake()->randomElement($colors),
            ],
            'slug' => Str::slug($shortName),
            'price' => rand(100, 1000)
        ];
    }
}
