<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Cabang $cabang)
    {
        //Menampilkan data cabang
        /*
        1. Ambil semua data cabang
        2. Tampilkan seluruh data cabang ke view dengan format tabel
        */
        $data = [
            'cabang'=> $cabang->all()
        ];
        return view('cabang.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        /*
        1. Membuat form untuk menambah data
        */
        return view('cabang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cabang $cabang)
    {
        //
        $data = $request->validate(
            [
                'nama' => ['required'],
                'kode_cabang' => ['required'],
                'alamat'    => ['required'],
                'kontrak_cabang' => ['required'],
            ]
        );
        
        //Proses Insert
            if($data){
                $data['id_perusahaan'] = 1;
            //Simpan jika data terisi semua
                $cabang->create($data);
                return redirect('/cabang')->with('success','Data cabang baru berhasil ditambah');
            }
            else{
                return back()->with('error','Data cabang gagal ditambahkan');
            }
            //Kembali ke form tambah data

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        //Tampilkan form untuk edit data
        $data = [
          'cabang' =>  Cabang::where('id_cabang',$request->id)->first()
        ];
        //Lempar data ke view
        return view('cabang.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabang $cabang)
    {
        $request->validate([
            'nama' => 'required',
            'kode_cabang' => 'required',
            'alamat'    => 'required',
            'kontrak_cabang' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'kode_cabang' => $request->kode_cabang,
            'alamat' => $request->alamat,
            'kontrak_cabang' => $request->kontrak_cabang,
        ];

        if ($request->input('id_cabang') !== null) {
            $data = Cabang::where('id_cabang', $request->id)
                    ->update($data);
            return redirect()->to('/cabang')->with('succcess', 'data berhasil di update');
        }else {
            return redirect()->back()->with('error','coba lagi');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabang $cabang, Request $request)
    {
        $id_cabang = $request->input('id_cabang');
        //Hapus 
        $aksi = $cabang->where('id_cabang',$id_cabang)->delete();
        if($aksi):
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Data cabang berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);

    }
}