<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('material')->truncate();
        $data = [];
        foreach (range(1, 100) as $i) {
        	$data[] = [
        		'nm_material'	=> str_random($faker->randomDigit).' '.str_random($faker->randomDigit),
        		'hrg_stn'		=> $faker->numberBetween(10000, 5000000),
        	];
        }
        DB::table('material')->insert($data);
    }
}
