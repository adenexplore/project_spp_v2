<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tunggakan extends Model
{
    use HasFactory;
    protected $table = 'tunggakans';
    protected $fillable = ['id_siswa','bulan', 'total_tunggakan','sisa_tunggakan','sisa_bulan'];
    // public function pembayaran(){
    // 	return $this->hasMany('App\pembayaran');
    // }
}
