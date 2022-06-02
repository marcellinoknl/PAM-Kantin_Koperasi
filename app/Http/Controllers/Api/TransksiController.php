<?php

namespace App\Http\Controllers\Api;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransksiController extends Controller
{
    public function store(Request $requset) {
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'user_id' => 'required',
            'total_item' => 'required',
            'nama_penerima' => 'required',
            'total_pembayaran' => 'required',
            'nomor_telephone' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_transaksi = "INV/PYM/" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $status = "Pending";


        $dataTransaksi = array_merge($requset->all(), [
            'kode_transaksi' => $kode_transaksi,
            'status' => $status,
            'tanggal_pemesanan_makanan_minuman' =>now()
        ]);

        \DB::beginTransaction();
        $transaksi = Transaksi::create($dataTransaksi);
        foreach ($requset->produks as $produk) {
            $detail = [
                'id_pemesanan_makanan_minuman' => $transaksi->id_pemesanan_makanan_minuman,
                'produk_id' => $produk['produk_id'],
                'total_item' => $produk['total_item'],
                'note' => $produk['note'],
                'total_harga' => $produk['total_harga']
            ];
            $transaksiDetail = TransaksiDetail::create($detail);
        }

        if (!empty($transaksi) && !empty($transaksiDetail)) {
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksi' => collect($transaksi)
            ]);
        } else {
            \DB::rollback();
            return $this->error('Transaksi gagal');
        }
    }

    public function history($user_id) {
        $transaksis = Transaksi::with(['user'])->whereHas('user', function ($query) use ($user_id) {
            $query->whereId($user_id);
        })->orderBy("id_pemesanan_makanan_minuman", "desc")->get();

        foreach ($transaksis as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->makananminuman;
            }
        }

        if (!empty($transaksis)) {
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksis' => collect($transaksis)
            ]);
        } else {
            $this->error('Transaksi gagal');
        }
    }

    public function batal($id){
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        if ($transaksi){
            // update data

            $transaksi->update([
                'status' => "BATAL"
            ]);
            $this->pushNotif('Transaksi Dibatalkan', "Transasi produk ".$transaksi->details[0]->produk->name." berhsil dibatalkan", $transaksi->user->fcm);

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksi' => $transaksi
            ]);
        } else {
            return $this->error('Gagal memuat transaksi');
        }
    }

}