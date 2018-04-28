<?php

Auth::routes();

Route::redirect('/', 'user');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['harus_login']], function(){
	
	// Route::redirect('/', '/user');

	# MODUL USER
	Route::prefix('user')->group(function(){
		Route::get('/', 'UserController@index')->name('user');
		Route::post('/', 'UserController@tambah')->name('user.tambah');
		Route::delete('/{id_user}', 'UserController@hapus')->name('user.hapus');
		Route::get('/{id_user}/ubah', 'UserController@ubah')->name('user.ubah');
		Route::put('/{id_user}', 'UserController@perbarui')->name('user.perbarui');
	});

	# MODUL SUPPLIER
	Route::prefix('supplier')->group(function(){
		Route::get('/', 'SupplierController@index')->name('supplier');
		Route::post('/', 'SupplierController@tambah')->name('supplier.tambah');
		Route::delete('/{kd_supplier}', 'SupplierController@hapus')->name('supplier.hapus');
		Route::get('/{kd_supplier}/ubah', 'SupplierController@ubah')->name('supplier.ubah');
		Route::put('/{kd_supplier}', 'SupplierController@perbarui')->name('supplier.perbarui');
	});

	# MODUL MATERIAL
	Route::prefix('material')->group(function(){
		Route::get('/', 'MaterialController@index')->name('material');
		Route::post('/', 'MaterialController@tambah')->name('material.tambah');
		Route::delete('/{kd_material}', 'MaterialController@hapus')->name('material.hapus');
		Route::get('/{kd_material}/ubah', 'MaterialController@ubah')->name('material.ubah');
		Route::put('/{kd_material}', 'MaterialController@perbarui')->name('material.perbarui');
	});

	# MODUL PENERIMAAN MATERIAL
	Route::prefix('penerimaan-material')->group(function(){
		Route::get('/', 'PenerimaanMaterialController@index')->name('p_material');
		Route::post('/', 'PenerimaanMaterialController@tambah')->name('p_material.tambah');
		Route::delete('/{kd_p_material}', 'PenerimaanMaterialController@hapus')->name('p_material.hapus');
		Route::get('/{kd_p_material}/ubah', 'PenerimaanMaterialController@ubah')->name('p_material.ubah');
		Route::put('/{kd_p_material}', 'PenerimaanMaterialController@perbarui')->name('p_material.perbarui');
	});

	# MODUL PERKIRAAN
	Route::prefix('perkiraan')->group(function(){
		Route::get('/', 'PerkiraanController@index')->name('perkiraan');
		Route::post('/', 'PerkiraanController@tambah')->name('perkiraan.tambah');
		Route::delete('/{kd_perkiraan}', 'PerkiraanController@hapus')->name('perkiraan.hapus');
		Route::get('/{kd_perkiraan}/ubah', 'PerkiraanController@ubah')->name('perkiraan.ubah');
		Route::put('/{kd_perkiraan}', 'PerkiraanController@perbarui')->name('perkiraan.perbarui');
	});

	# MODUL JURNAL
	Route::prefix('jurnal')->group(function(){
		Route::get('/', 'JurnalController@index')->name('jurnal');
		Route::post('/', 'JurnalController@tambah')->name('jurnal.tambah');
		Route::delete('/{kd_jurnal}', 'JurnalController@hapus')->name('jurnal.hapus');
		Route::get('/{kd_jurnal}/ubah', 'JurnalController@ubah')->name('jurnal.ubah');
		Route::put('/{kd_jurnal}', 'JurnalController@perbarui')->name('jurnal.perbarui');
	});

	# MODUL PURCHASE ORDER
	Route::prefix('purchase-order')->group(function(){
		Route::get('/', 'PurchaseOrderController@index')->name('po');
		Route::post('/', 'PurchaseOrderController@tambah')->name('po.tambah');
		Route::delete('/{no_po}', 'PurchaseOrderController@hapus')->name('po.hapus');
		Route::get('/{no_po}/ubah', 'PurchaseOrderController@ubah')->name('po.ubah');
		Route::put('/{no_po}', 'PurchaseOrderController@perbarui')->name('po.perbarui');
		Route::get('/{no_po}/cetak', 'PurchaseOrderController@cetak')->name('po.cetak');
		Route::get('/total-order/{no_po}', 'PurchaseOrderController@totalOrder');
	});

	# MODUL PEMBAYARAN
	Route::prefix('pembayaran')->group(function(){
		Route::get('/', 'PembayaranController@index')->name('pembayaran');
		Route::post('/', 'PembayaranController@tambah')->name('pembayaran.tambah');
		Route::delete('/{no_pembayaran}', 'PembayaranController@hapus')->name('pembayaran.hapus');
		Route::get('/{no_pembayaran}/ubah', 'PembayaranController@ubah')->name('pembayaran.ubah');
		Route::put('/{no_pembayaran}', 'PembayaranController@perbarui')->name('pembayaran.perbarui');
		Route::get('/{no_pembayaran}/cetak', 'PembayaranController@cetak')->name('pembayaran.cetak');
		Route::get('/total-order/{no_po}', 'PembayaranController@totalOrder');
	});

});

Route::get('/generate-user', 'DummyController@generateUser');