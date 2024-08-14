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
                <h1>profilepetugas Details</h1>

                @if($profilepetugas)
                    <div class="profilepetugas-details">
                        <p><strong>Nama Lengkap:</strong> {{ $profilepetugas->nama_lengkap }}</p>
                        <p><strong>NIK:</strong> {{ $profilepetugas->nik }}</p>
                        <p><strong>Telepon:</strong> {{ $profilepetugas->telepon }}</p>
                        <p><strong>Alamat:</strong> {{ $profilepetugas->alamat }}</p>

                        <!-- Tambahkan peta dengan Leaflet -->
                        <div id="map"></div>

                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var mymap = L.map('map').setView([{{ $profilepetugas->latitude }}, {{ $profilepetugas->longitude }}], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(mymap);

                            L.marker([{{ $profilepetugas->latitude }}, {{ $profilepetugas->longitude }}]).addTo(mymap);

                            // Tambahkan integrasi Google Maps
                            L.Routing.control({
                                waypoints: [
                                    L.latLng({{ $profilepetugas->latitude }}, {{ $profilepetugas->longitude }}),
                                    // Anda dapat menambahkan titik rute tambahan di sini
                                ],
                                routeWhileDragging: true
                            }).addTo(mymap);
                        </script>

                        <a href="{{ url('/edit-profilepetugas') }}" class="edit-profilepetugas-link">Edit Profil</a>
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
