<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Food'],
            ['name' => 'Beauty & Health'],
            ['name' => 'Automotive'],
            ['name' => 'Furniture'],
            ['name' => 'Clothing'],
            ['name' => 'Shoes'],
            ['name' => 'Electronics'],
            ['name' => 'Books'],
        ];

        foreach($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
