<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;

class PengaturanController extends Controller
{

	public function setSkin(Request $r)
	{
		Pengaturan::updateOrCreate([
			'key'	=> 'skin'
		], [
			'value'	=> [
				'skin' => $r->skin,
				'user'	=> ''
			],
		]);
		return 'sukses';
	}

}
