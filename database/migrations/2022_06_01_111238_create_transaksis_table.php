<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan_makanan_minuman');
            $table->string('kode_transaksi');
            $table->integer('total_item');
            $table->date('tanggal_pemesanan_makanan_minuman');
            $table->integer('total_pembayaran');
            $table->string('status');
            $table->string('nama_penerima')->nullable();
            $table->string('nomor_telephone')->nullable();
            $table->string('note')->nullable();
            $table->Integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
