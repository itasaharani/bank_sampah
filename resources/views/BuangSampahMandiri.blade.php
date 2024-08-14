@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Pelanggan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<body>
    <!-- Konten HTML Anda yang sudah ada di sini -->
  <!-- resources/views/allLocations.blade.php -->

<!-- Konten HTML Anda yang sudah ada di sini -->



<main id="main" class="main">
  <h3>Lokasi Petugas</h3>
  <h4>Klik Pin Untuk Mengetahui titik setiap bank sampah</h4>
<div id="map" style="height: 400px;"></div>

<script>
    var mymap = L.map('map');

    var markers = L.featureGroup(); // Membuat grup marker

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© Kontributor OpenStreetMap'
    }).addTo(mymap);

    // Menambahkan marker dinamis berdasarkan longitude dan latitude dari database
    @foreach($locations as $location)
        var marker = L.marker([{{ $location->latitude }}, {{ $location->longitude }}]);
        var popupContent = '{{ $location->nama_instansi }}';

        marker.bindPopup(popupContent);
        markers.addLayer(marker); // Menambahkan marker ke grup
    @endforeach

    // Menambahkan grup marker ke peta
    markers.addTo(mymap);

    // Menentukan batas-batas peta berdasarkan grup marker
    mymap.fitBounds(markers.getBounds());
</script>
<section class="section dashboard">
         <div class="row">

<!-- Form untuk pengajuan pengambilan sampah -->
<div class="card-body ">
<h3>Ajukan Pembuangan Sampah</h3>
<form action="/savebuangmandiri" method="post">
    @csrf

    <div class="form-group">
    <label for="nama_lengkap">Nama Pengguna:</label>
    <input type="text" name="nama_lengkap" value= "{{$namaPengguna }}" class="form-control" required readonly>
</div>

    <div class="form-group">
        <label for="jenis_sampah">Jenis Sampah:</label>
        <select name="jenis_sampah" required>
            <option value="" disabled selected>Pilih jenis sampah</option>
            <option value="organik">Organik</option>
            <option value="anorganik">Anorganik</option>
        </select>
    </div>
    <div class="form-group" hidden>
    <label for="bank_id">Pilih Bank Sampah:</label>
    <select name="bank_id" id="bank_id" class="form-control" required>
        @foreach($banks as $bank)
            <option value="{{ $bank->id }}">{{ $bank->id }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nama_instansi">Pilih Bank Sampah:</label>
    <select name="nama_instansi" id="nama_instansi" class="form-control" required>
        @foreach($banks as $bank)
            <option value="{{ $bank->nama_instansi }}">{{ $bank->nama_instansi }}</option>
        @endforeach
    </select>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Membuat objek pemetaan dari nama_instansi ke id
        var namaInstansiMap = {};
        @foreach($banks as $bank)
            namaInstansiMap["{{ $bank->nama_instansi }}"] = "{{ $bank->id }}";
        @endforeach

        // Menangani perubahan pada dropdown nama_instansi
        $("#nama_instansi").change(function() {
            var selectedNamaInstansi = $(this).val();
            var correspondingId = namaInstansiMap[selectedNamaInstansi];

            // Mengatur nilai dropdown bank_id
            $("#bank_id").val(correspondingId);
        });
    });
</script>

    <button type="submit" class="btn btn-primary">Ajukan Sampah</button>
    <br>
<br>
</form>
</div>

<hr>

<div class="card-body">
<h2>Riwayat Proses Pengajuan</h2>
@if($riwayatMandiri && count($riwayatMandiri) > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th>tanggal</th>
                <th>nama pengguna</th>
                <th>Jenis Sampah</th>
                <th>Nama Bank</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatMandiri as $transaksi)
                <tr>
                <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->nama_lengkap }}</td>
                    <td>{{ $transaksi->jenis_sampah }}</td>
                    <td>{{ $transaksi->nama_instansi}}</td>
                    <td>{{ $transaksi->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@else
    <p>Tidak ada riwayat transaksi.</p>
@endif
</div>

</section>
</main>
@endsection