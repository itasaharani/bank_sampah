<!-- resources/views/editProfile.blade.php -->
@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

    <h1>Edit Profile</h1>

    <form action="{{ url('/update-profile') }}" method="post">
        @csrf
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ $profile->nama_lengkap }}" required>

        <!-- Tambahkan elemen formulir lainnya sesuai kebutuhan -->

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="{{ $profile->alamat }}" required>

        <label for="Nik">NIK:</label>
        <input type="text" name="nik" value="{{ $profile->nik }}" required>

        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" value="{{ $profile->telepon}}" required>

        <div id="map" style="height: 300px; width: 100%;"></div>

        <input type="hidden" name="latitude" id="latitude" value="{{ $profile->latitude }}" required>
        <input type="hidden" name="longitude" id="longitude" value="{{ $profile->longitude }}" required>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('map').setView([{{ $profile->latitude }}, {{ $profile->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        var marker = L.marker([{{ $profile->latitude }}, {{ $profile->longitude }}], { draggable: true }).addTo(mymap);

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
