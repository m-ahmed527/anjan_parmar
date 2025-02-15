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
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
            ],
            [
                'name' => 'Clothing & Apparel',
                'slug' => 'clothing-apparel',
            ],
            [
                'name' => 'Home & Household Appliances',
                'slug' => 'home-household-appliances',

            ],
            [
                'name' => 'Glassware & Kitchenware',
                'slug' => 'glassware-kitchenware',
            ],
            [
                'name' => 'Food & Groceries',
                'slug' => 'food-groceries'
            ],
            [
                'name' => 'Health & Beauty',
                'slug' => 'health-beauty'
            ],


            [
                'name' => 'Automative & Accessories',
                'slug' => 'automotive-accessories'
            ],
            [
                'name' => 'Sports & Outdoor',

                'slug' => 'sports-outdoor'

            ],
            [
                'name' => 'Books & Media',

                'slug' => 'books-media'
            ],
            [
                'name' => 'Pet Supplies',

                'slug' => 'pet-supplies'
            ],
        ];

        // foreach ($categories as $category) {
        Category::insert($categories);
        // }
    }
}
