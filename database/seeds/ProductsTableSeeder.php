<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makeFood();
        $this->makeDrugs();
        $this->makeCars();
    }

    public function makeFood() {
        $faker = Faker::create();

        $foodId = DB::table('categories')->where('name', 'Food')->value('id');
        $healthId = DB::table('categories')->where('name', 'Health')->value('id');

        $sizeId = DB::table('characteristics')->where('name', 'Size')->value('id');
        $weightId = DB::table('characteristics')->where('name', 'Weight')->value('id');

        $food = [
            'Pasta - Fett Alfredo, Single Serve',
            'Ecolab - Balanced Fusion',
            'Sauce - Cranberry',
            'Flour Pastry Super Fine',
            'Beer - Labatt Blue',
            'Chilli Paste, Sambal Oelek',
            'Crush - Cream Soda',
            'Table Cloth 120 Round White',
            'Mushroom - Chanterelle Frozen',
            'Hot Chocolate - Individual',
            'Energy Drink Red Bull',
            'Cheese - Havarti, Roasted Garlic',
            'Wine - Saint - Bris 2002, Sauv',
            'Wine - Chateau Bonnet',
        ];

        for($i = 0; $i < count($food); $i++) {
            $id = DB::table('products')->insertGetId([
                'name' => $food[$i],
                'description' => $faker->text(100),
                'image_path' => $faker->imageUrl(800, 600, 'food'),
                'price' => $faker->randomFloat(2, 8, 90),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_categories')->insert([
                'product_id' => $id,
                'category_id' => $foodId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
                
            //Two arrays on the insert function weren't being persisted for some reason
            DB::table('product_categories')->insert([
                'product_id' => $id,
                'category_id' => $healthId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_characteristics')->insert([
                'product_id' => $id,
                'characteristic_id' => $sizeId,
                'value' => (string)$faker->randomFloat(2, 1, 50),
                'value_type' => 'centimeters',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_characteristics')->insert([
                'product_id' => $id,
                'characteristic_id' => $weightId,
                'value' => (string)$faker->randomFloat(2, 1, 1000),
                'value_type' => 'grams',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function makeDrugs() {
        $faker = Faker::create();

        $beautyId = DB::table('categories')->where('name', 'Beauty')->value('id');
        $healthId = DB::table('categories')->where('name', 'Health')->value('id');

        $drugs = [
            'SEROQUEL',
            'TOLMETIN SODIUM',
            'Benazepril Hydrochloride and Hydrochlorothiazide',
            'Sodium Sulfacetamide',
            'Varithena',
            'Lamotrigine',
            'BRISDELLE',
            'hydroxyzine pamoate',
            'Black Cottonwood Pollen',
            'LBEL',
            'BOBBI BROWN SKIN FOUNDATION',
            'BENZONATATE',
            'Hydrocodone Bitartate and Acetaminophen',
            'Amlodipine Besylate and Benazepril Hydrochloride',
            'Nicotine',
        ];

        for($i = 0; $i < count($drugs); $i++) {
            $id = DB::table('products')->insertGetId([
                'name' => $drugs[$i],
                'description' => $faker->text(100),
                'image_path' => $faker->imageUrl(800, 600, 'nature'),
                'price' => $faker->randomFloat(2, 8, 90),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_categories')->insert([
                'product_id' => $id,
                'category_id' => $beautyId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
                
            //Two arrays on the insert function weren't being persisted for some reason
            DB::table('product_categories')->insert([
                'product_id' => $id,
                'category_id' => $healthId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function makeCars() {
        $faker = Faker::create();

        $automotiveId = DB::table('categories')->where('name', 'Automotive')->value('id');

        $weightId = DB::table('characteristics')->where('name', 'Weight')->value('id');
        $colorId = DB::table('characteristics')->where('name', 'Color')->value('id');

        $cars = [
            'Blazer',
            'Legacy',
            'Tacoma',
            'Tundra',
            'Galant',
            'SL-Class',
            'X5',
            'Mustang',
            'Discovery',
            'Park Avenue',
            'Discovery Series II',
            'SC',
            'Optima',
            '300ZX',
            'Caravan',
        ];

        for($i = 0; $i < count($cars); $i++) {
            $id = DB::table('products')->insertGetId([
                'name' => $cars[$i],
                'description' => $faker->text(100),
                'image_path' => $faker->imageUrl(800, 600, 'transport'),
                'price' => $faker->randomFloat(2, 8, 90),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_categories')->insert([
                'product_id' => $id,
                'category_id' => $automotiveId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_characteristics')->insert([
                'product_id' => $id,
                'characteristic_id' => $weightId,
                'value' => (string)$faker->randomFloat(2, 1000, 3500),
                'value_type' => 'kilogram',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            DB::table('product_characteristics')->insert([
                'product_id' => $id,
                'characteristic_id' => $colorId,
                'value' => $faker->colorName(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
