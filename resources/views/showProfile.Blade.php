<!-- resources/views/showProfile.blade.php -->

@extends('layouts.main') 
@section('title', 'Profile')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Profile</title>
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

        .profile-details {
            margin-top: 20px;
        }

        .profile-details p {
            margin-bottom: 10px;
        }

        .edit-profile-link {
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
                <h1>Profile Details</h1>

                @if($profile)
                    <div class="profile-details">
                        <p><strong>Nama Lengkap:</strong> {{ $profile->nama_lengkap }}</p>
                        <p><strong>NIK:</strong> {{ $profile->nik }}</p>
                        <p><strong>Telepon:</strong> {{ $profile->telepon }}</p>
                        <p><strong>Alamat:</strong> {{ $profile->alamat }}</p>

                        <!-- Tambahkan peta dengan Leaflet -->
                        <div id="map"></div>

                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var mymap = L.map('map').setView([{{ $profile->latitude }}, {{ $profile->longitude }}], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(mymap);

                            L.marker([{{ $profile->latitude }}, {{ $profile->longitude }}]).addTo(mymap);

                            // Tambahkan integrasi Google Maps
                            L.Routing.control({
                                waypoints: [
                                    L.latLng({{ $profile->latitude }}, {{ $profile->longitude }}),
                                    // Anda dapat menambahkan titik rute tambahan di sini
                                ],
                                routeWhileDragging: true
                            }).addTo(mymap);
                        </script>

                        <a href="{{ url('/edit-profile') }}" class="edit-profile-link">Edit Profil</a>
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
