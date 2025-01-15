@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatablesbs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatablesresponsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatablesbuttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection
@section('judulh1', 'Admin - Hutang')
@section('konten')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h2 class="card-title">Data Hutang</h2>
            <a type="button" class="btn btn-success float-right" href="{{ route('hutang.create') }}">
                <i class="fas fa-plus"></i> Tambah Hutang
            </a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemilik UMKM</th>
                    <th>Jumlah Hutang</th>
                    <th>Jumlah Bayar</th>
                    <th>Sisa Hutang</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hutangs as $hutang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hutang->penitipan->pemilik_umkm }}</td>
                        <td>{{ number_format($hutang->jumlah_hutang, 2) }}</td>
                        <td>{{ number_format($hutang->jumlah_bayar, 2) }}</td>
                        <td>{{ number_format($hutang->sisa_hutang, 2) }}</td>
                        <td>{{ $hutang->status }}</td>
                        <td>{{ \Carbon\Carbon::parse($hutang->tanggal)->format('d-m-Y') }}</td>
                        <td>
                            <div class="btn-group">
                                <!-- Hapus -->
                                
                                <!-- Edit -->
                                <a type="button" class="btn btn-warning" href="{{ route('hutang.edit', $hutang->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
