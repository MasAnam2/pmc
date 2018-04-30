<?php

use Illuminate\Database\Seeder;
use App\PurchaseOrder;

class PembayaranTableSeeder extends Seeder
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
    	DB::table('pembayaran')->truncate();
    	foreach (range(1, 12) as $a) {
    		$data = [];
    		$bulan = $a;
    		if($a < 10){
    			$bulan = '0'.$a;
    		}
    		foreach (range(1, $faker->numberBetween(20, 90)) as $i) {
    			$data[] = [
    				'tgl_pb'		=> date('Y-'.$bulan.'-'.$faker->randomElement(range(10, 28))),
    				'nm_peru'		=> $faker->company,
    				'bank'			=> $faker->randomElement(['BNI', 'BRI', 'BCA', 'BTN', 'MEGA', 'MANDIRI']),
    				'almt_bank'		=> $faker->address, 
    				'no_rek'		=> $faker->numberBetween(10000000, 99999999),
    			];	
    		}
    		DB::table('pembayaran')->insert($data);
    	}
    	$pembayaran = DB::table('pembayaran')->get();
    	$po = PurchaseOrder::with('detail')->get()->toArray();
    	$detail_pembayaran = [];
    	foreach ($pembayaran as $p) {
    		foreach (range(1, $faker->numberBetween(10, 20)) as $i) {
    			$poo = array_random($po);
    			$detail_pembayaran[] = [
    				'no_pb'			=> $p->no_pb,
    				'no_invoice'	=> $faker->numberBetween(10000000, 99999999),
    				'no_po'			=> $poo['no_po'],
    				'no_fp'			=> $faker->numberBetween(10000000, 99999999),
    				'tagihan'		=> $poo['total'],
    				'ppn'			=> $poo['total']*0.1,
    				'total_bayar'	=> $poo['total']*1.1,
    			];
    		}
    	}
    	DB::table('detail_pembayaran')->truncate();
    	foreach (array_chunk($detail_pembayaran, 10) as $dp) {
    		DB::table('detail_pembayaran')->insert($dp);
    	}
    }
}
