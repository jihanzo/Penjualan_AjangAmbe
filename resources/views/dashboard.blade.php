@extends('layouts.template')
@section('judulh1', 'Admin - Dashboard')
@section('konten')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
            </div>
        </div>
        <div class="card-body">
        
            <h3>APA ITU GALERI AJANG AMBE ??</h3>
            <br><div class="image">
            <img src="{{ asset('ajangambe.jpeg')}}">
        </div>
        <br>
            Galeri Ajang Ambe merupakan program Corporate Social Responsibility (CSR) Pertamina EP Rantau Field untuk membantu 
            meningkatkan kesejahteraan masyarakat disekitar perusahaan, melalui pemberdayaan UMKM lokal. Seiring dengan perkembangan 
            teknologi, khusus nya teknologi digital maka konsep pemasaran hasil produksi Usaha Mikro Kecil dan Menengah semakin besar. 
            <br><br>Sistem informasi penjualan produk Galeri Ajang Ambe di Kabupaten Aceh Tamiang saat ini masih berjalan manual. 
            Penjualan, promosi dan teknologi juga pelayanan yang memudahkan para pelanggan dalam melakukan transaksi dapat menjadi faktor 
            pendukung dalam mencapai keberhasilan penjualan. Sistem informasi yang dibangun ini bertujuan untuk membantu Galeri Ajang Ambe 
            dalam hal pemasaran dan penjualan produk. 
            <br><br>Proses pembuatan program ini dimulai dengan menganalisa sistem yang telah ada di Galeri Ajang Ambe, kemudian membuat ERD 
            dan tabel-tabel yang diperlukan, dilanjutkan dengan mendesain fitur eksternal dan fitur internal dan membuat programnya. 
            Sistem informasi ini di buat dengan mengunakan framework codeigniter. Sistem informasi ini di bangun menjadi dua fitur, yaitu fitur 
            eksternal dan fitur internal. 
            <br><br>Fitur eksternal berupa website Galeri Ajang Ambe yang dapat diakses oleh pelanggan atau masyarakat. 
            Fitur eksternal berisi tentang katalog produk serta pelanggan bisa melakukan pemesanan produk, pendaftaran UMKM yang ingin 
            bergabung di Galeri Ajang Ambe dan informasi-informasi lainnya mengenai Ajang Ambe. Fitur internal berupa tampilan admin. 
            Fitur internal berupa tampilan admin yang bisa melakukan pengelolaan data produk, mengelola pesanan dan memperoleh laporan. 
            Fitur internal hanya dapat diakses oleh admin. Semoga dengan adanya sistem informasi penjualan produk Usaha Mikro Kecil dan 
            Menengah dapat membantu Galeri Ajang Ambe dalam hal pemasaran dan penjualan serta dengan adanya website ini dapat meningkatkan 
            penjualan produk dan daya saing dari daerah lain serta kesejahteraan antar UMKM selalu terjaga.
        </div>
    </div>
</div>
@endsection