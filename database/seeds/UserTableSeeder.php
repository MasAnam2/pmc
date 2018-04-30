<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
    	DB::table('user')->truncate();
    	$data = [];
    	foreach (range(1, 50) as $i) {
    		$username = $faker->unique()->username;
    		$data[] = [
    			'username'			=> $username,
    			'password'			=> bcrypt($username),
    			'hak_akses'			=> $faker->randomElement([
    				'Semua', 'Gudang', 'Departemen', 'Purchasing', 'Accounting', 'Direktur',
    			])
    		];
    	}
    	$users = [
    		[
    			'name'		=> 'admin',
    			'hak_akses'	=> 'Semua',
    		],
    		[
    			'name'		=> 'gudang',
    			'hak_akses'	=> 'Gudang',
    		],
    		[
    			'name'		=> 'departemen',
    			'hak_akses'	=> 'Departemen',
    		],
    		[
    			'name'		=> 'purchasing',
    			'hak_akses'	=> 'Purchasing',
    		],
    		[
    			'name'		=> 'accounting',
    			'hak_akses'	=> 'Accounting',
    		],
    		[
    			'name'		=> 'direktur',
    			'hak_akses'	=> 'Direktur',
    		]
    	];
    	$dt = [];
    	foreach ($users as $u) {
    		$dt[] = [
    			'username'	=> $u['name'],
    			'password'	=> bcrypt($u['name']),
    			'hak_akses' => $u['hak_akses']	
    		];
    	}
    	DB::table('user')->insert($dt+$data);
    }
}
