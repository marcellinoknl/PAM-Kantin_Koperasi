<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id_pemesanan_makanan_minuman';

    protected $fillable = ['kode_transaksi', 'tanggal_pemesanan_makanan_minuman','total_pembayaran','total_item','status','id_user','nama_penerima','nomor_telephone','note'];

    public function details(){
        return $this->hasMany(TransaksiDetail::class, "id_pemesanan", "id_pemesanan_makanan_minuman");
    }

    public function user(){
        return $this->belongsTo(User::class, "id", "id_user");
    }
}
