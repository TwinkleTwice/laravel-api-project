<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data = [
            [
                'name' => ['en' => 'Smartphones', 'ru' => 'Смартфоны'],
            ],
            [
                'name' => ['en' => 'Laptops', 'ru' => 'Ноутбуки'],
            ],
            [
                'name' => ['en' => 'Headphones', 'ru' => 'Наушники'],
            ],
        ];

        foreach (range(0, 2) as $i) {
            $item_data = $data[$i];
            Category::create($item_data);
        }
    }
}
