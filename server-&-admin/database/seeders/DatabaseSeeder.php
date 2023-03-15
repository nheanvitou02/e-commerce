<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //product
        // for ($j = 1; $j <= 10; $j++) {
            // \App\Models\Category::create([
            //     "image" => 'https://picsum.photos/200?random=' . $j,
            //     "name" => 'Category-' . $j,
            //     "slug" => 'category-' . $j,
            // ]);
            // \App\Models\Brand::create([
            //     "image" => 'https://picsum.photos/200?random=' . $j++,
            //     "name" => 'Brand-' . $j,
            //     "slug" => 'brand-' . $j,
            // ]);
        // }

        for ($i = 1; $i <= 5; $i++) {
            \App\Models\Product::create([
                "image" => 'https://picsum.photos/200?random=' . $i,
                "title" => 'product-' . $i,
                "category_id" => $i,
                "slug" => 'product-' . $i,
                "level" => $i % 3 == 1 ? "top" : "medium",
                "brand_id" => $i,
                "content" => '<p>product-' . $i . '</p>',
                "price" => 10 + $i,
                "discount" => 0,
            ]);
        }
    }
}
