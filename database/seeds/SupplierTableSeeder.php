<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
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
        DB::table('supplier')->truncate();
        $data = [];
        foreach (range(1, 100) as $i) {
        	$data[] = [
        		'nm_supplier'	=> $faker->company,
        		'almat'			=> $faker->address,
        		'no_telp'		=> $faker->phoneNumber,
        		'fax'			=> $faker->numberBetween(100000, 999999),
        		'email'			=> $faker->unique()->email
        	];
        }
        DB::table('supplier')->insert($data);
    }
}
