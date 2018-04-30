<?php

use Illuminate\Database\Seeder;

class PurchaseOrderTableSeeder extends Seeder
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
    	DB::table('po')->truncate();
    	$supplier = DB::table('supplier')->pluck('kd_supplier')->toArray();
    	$material = DB::table('material')->pluck('kd_material')->toArray();
    	foreach (range(1, 12) as $a) {
    		$data = [];
    		$bulan = $a;
    		if($a < 10){
    			$bulan = '0'.$a;
    		}
    		foreach (range(1, $faker->numberBetween(20, 90)) as $i) {
    			$data[] = [
    				'tgl_po'		=> date('Y-'.$bulan.'-'.$faker->randomElement(range(10, 28))),
    				'kd_supplier'	=> $faker->randomElement($supplier)
    			];	
    		}
    		DB::table('po')->insert($data);
    	}
    	$po = DB::table('po')->get();
    	$detail_po = [];
    	foreach ($po as $p) {
    		foreach (range(1, $faker->numberBetween(10, 20)) as $i) {
    			$detail_po[] = [
    				'kd_material'	=> $faker->randomElement($material),
    				'qty'			=> $faker->numberBetween(10, 1000),
    				'no_po'			=> $p->no_po,
    			];
    		}
    	}
    	DB::table('detail_po')->truncate();
    	foreach (array_chunk($detail_po, 10) as $dpo) {
    		DB::table('detail_po')->insert($dpo);
    	}
    }
}
