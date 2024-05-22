<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Perusahaan::first();
        return view('perusahaan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        $data = Perusahaan::first();
        return view('perusahaan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'id_perusahaan' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'npwp' =>'required',
        ]);

        $data =[
            'id_perusahaan' => $request->input('id_perusahaan'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'alamat' => $request->input('alamat'),
            'npwp' => $request->input('npwp'),
        ];
        // dd($data);
        if ($data) {
            Perusahaan::where('id_perusahaan', $request->get('id_perusahaan'))->update($data);
            return redirect()->to('perusahaan');
        }else {
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        //
    }
}
