<!-- resources/views/showprofilepetugas.blade.php -->

@extends('layouts.main') 
@section('title', 'profilepetugas')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show profilepetugas</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Template Main CSS File -->
    <link href="assets2/css/style.css" rel="stylesheet">
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        #map {
            height: 300px;
            width: 100%;
            margin-top: 20px;
        }

        .profilepetugas-details {
            margin-top: 20px;
        }

        .profilepetugas-details p {
            margin-bottom: 10px;
        }

        .edit-profilepetugas-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>
     
 
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/homepengepul">
          <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li>
      <!-- End home -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/profilebank">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->


            <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-trash"></i><span>Validasi Pembuangan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/pengajuanbank">
              <i class="bi bi-circle"></i><span>Dari Petugas</span>
            </a>
          </li>
          <li>
            <a href="/pengajuanmandiribank">
              <i class="bi bi-circle"></i><span>Dari Pengguna Rumahan</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/gajibank">
          <i class="bi bi-envelope"></i>
          <span>Validasi Penerimaan</span>
        </a>
      </li>
      <!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/prosesSampah">
          <i class="bi bi-arrow-repeat"></i>
          <span>Proses Sampah</span>
        </a>
      </li>
      <!-- End Register Page Nav -->
      
    </ul>

  </aside><!-- End Sidebar--->

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <h1>profilepetugas Details</h1>

                @if($profilebank)
                    <div class="profilepetugas-details">

                        <p><strong>Nama Instansi:</strong> {{ $profilebank->nama_instansi }}</p>
                
                        <p><strong>Telepon:</strong> {{ $profilebank->telepon }}</p>

                        <p><strong>Alamat:</strong> {{ $profilebank->alamat }}</p>

                        <p><strong>Kapasitas Penampungan:</strong> {{ $profilebank->kapasitas_penampungan }}</p>

                        <!-- Tambahkan peta dengan Leaflet -->
                        <div id="map"></div>

                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var mymap = L.map('map').setView([{{ $profilebank->latitude }}, {{ $profilebank->longitude }}], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(mymap);

                            L.marker([{{ $profilebank->latitude }}, {{ $profilebank->longitude }}]).addTo(mymap);

                            // Tambahkan integrasi Google Maps
                            L.Routing.control({
                                waypoints: [
                                    L.latLng({{ $profilebank->latitude }}, {{ $profilebank->longitude }}),
                                    // Anda dapat menambahkan titik rute tambahan di sini
                                ],
                                routeWhileDragging: true
                            }).addTo(mymap);
                        </script>

                        <a href="{{ url('/edit-profilebank') }}" class="edit-profilebank-link">Edit Profil</a>
                    </div>
                @else
                    <p>Profil tidak ditemukan</p>
                @endif
            </div>
        </section>

    </main><!-- End #main -->

</body>

</html>

@endsection
