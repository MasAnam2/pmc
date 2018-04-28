<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('no_pb');
            $table->date('tgl_pb');
            $table->string('nm_peru');
            $table->string('bank');
            $table->text('almt_bank');
            $table->string('no_rek');
            $table->string('no_inv');
            $table->string('no_fp');
            $table->integer('ppn');
            $table->double('ttl_byr');
            $table->integer('no_pen')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
