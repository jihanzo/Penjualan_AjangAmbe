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
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data Penitipan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method=" POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama_umkm">Nama UMKM</label>
                    <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" placeholder=""
                        value="{{ $penitipan->nama_umkm }}" disabled>
                </div>
                <div class="form-group">
                    <label for="pemilik_umkm">Pemilik UMKM</label>
                    <input type="text" class="form-control" id="pemilik_umkm" name="pemilik_umkm" placeholder=""
                        value="{{ $penitipan->pemilik_umkm }}" disabled>
                </div>
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder=""
                        value="{{ $penitipan->harga_satuan }}" disabled>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder=""
                        value="{{ $penitipan->tanggal }}" disabled>
                </div>
                <div class="form-group">
                    <label for="harga_bayar">Harga Bayar</label>
                    <input type="number" class="form-control" id="harga_bayar" name="harga_bayar" placeholder=""
                        value="{{ $penitipan->harga_bayar }}" disabled>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
        </form>
    </div>
</div>
@endsection