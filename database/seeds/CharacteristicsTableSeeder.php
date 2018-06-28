<?php

use Illuminate\Database\Seeder;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characteristics = [
            ['name' => 'Size'],
            ['name' => 'Color'],
            ['name' => 'Weight'],
            ['name' => 'Shape'],
            ['name' => 'Quality'],
            ['name' => 'Fashion Line'],
        ];

        foreach($characteristics as $characteristic) {
            DB::table('characteristics')->insert([
                'name' => $characteristic['name'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
