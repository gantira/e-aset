<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerpustakaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpustakaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kode_buku');
            $table->string('nama_buku');
            $table->string('pengarang');
            $table->string('penerima');
            $table->integer('keluar');
            $table->integer('sisa');
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
        Schema::drop('perpustakaans');
    }
}
