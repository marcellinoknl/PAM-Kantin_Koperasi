<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $table = 'transaksi_details';
    protected $primaryKey = 'id_pemesanan_makanan_minuman_detail';
    
    protected $fillable = ['id_makanan_minuman','id_pemesanan','kuantitas','total_harga'];
    public function pemesanan(){
        return $this->belongsTo(Transaksi::class, "id_pemesanan", "id_pemesanan_makanan_minuman");
    }

    public function makananminuman(){
        return $this->belongsTo(produuk::class, "id_makanan_minuman", "id_makanan_minuman");
    }
}
