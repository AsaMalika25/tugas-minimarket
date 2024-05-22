@extends('layouts.layout')
@section('title','Daftar Barang')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Data barang Perusahaan
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="/create-barang">
                            <btn class="btn btn-success">Tambah Barang</btn>
                        </a>

                    </div>
                    <p>
                        <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA Barang</th>
                                    <th>Barcode</th>
                                    <th>foto barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_barang as $item)
                                <tr>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->barcode}}</td>
                                    <td><img alt="img" width="150px"
                                        src="{{ asset('image/'.$item->foto_barang) }}"></td>
                                    <td>
                                        <a href="/edit-cabang/"><btn class="btn btn-primary">EDIT</btn></a>
                                        <btn class="btn btn-danger btnHapus" idbarang="">HAPUS</btn>

                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')


@endsection