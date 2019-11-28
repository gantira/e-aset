<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $fillable = [
    	'user_id', 'deskripsi', 'file'
    ];

    public function profile()
    {
    	return $this->belongsTo('App\Profile', 'user_id');
    }
}
