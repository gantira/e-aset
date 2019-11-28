<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesenian extends Model
{
    protected $fillable = [
    	'user_id',  'kode_barang', 'nama_barang', 'nomor_register', 'jenis_barang', 'ukuran', 'jumlah', 'aktivasi_dana', 'tanggal', 'harga', 'keterangan', 'umur', 'status', 'komentar'
    ];

    public function profile()
    {
        return $this->belongsTo('App\Profile', 'user_id');
    }

    public function scopeLaporan($query, $periode = null, $tahun = null)
    {
        if ($periode==1) {
            return $query->whereMonth('tanggal', '>=', 1)->whereMonth('tanggal', '<=', 3)->whereYear('tanggal', '=', $tahun);
        }else if ($periode==2) {
            return $query->whereMonth('tanggal', '>=', 4)->whereMonth('tanggal', '<=', 6)->whereYear('tanggal', '=', $tahun);
        }else if ($periode==3) {
            return $query->whereMonth('tanggal', '>=', 7)->whereMonth('tanggal', '<=', 9)->whereYear('tanggal', '=', $tahun);
        }else if ($periode==4) {
            return $query->whereMonth('tanggal', '>=', 10)->whereMonth('tanggal', '<=', 12)->whereYear('tanggal', '=', $tahun);
        }
        
    }

    public function scopeLaporan_detail($query, $id,$periode = null, $tahun = null)
    {
        if ($periode==1) {
            return $query->where('user_id', $id)->whereMonth('tanggal', '>=', 1)->whereMonth('tanggal', '<=', 3)->whereYear('tanggal', '=', $tahun);
        }else if ($periode==2) {
            return $query->where('user_id', $id)->whereMonth('tanggal', '>=', 4)->whereMonth('tanggal', '<=', 6)->whereYear('tanggal', '=', $tahun);
        }else if ($periode==3) {
            return $query->where('user_id', $id)->whereMonth('tanggal', '>=', 7)->whereMonth('tanggal', '<=', 9)->whereYear('tanggal', '=', $tahun);
        }else if ($periode==4) {
            return $query->where('user_id', $id)->whereMonth('tanggal', '>=', 10)->whereMonth('tanggal', '<=', 12)->whereYear('tanggal', '=', $tahun);
        }
        
    }
}
