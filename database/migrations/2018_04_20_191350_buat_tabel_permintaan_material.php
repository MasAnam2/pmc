<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPermintaanMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_material', function (Blueprint $table) {
            $table->increments('no_pm');
            $table->date('tgl_pm'); 
            $table->text('almt_pm');
            $table->text('ket'); 
            $table->integer('qty'); 
            $table->integer('id_user')->unsigned();
            $table->integer('id_material')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_material');
    }
}
