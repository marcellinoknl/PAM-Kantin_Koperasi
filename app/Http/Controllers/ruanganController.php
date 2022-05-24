<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\ruangan;
=======
>>>>>>> e205f264ea068f87c0257d1b95ed36ce27ccbb3e

class ruanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
<<<<<<< HEAD
        
    }

    public function kelolaruangan()
    {
        $dataruangan=ruangan::all();
        return view('admin-side.page-admin.ruangan.kelolaruangan')->with([
            'dataruangan' => $dataruangan
        ]);
    }
=======
    }

>>>>>>> e205f264ea068f87c0257d1b95ed36ce27ccbb3e
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
<<<<<<< HEAD
        $tambahruangan = new ruangan();
        $tambahruangan->nama_ruangan = $request->nama_ruangan;
        $tambahruangan->keterangan = $request->keterangan;
    
                
        $tambahruangan->save();
        return redirect('kelolaruangan');
    }

    public function tambahruangan(){
        return view('admin-side.page-admin.ruangan.tambahruangan');
=======
>>>>>>> e205f264ea068f87c0257d1b95ed36ce27ccbb3e
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
<<<<<<< HEAD
        $update = ruangan::find($id);
        return view('admin-side.page-admin.ruangan.editruangan', compact('update'));
=======
>>>>>>> e205f264ea068f87c0257d1b95ed36ce27ccbb3e
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
<<<<<<< HEAD
       
        $update = ruangan::find($id);
        
        $update->nama_ruangan = $request->nama_ruangan;
        $update->keterangan = $request->keterangan;
        $update->save();

        return redirect('kelolaruangan');
=======
>>>>>>> e205f264ea068f87c0257d1b95ed36ce27ccbb3e
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function delete($id)
    {
        //
        $hapus = ruangan::find($id);
        if ($hapus->delete()) {
        }
        return redirect()->back();
=======
    public function destroy($id)
    {
        //
>>>>>>> e205f264ea068f87c0257d1b95ed36ce27ccbb3e
    }
}
