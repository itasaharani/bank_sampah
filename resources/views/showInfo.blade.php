<!-- resources/views/berlangganan/show_info.blade.php -->
@extends('layouts.main')
@section('title', 'Info Berlangganan')
@section('content')
 <!-- Template Main CSS File -->
 <link href="assets2/css/style.css" rel="stylesheet">

  
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/dashpengguna">
      <i class="bi bi-house-door"></i>
      <span>Home</span>
    </a>
  </li> 
  <!-- end home -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="/profile">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>
  <!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/buangmandiri">
      <i class="bi bi-trash"></i>
      <span>Buang Sampah Mandiri</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/langganan">
      <i class="bi-person-badge-fill"></i>
      <span>Langganan</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/riwayat">
      <i class="bi bi-receipt-cutoff"></i>
      <span>Riwayat Transaksi</span>
    </a>
  </li><!-- End Register Page Nav -->

  
</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

<div class="container mt-5">
    <h1>Informasi Berlangganan</h1>
    @if($langganan)
    <p>Nama Paket: {{ $langganan->nama }}</p>
    <p>Masa_berlaku: {{ $langganan->masa_berlaku }} hari</p>
    <p>Status: {{ $langganan->status }}</p>
    <p>Akhir Langganan: {{ $langganan->akhir_langganan }}</p>
    @if($langganan->petugas)
            <p>Petugas: {{ $langganan->petugas->nama_lengkap }}</p>
            <!-- You can add more information about the petugas here -->
        @else
            <p>Petugas tidak ditemukan</p>
        @endif

        <!-- Tambahkan informasi lain yang perlu ditampilkan -->
    @else
        <p>Profil tidak ditemukan</p>
    @endif

    <form action="{{ url('/generate-invoice/' . $langganan->id) }}" method="get">
    <button type="submit" class="btn btn-success">Download Invoice</button>
</form>
    <form action="{{ url('/pengajuan') }}" method="get">
    <button type="submit" class="btn btn-primary">Pengajuan Sampah</button>
</form>

</div>
</div>
        </section>
    </main><!-- End #main -->

@endsection
