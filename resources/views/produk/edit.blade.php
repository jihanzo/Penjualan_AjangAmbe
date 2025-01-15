@extends('layouts.template')
@section('judulh1', 'Edit Produk')
@section('konten')

<div class="col-md-6">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Edit Data Produk</h3>
        </div>

        <!-- Form Edit Produk -->
        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="penitipan_id">Pemilik UMKM</label>
                    <select class="form-control" name="penitipan_id" id="penitipan_id">
                        <option hidden>--Pilih Pemilik UMKM--</option>
                        @foreach($penitipan as $dt)
                            <option value="{{ $dt->id }}" {{ $produk->penitipan_id == $dt->id ? 'selected' : '' }}>
                                {{ $dt->pemilik_umkm }}
                            </option>
                        @endforeach
                    </select>
                    @error('penitipan_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaproduk">Nama Produk</label>
                    <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="{{ old('namaproduk', $produk->namaproduk) }}">
                    @error('namaproduk')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}">
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    @if ($produk->foto)
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk" class="img-fluid mt-2" width="150">
                    @endif
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
