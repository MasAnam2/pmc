<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('beranda');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dasbor', 'HomeController@index')->name('dasbor');

Route::group(['middleware' => ['harus_login']], function(){

	# MODUL USER
	Route::middleware(['hak_akses:Purchasing,Semua'])->prefix('user')->group(function(){
		Route::get('/', 'UserController@index')->name('user');
		Route::post('/', 'UserController@tambah')->name('user.tambah');
		Route::delete('/{id_user}', 'UserController@hapus')->name('user.hapus');
		Route::get('/{id_user}/ubah', 'UserController@ubah')->name('user.ubah');
		Route::put('/{id_user}', 'UserController@perbarui')->name('user.perbarui');
	});

	# MODUL SUPPLIER
	Route::middleware(['hak_akses:Purchasing,Semua'])->prefix('supplier')->group(function(){
		Route::get('/', 'SupplierController@index')->name('supplier');
		Route::post('/', 'SupplierController@tambah')->name('supplier.tambah');
		Route::delete('/{kd_supplier}', 'SupplierController@hapus')->name('supplier.hapus');
		Route::get('/{kd_supplier}/ubah', 'SupplierController@ubah')->name('supplier.ubah');
		Route::put('/{kd_supplier}', 'SupplierController@perbarui')->name('supplier.perbarui');
	});

	# MODUL MATERIAL
	Route::middleware(['hak_akses:Gudang,Semua'])->prefix('material')->group(function(){
		Route::get('/', 'MaterialController@index')->name('material');
		Route::post('/', 'MaterialController@tambah')->name('material.tambah');
		Route::delete('/{material}', 'MaterialController@hapus')->name('material.hapus');
		Route::get('/{material}/ubah', 'MaterialController@ubah')->name('material.ubah');
		Route::put('/{material}', 'MaterialController@perbarui')->name('material.perbarui');
	});

	# MODUL PENERIMAAN MATERIAL
	Route::middleware(['hak_akses:Gudang,Semua'])->prefix('penerimaan-material')->group(function(){
		Route::get('/', 'PenerimaanMaterialController@index')->name('p_material');
		Route::post('/', 'PenerimaanMaterialController@tambah')->name('p_material.tambah');
		Route::delete('/{pm}', 'PenerimaanMaterialController@hapus')->name('p_material.hapus');
		Route::get('/{pm}/ubah', 'PenerimaanMaterialController@ubah')->name('p_material.ubah');
		Route::put('/{pm}', 'PenerimaanMaterialController@perbarui')->name('p_material.perbarui');
	});

	# MODUL PERMINTAAN MATERIAL
	Route::middleware(['hak_akses:Departemen,Semua'])->prefix('permintaan-material')->group(function(){
		Route::get('/', 'PermintaanMaterialController@index')->name('permintaan');
		Route::post('/', 'PermintaanMaterialController@tambah')->name('permintaan.tambah');
		Route::delete('/{permintaan}', 'PermintaanMaterialController@hapus')->name('permintaan.hapus');
		Route::get('/{permintaan}/ubah', 'PermintaanMaterialController@ubah')->name('permintaan.ubah');
		Route::put('/{permintaan}', 'PermintaanMaterialController@perbarui')->name('permintaan.perbarui');
		Route::get('/{permintaan}/cetak', 'PermintaanMaterialController@cetak')->name('permintaan.cetak');
	});

	# MODUL PERKIRAAN
	Route::middleware(['hak_akses:Accounting,Semua'])->prefix('perkiraan')->group(function(){
		Route::get('/', 'PerkiraanController@index')->name('perkiraan');
		Route::post('/', 'PerkiraanController@tambah')->name('perkiraan.tambah');
		Route::delete('/{perkiraan}', 'PerkiraanController@hapus')->name('perkiraan.hapus');
		Route::get('/{perkiraan}/ubah', 'PerkiraanController@ubah')->name('perkiraan.ubah');
		Route::put('/{perkiraan}', 'PerkiraanController@perbarui')->name('perkiraan.perbarui');
	});

	# MODUL JURNAL
	Route::middleware(['hak_akses:Accounting,Semua'])->prefix('jurnal')->group(function(){
		Route::get('/', 'JurnalController@index')->name('jurnal');
		Route::post('/', 'JurnalController@tambah')->name('jurnal.tambah');
		Route::delete('/{jurnal}', 'JurnalController@hapus')->name('jurnal.hapus');
		Route::get('/{jurnal}/ubah', 'JurnalController@ubah')->name('jurnal.ubah');
		Route::put('/{jurnal}', 'JurnalController@perbarui')->name('jurnal.perbarui');
	});

	# MODUL PURCHASE ORDER
	Route::middleware(['hak_akses:Purchasing,Semua'])->prefix('purchase-order')->group(function(){
		Route::get('/', 'PurchaseOrderController@index')->name('po');
		Route::post('/', 'PurchaseOrderController@tambah')->name('po.tambah');
		Route::delete('/{no_po}', 'PurchaseOrderController@hapus')->name('po.hapus');
		Route::get('/{no_po}/ubah', 'PurchaseOrderController@ubah')->name('po.ubah');
		Route::put('/{no_po}', 'PurchaseOrderController@perbarui')->name('po.perbarui');
		Route::get('/{no_po}/cetak', 'PurchaseOrderController@cetak')->name('po.cetak');
	});
	Route::middleware(['hak_akses:Semua,Gudang'])->prefix('purchase-order')->group(function(){
		Route::get('/total-order/{no_po}', 'PurchaseOrderController@totalOrder');
	});
	Route::middleware(['hak_akses:Semua,Accounting'])->prefix('purchase-order')->group(function(){
		Route::get('/total-bayar/{no_po}', 'PurchaseOrderController@totalBayar');
	});

	# MODUL PEMBAYARAN
	Route::middleware(['hak_akses:Accounting,Semua'])->prefix('pembayaran')->group(function(){
		Route::get('/', 'PembayaranController@index')->name('pembayaran');
		Route::post('/', 'PembayaranController@tambah')->name('pembayaran.tambah');
		Route::delete('/{no_pembayaran}', 'PembayaranController@hapus')->name('pembayaran.hapus');
		Route::get('/{no_pembayaran}/ubah', 'PembayaranController@ubah')->name('pembayaran.ubah');
		Route::put('/{no_pembayaran}', 'PembayaranController@perbarui')->name('pembayaran.perbarui');
		Route::get('/{no_pembayaran}/cetak', 'PembayaranController@cetak')->name('pembayaran.cetak');
	});

	# MODUL PEMBAYARAN
	Route::middleware(['hak_akses:Direktur,Semua'])->prefix('laporan')->group(function(){
		Route::get('/pembelian', 'LaporanController@pembelian')->name('lap_pembelian');
		Route::get('/pembelian/cetak', 'LaporanController@pembelianCetak')->name('lap_pembelian.cetak');
		Route::get('/pembayaran', 'LaporanController@pembayaran')->name('lap_pembayaran');
		Route::get('/pembayaran/cetak', 'LaporanController@pembayaranCetak')->name('lap_pembayaran.cetak');
	});

	# MODUL PENGATURAN
	Route::post('/pengaturan/set-skin', 'PengaturanController@setSkin')->name('pengaturan.set_skin');

});

// Route::get('/generate-user', 'DummyController@generateUser');