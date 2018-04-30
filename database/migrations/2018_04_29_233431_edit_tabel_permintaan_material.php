<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTabelPermintaanMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permintaan_material', function (Blueprint $table) {
            $table->dropColumn('id_material');
            $table->dropColumn('qty');
            $table->dropColumn('ket');
        });
        Schema::table('permintaan_material', function (Blueprint $table) {
            $table->integer('kd_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permintaan_material', function (Blueprint $table) {
            $table->integer('id_material')->unsigned();
            $table->integer('qty');
            $table->string('ket');
        });
        Schema::table('permintaan_material', function (Blueprint $table) {
            $table->dropColumn('kd_supplier');
        });
    }
}
