@extends('layouts.template')
@section('judulh1', 'Admin - Penitipan')
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
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Penitipan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('penitipan.update', $penitipan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama_umkm">Nama UMKM</label>
                    <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" placeholder=""
                        value="{{ $penitipan->nama_umkm }}">
                </div>
                <div class="form-group">
                    <label for="pemilik_umkm">Pemilik UMKM</label>
                    <input type="text" class="form-control" id="pemilik_umkm" name="pemilik_umkm" value="{{ $penitipan->pemilik_umkm }}">
                </div>
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ $penitipan->harga_satuan }}">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $penitipan->tanggal }}">
                </div>
                <div class="form-group">
                    <label for="harga_bayar">Harga Bayar</label>
                    <input type="number" class="form-control" id="harga_bayar" name="harga_bayar" value="{{ $penitipan->harga_bayar }}">
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option hidden>--Pilih Status--</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning floatright">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection