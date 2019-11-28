<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kibc extends Model
{
    protected $fillable = [
        'user_id', 'nama_bangunan', 'kode_bangunan', 'register', 'kondisi', 'konstruksi1', 'konstruksi2', 'luas_m2', 'letak_alamat', 'status_tanah', 'nomor_kode_tanah', 'asal_usul', 'harga', 'tanggal_pembangunan', 'keterangan', 'created_at'
    ];

    public function profile()
    {
        return $this->belongsTo('App\Profile', 'user_id');
    }

    public function kiba()
    {
        return $this->belongsTo('App\Kiba', 'user_id');
    }

    public function scopeLaporan($query, $periode = null, $tahun = null)
    {
        if ($periode==1) {
            return $query->whereMonth('tanggal_pembangunan', '>=', 1)->whereMonth('tanggal_pembangunan', '<=', 3)->whereYear('tanggal_pembangunan', '=', $tahun);
        }else if ($periode==2) {
            return $query->whereMonth('tanggal_pembangunan', '>=', 4)->whereMonth('tanggal_pembangunan', '<=', 6)->whereYear('tanggal_pembangunan', '=', $tahun);
        }else if ($periode==3) {
            return $query->whereMonth('tanggal_pembangunan', '>=', 7)->whereMonth('tanggal_pembangunan', '<=', 9)->whereYear('tanggal_pembangunan', '=', $tahun);
        }else if ($periode==4) {
            return $query->whereMonth('tanggal_pembangunan', '>=', 10)->whereMonth('tanggal_pembangunan', '<=', 12)->whereYear('tanggal_pembangunan', '=', $tahun);
        }
        
    }

    public function scopeLaporan_detail($query, $id,$periode = null, $tahun = null)
    {
        if ($periode==1) {
            return $query->where('user_id', $id)->whereMonth('tanggal_pembangunan', '>=', 1)->whereMonth('tanggal_pembangunan', '<=', 3)->whereYear('tanggal_pembangunan', '=', $tahun);
        }else if ($periode==2) {
            return $query->where('user_id', $id)->whereMonth('tanggal_pembangunan', '>=', 4)->whereMonth('tanggal_pembangunan', '<=', 6)->whereYear('tanggal_pembangunan', '=', $tahun);
        }else if ($periode==3) {
            return $query->where('user_id', $id)->whereMonth('tanggal_pembangunan', '>=', 7)->whereMonth('tanggal_pembangunan', '<=', 9)->whereYear('tanggal_pembangunan', '=', $tahun);
        }else if ($periode==4) {
            return $query->where('user_id', $id)->whereMonth('tanggal_pembangunan', '>=', 10)->whereMonth('tanggal_pembangunan', '<=', 12)->whereYear('tanggal_pembangunan', '=', $tahun);
        }
        
    }
}

