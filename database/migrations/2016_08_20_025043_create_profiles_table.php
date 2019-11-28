<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sekolah')->nullable();
            $table->string('status');
            $table->string('nss');
            $table->string('jenis');
            $table->string('tahun_pendirian');
            $table->string('kurikulum');
            $table->string('kepsek');
            $table->string('komsek');
            $table->string('luas_m2');
            $table->string('alamat');
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
        Schema::drop('profiles');
    }
}
