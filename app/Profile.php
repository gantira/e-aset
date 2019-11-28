<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'nama_sekolah', 'status', 'nss', 'jenis', 'tahun_pendirian', 'kurikulum', 'kepsek', 'komsek', 'luas_m2', 'alamat'
    ];


    public function chat()
    {
    	return $this->hasMany('App\Chat');
    }
}
