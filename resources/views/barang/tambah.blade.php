@extends('layouts.layout')
@section('title','Tambah Cabang ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah data Barang Perusahaan
                </span>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card-body">
                <form method="POST" action="{{url('simpan-barang')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                        <p>
                            <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nama Cabang</label>
                                <input type="text" class="form-control" name="nama_barang" />
                            </div>
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" class="form-control" name="barcode" />
                            </div>
                            <div class="form-group">
                                <label>foto barang</label>
                                <input type="file" class="form-control" name="foto_barang" />
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection