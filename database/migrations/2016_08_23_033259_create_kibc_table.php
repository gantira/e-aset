<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKibcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kibcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('kode_bangunan');
            $table->string('nama_bangunan');
            $table->string('register');
            $table->string('kondisi');
            $table->string('konstruksi1');
            $table->string('konstruksi2');
            $table->string('luas_m2');
            $table->string('letak_alamat');
            $table->string('status_tanah');
            $table->string('nomor_kode_tanah');
            $table->string('asal_usul');
            $table->integer('harga');
            $table->date('tanggal_pembangunan');
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
        Schema::drop('kibcs');
    }
}
