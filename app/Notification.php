<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'pesan'
    ];

    public function profile()
    {
    	return $this->belongsTo('App\Profile', 'user_id');
    }

    
}