<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeseniansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesenians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('nomor_register');
            $table->string('jenis_barang');
            $table->string('ukuran');
            $table->string('jumlah');
            $table->string('aktivasi_dana');
            $table->date('tanggal');
            $table->integer('harga');
            $table->text('keterangan');
            $table->text('komentar');
            $table->enum('status', ['Inprogress', 'Approved', 'Ignored']);
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
        Schema::drop('kesenians');
    }
}
