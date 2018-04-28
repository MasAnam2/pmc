<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTabelPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn('no_inv');
            $table->dropColumn('no_fp');
            $table->dropColumn('ppn');
            $table->dropColumn('ttl_byr');
            $table->dropColumn('no_pen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->string('no_inv');
            $table->string('no_fp');
            $table->string('ppn');
            $table->string('ttl_byr');
            $table->string('no_pen');
        });
    }
}
