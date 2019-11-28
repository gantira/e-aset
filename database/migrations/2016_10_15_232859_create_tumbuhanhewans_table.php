<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTumbuhanhewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tumbuhan_hewans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kode_tumbuhanhewan');
            $table->string('nama_tumbuhanhewan');
            $table->string('nomor_register');
            $table->string('jenis_tumbuhanhewan');
            $table->string('ukuran');
            $table->integer('jumlah');
            $table->string('asal_usul');
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
        Schema::drop('tumbuhan_hewans');
    }
}
