<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [
    	'user_id',  'file_name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
