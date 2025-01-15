@extends('layouts.template')
@section('judulh1', 'Detail Produk')
@section('konten')

<div class="col-md-6">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">{{ $produk->nama_produk }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="penitipan_id">Pemilik UMKM</label>
                <p>{{ $produk->penitipan->pemilik_umkm }}</p>
            </div>

            <div class="form-group">
                <label for="namaproduk">Nama Produk</label>
                <p>{{ $produk->namaproduk }}</p>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <p>{{ $produk->harga }}</p>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <p>{{ $produk->stok }}</p>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->namaproduk }}" class="img-fluid">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <p>{{ $produk->deskripsi }}</p>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

@endsection
