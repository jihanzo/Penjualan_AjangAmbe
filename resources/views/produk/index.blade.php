@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatablesbs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatablesresponsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatablesbuttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection
@section('judulh1', 'Admin - Produk')
@section('konten')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h2 class="card-title">Data Produk</h2>
            <a type="button" class="btn btn-success float-right" href="{{route('produk.create') }}">
                <i class=" fas fa-plus"></i> Tambah Produk
            </a>
            <button type="button" class="btn btn-primary float-right mr-2" onclick="printAll()">
        <i class="fas fa-print"></i> Cetak
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemilik UMKM</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->penitipan->pemilik_umkm }}</td>
                            <td>{{ $dt->namaproduk }}</td>
                            <td>@money ($dt->harga)</td>
                            <td>{{ $dt->stok }}</td>
                            <td>
                                <div class="btn-group"> 
                                    <a type="button" class="btn btn-warning" href="{{ route('produk.edit', $dt->id) }}">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <a type="button" class="btn btn-success" href="{{ route('produk.show', $dt->id) }}">
                                        <i class=" fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('tambahanJS')
<!-- DataTables & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatablesresponsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatablesresponsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
@section('tambahScript')
<script>
    function printAll() {
        // Ambil elemen tabel
        var table = document.getElementById("example1").outerHTML; 

        // Format untuk mencetak
        var printContent = `
            <h3 style="text-align: center;">Data Penitipan</h3>
            ${table}
        `;

        // Buka jendela baru untuk cetak
        var win = window.open('', '_blank');
        win.document.write(`
            <html>
                <head>
                    <title>Cetak Data Penitipan</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        table { width: 100%; border: 1px solid #000; border-collapse: collapse; }
                        th, td { padding: 8px; text-align: left; border: 1px solid #000; }
                    </style>
                </head>
                <body>${printContent}</body>
            </html>
        `);
        win.document.close();
        win.print();
    }
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "responsive": true,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    @if($message = Session::get('success'))
        toastr.success("{{ $message}}");
    @endif
    @if($message = Session::get('updated'))
        toastr.warning("{{ $message}}");
    @endif
</script>
@endsection