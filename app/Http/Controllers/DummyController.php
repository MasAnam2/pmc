<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DummyController extends Controller
{
	public function generateUser()
	{
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
		$data = [];
		foreach ($users as $u) {
			User::updateOrCreate([
				'username'	=> $u['name']
			], [
				'password'	=> bcrypt($u['name']),
				'hak_akses' => $u['hak_akses']	
			]);
		}
		return 'generate user berhasil';
	}
}
