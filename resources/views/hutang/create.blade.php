@extends('layouts.template')
@section('judulh1', 'Admin - Hutang')
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
            <h3 class="card-title">Tambah Data Hutang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('hutang.store') }}" method="POST">
            @csrf
            <div class="card-body">
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
                    <label for="jumlah_hutang">Jumlah Hutang</label>
                    <input type="number" class="form-control" id="jumlah_hutang" name="jumlah_hutang"
                        value="{{ old('jumlah_hutang') }}">
                    @error('jumlah_hutang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar (Panjar)</label>
                    <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar"
                        value="{{ old('jumlah_bayar') }}">
                    @error('jumlah_bayar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ old('tanggal') }}">
                    @error('tanggal')
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
