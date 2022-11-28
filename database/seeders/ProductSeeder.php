<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSmartphones();
        $this->createLaptops();
        $this->createHeadphones();
    }

    public function createSmartphones()
    {
        $models = ['XS', '10', '13', 'XR', 'PRO'];
        $name = ['Iphone', 'Samsung', 'Oppo', 'LG', 'Xiaomi'];
        $colors = ['Chrome', 'Gray', 'Black', 'Pink', 'Brown', 'Red'];

        $categoryId = Category::where('name->en', 'Smartphones')->value('id');

        foreach (range(1, rand(10, 20)) as $i) {
            $productModel = fake()->randomElement($models);
            $productName = fake()->randomElement($name) . ' ' . $productModel . ' ' . rand(10, 99);
            $product = Product::create([
                'name' => [
                    'en' => $productName,
                    'ru' => $productName,
                ],
                'description' => [
                    'en' => fake()->text(),
                    'ru' => fake()->text(),
                ],
                'characteristics' => [
                    'weight' => rand(10, 99) . ' ' . 'kg',
                    'color' => fake()->randomElement($colors),
                ],
                'slug' => Str::slug($productName),
                'price' => rand(100, 1000)
            ]);

            $product->categories()->attach($categoryId);
        }
    }

    public function createLaptops()
    {
        $models = ['XS', '10', '13', 'XR', 'PRO'];
        $name = ['Apple', 'Acer', 'Lenovo', 'ASUS', 'HP'];
        $colors = ['Chrome', 'Gray', 'Black', 'White'];

        $categoryId = Category::where('name->en', 'Laptops')->value('id');

        foreach (range(1, rand(10, 20)) as $i) {
            $productModel = fake()->randomElement($models);
            $productName = fake()->randomElement($name) . ' ' . $productModel . ' ' . rand(10, 99);
            $product = Product::create([
                'name' => [
                    'en' => $productName,
                    'ru' => $productName,
                ],
                'description' => [
                    'en' => fake()->text(),
                    'ru' => fake()->text(),
                ],
                'characteristics' => [
                    'weight' => rand(10, 99) . ' ' . 'kg',
                    'color' => fake()->randomElement($colors),
                ],
                'slug' => Str::slug($productName),
                'price' => rand(100, 1000)
            ]);

            $product->categories()->attach($categoryId);
        }
    }

    public function createHeadphones()
    {
        $models = ['AirPods', 'AirDots', 'Buds', 'Tune', 'PRO'];
        $name = ['Apple', 'JBL', 'Xiaomi', 'Sony', 'HyperX'];
        $colors = ['Blues', 'Gray', 'Black', 'White', 'Red'];

        $categoryId = Category::where('name->en', 'Headphones')->value('id');

        foreach (range(1, rand(10, 20)) as $i) {
            $productModel = fake()->randomElement($models);
            $productName = fake()->randomElement($name) . ' ' . $productModel . ' ' . rand(10, 99);
            $product = Product::create([
                'name' => [
                    'en' => $productName,
                    'ru' => $productName,
                ],
                'description' => [
                    'en' => fake()->text(),
                    'ru' => fake()->text(),
                ],
                'characteristics' => [
                    'weight' => rand(10, 99) . ' ' . 'kg',
                    'color' => fake()->randomElement($colors),
                ],
                'slug' => Str::slug($productName),
                'price' => rand(100, 1000)
            ]);

            $product->categories()->attach($categoryId);
        }
    }
}
