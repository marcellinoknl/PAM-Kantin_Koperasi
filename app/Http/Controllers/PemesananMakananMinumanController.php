<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PemesananMakananMinumanController extends Controller
{
    public function index(){
        $pemesanans = DB::table('transaksis')
        ->join('users', 'users.id','=','transaksis.user_id')
        ->select('users.nama_lengkap','transaksis.*')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin-side.page-admin.validasipesanan.validasipesanan', compact('pemesanans'));
    }

    public function update(Request $request, $id_pemesanan_makanan_minuman){
        $update = Transaksi::find($id_pemesanan_makanan_minuman);
        $update->status = $request->status;
        $update-> save();
        return redirect('validasipesanan')->with('success', "Berhasil mengubah status pemesanan!");

    }

    public function delete($id_pemesanan_makanan_minuman)
    {
        $deletepemesanan = Transaksi::find($id_pemesanan_makanan_minuman);
        if ($deletepemesanan->delete()) {
            return redirect()->back()->with('success', "Berhasil menghapus pemesanan!");
        }
    }
}
