@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Petugas</title>
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
    <a class="nav-link collapsed" href="/homepetugas">
      <i class="bi bi-house-door"></i>
      <span>Home</span>
    </a>
  </li><!-- End home -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/profilepetugas">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="/kelolasampah">
      <i class="bi bi-question-circle"></i>
      <span>Kelola Sampah</span>
    </a>
  </li> -->
  <!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/petugaslang">
      <i class="bi bi-envelope"></i>
      <span>Permintaan Langganan</span>
    </a>
  </li>
  <!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/kelolalang">
      <i class="bi bi-card-list"></i>
      <span>Kelola Langganan</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/titikjemput">
      <i class="bi bi-geo-fill"></i>
      <span>Titik Jemput</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/pengajuan-petugas">
      <i class="bi bi-trash"></i>
      <span>Daftar Buang</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/gaji">
      <i class="bi bi-card-checklist"></i>
      <span>Ajukan Penerimaan</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/kelolalang">
      <i class="bi bi-card-list"></i>
      <span>Report</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  
</ul>

</aside><!-- End Sidebar--->


<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<body>
    <!-- Konten HTML Anda yang sudah ada di sini -->
  <!-- resources/views/allLocations.blade.php -->

<!-- Konten HTML Anda yang sudah ada di sini -->



<main id="main" class="main">
  <h3>Lokasi Petugas</h3>
  <h4>Klik Pin Untuk Mengetahui titik jemput setiap pengguna</h4>
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
        var popupContent = '{{ $location->nama_lengkap }}';

        marker.bindPopup(popupContent);
        markers.addLayer(marker); // Menambahkan marker ke grup
    @endforeach

    // Menambahkan grup marker ke peta
    markers.addTo(mymap);

    // Menentukan batas-batas peta berdasarkan grup marker
    mymap.fitBounds(markers.getBounds());
</script>
@endsection