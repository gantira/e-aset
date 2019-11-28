<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKibbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kibbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('register');
            $table->string('ukuran');
            $table->string('bahan');
            $table->string('nomor');
            $table->string('asal_usul');
            $table->integer('harga');
            $table->date('tanggal');
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
        Schema::drop('kibbs');
    }
}
