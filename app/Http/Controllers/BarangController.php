<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_barang = Barang::orderBy('id_barang','asc')->get();
        return view('barang.index',compact('data_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
      $request->validate([
        'nama_barang' => 'required',
        'barcode' => 'required',
        'foto_barang' => 'required|image|mimes:jpg,png,jpeg,jpeg,gif',
      ]);

      

        $image_file = $request->file('foto_barang');
        $image_ekstensi = $image_file->extension();
        $image_nama = 'barang-upload-'.date('ymdhis', strtotime('+7 hour')) . '.' . $image_ekstensi;
        $image_file->move(public_path('image'), $image_nama);
        
        $create_data = new Barang();
        $create_data->nama_barang = $request->input('nama_barang');
        $create_data->barcode = $request->input('barcode');
        $create_data->foto_barang = $image_nama;
        $create_data->save();
        // upload::create($data);
        
        if ($create_data) {
            return redirect()->to('/barang')->with('success', 'berhasil menambahkan data');
        }else {
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        
    }
}
