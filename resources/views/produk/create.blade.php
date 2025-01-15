@extends('layouts.template')
@section('judulh1', 'Admin - Produk')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your
            input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Produk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" card-body">
                <div class="form-group">
                    <label for="penitipan_id" class="form-label">Pemilik UMKM</label>
                    <select class="form-control" name="penitipan_id" id="penitipan_id">
                        <option hidden>--Pilih Pemilik UMKM--</option>
                        @foreach($penitipan as $dt)
                            <option value="{{ $dt->id }}">{{ $dt->pemilik_umkm }}</option>
                        @endforeach
                    </select>
                    @error('penitipan_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaproduk">Nama Produk</label>
                    <input type="text" class="form-control" id="namaproduk" name="namaproduk"
                        value="{{ old('namaproduk') }}">
                    @error('namaproduk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok">
                </div>
                 

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control"
                        rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success floatright">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection