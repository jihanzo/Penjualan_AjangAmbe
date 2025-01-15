@extends('layouts.template')
@section('judulh1', 'Edit Hutang')
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
            <h3 class="card-title">Edit Data Hutang</h3>
        </div>

        <!-- Form Edit Hutang -->
        <form action="{{ route('hutang.update', $hutang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="penitipan_id">Pemilik UMKM</label>
                    <select class="form-control" name="penitipan_id" id="penitipan_id">
                        <option hidden>--Pilih Pemilik UMKM--</option>
                        @foreach($penitipan as $dt)
                            <option value="{{ $dt->id }}" {{ $hutang->penitipan_id == $dt->id ? 'selected' : '' }}>
                                {{ $dt->pemilik_umkm }}
                            </option>
                        @endforeach
                    </select>
                    @error('penitipan_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_hutang">Jumlah Hutang</label>
                    <input type="text" class="form-control" id="jumlah_hutang" name="jumlah_hutang" value="{{ old('jumlah_hutang', $hutang->jumlah_hutang) }}">
                    @error('jumlah_hutang')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" value="{{ old('jumlah_bayar', $hutang->jumlah_bayar) }}">
                </div>

                <!-- Display Sisa Hutang and Status -->
                <div class="form-group">
                    <label for="sisa_hutang">Sisa Hutang</label>
                    <input type="text" class="form-control" id="sisa_hutang" name="sisa_hutang" value="{{ old('sisa_hutang', $hutang->sisa_hutang) }}" readonly>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $hutang->status) }}" readonly>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
