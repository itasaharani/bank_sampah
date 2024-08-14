<!-- resources/views/editprofilepetugas.blade.php -->
@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profilepetugas</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
          <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">
  
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


<main id="main" class="main">

<section class="section dashboard">
<div class="row">

    <h1>Edit profilepetugas</h1>

    <form action="{{ url('/update-profilepetugas') }}" method="post">
        @csrf
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ $profilepetugas->nama_lengkap }}" required>

        <!-- Tambahkan elemen formulir lainnya sesuai kebutuhan -->

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="{{ $profilepetugas->alamat }}" required>

        <label for="Nik">NIK:</label>
        <input type="text" name="nik" value="{{ $profilepetugas->nik }}" required>

        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" value="{{ $profilepetugas->telepon}}" required>

        <div id="map" style="height: 300px; width: 100%;"></div>

        <input type="hidden" name="latitude" id="latitude" value="{{ $profilepetugas->latitude }}" required>
        <input type="hidden" name="longitude" id="longitude" value="{{ $profilepetugas->longitude }}" required>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('map').setView([{{ $profilepetugas->latitude }}, {{ $profilepetugas->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        var marker = L.marker([{{ $profilepetugas->latitude }}, {{ $profilepetugas->longitude }}], { draggable: true }).addTo(mymap);

        marker.on('dragend', function (event) {
            var marker = event.target;
            var position = marker.getLatLng();
            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;
        });

        mymap.on('click', function (e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    </script>
          
          </div>
    </section>

  </main><!-- End #main -->

</body>
</html>

@endsection
