<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    // public function tunggakan(){
    // 	return $this->belongsTo('App\tunggakan');
    // }
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['id_petugas','nis','nama','tgl_bayar','id_spp','id_spp','tunggakan_bulan','jumlah_dibayar'];
}
