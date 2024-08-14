@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html>
<head>
    
  <!-- Vendor CSS Files -->
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets2/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">

    <title>Ajukan Pengambilan Sampah</title>
</head>
<body>

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

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->



<!-- Form untuk pengajuan pengambilan sampah -->
<div class="card-body ">
<h3>Ajukan Pengambilan Sampah</h3>
<form action="{{ route('ajukan-pengambilan') }}" method="post" class="border p-3">
    @csrf
    <div class="form-group">
        <label for="jenis_sampah">Jenis Sampah:</label>
        <select name="jenis_sampah" required>
            <option value="" disabled selected>Pilih jenis sampah</option>
            <option value="organik">Organik</option>
            <option value="anorganik">Anorganik</option>
        </select>

        <input type="hidden" name="petugas_id" value="{{ $petugasId }}">
        <input type="hidden" name="nama_pengguna" value="{{ $namaPengguna }}">
        <input type="hidden" name="longitude" value="{{ $long }}">
        <input type="hidden" name="latitude" value="{{ $lat }}">
    </div>

    <button type="submit" class="btn btn-warning btn-sm">Ajukan Pengambilan Sampah</button>
</form>
</div>

<!-- Riwayat transaksi -->

<div class="card-body">
<h2>Riwayat Proses Pengajuan</h2>
<p>Nama Pengguna: {{ $namaPengguna }}</p>
@if($riwayatTransaksi && count($riwayatTransaksi) > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Pengguna</th>
                <th>Nama Petugas</th>
                <th>Jenis Sampah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatTransaksi as $transaksi)
                <tr>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->nama_pengguna }}</td>
                    <td>{{ $transaksi->nama_petugas }}</td>
                    <td>{{ $transaksi->jenis_sampah }}</td>
                    <td>{{ $transaksi->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <p>Tidak ada riwayat transaksi.</p>
@endif


</div>
</section>
</main>

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>

</body>

</html>


@endsection