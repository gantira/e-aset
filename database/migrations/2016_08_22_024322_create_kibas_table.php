<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKibasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kibas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('register');
            $table->string('luas_m2');
            $table->string('tanah_pengadaan');
            $table->string('status_tanah');
            $table->string('letak_alamat');
            $table->string('penggunaan');
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
        Schema::drop('kibas');
    }
}
