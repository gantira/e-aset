<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Kiba;
use App\Kibb;
use App\Kibc;
use App\Perpustakaan;
use App\Kesenian;
use App\TumbuhanHewan;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_id', 'no_hp', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kiba()
    {
        return $this->hasMany('App\Kiba');
    }

    public function kibb()
    {
        return $this->hasMany('App\Kibb');
    }

    public function kibc()
    {
        return $this->hasMany('App\Kibc');
    }

    public function perpustakaan()
    {
        return $this->hasMany('App\Perpustakaan');
    }

    public function tumbuhanhewan()
    {
        return $this->hasMany('App\TumbuhanHewan');
    }

    public function kesenian()
    {
        return $this->hasMany('App\Kesenian');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile', 'id');
    }

    public function sertifikat()
    {
        return $this->hasMany('App\Sertifikat', 'user_id');
    }

    // Arsip    

    public function arsip_kiba()
    {
        return $this->hasMany('App\Kiba')->where('status', 2);
    }

    public function arsip_kibb()
    {
        return $this->hasMany('App\Kibb')->where('status', 2);
    }

    public function arsip_kibc()
    {
        return $this->hasMany('App\Kibc')->where('status', 2);
    }

    public function arsip_perpustakaan()
    {
        return $this->hasMany('App\Perpustakaan')->where('status', 2);
    }

    public function arsip_tumbuhanhewan()
    {
        return $this->hasMany('App\TumbuhanHewan')->where('status', 2);
    }

    public function arsip_kesenian()
    {
        return $this->hasMany('App\Kesenian')->where('status', 2);
    }


}
