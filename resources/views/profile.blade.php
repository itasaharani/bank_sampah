@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Profile</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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
                <h1>Add Profile</h1>

                @if(isset($profile))
                    <!-- Tampilkan data profil -->
                    <p>Nama Lengkap: {{ $profile->nama_lengkap }}</p>
                    <p>NIK: {{ $profile->nik }}</p>
                    <p>Telepon: {{ $profile->telepon }}</p>
                    <p>Alamat: {{ $profile->alamat }}</p>
                    <p>Latitude: {{ $profile->latitude }}</p>
                    <p>Longitude: {{ $profile->longitude }}</p>
                    <a href="{{ url('/edit-profile') }}">Edit Profil</a>
                @else
                    <form action="/save" method="post">
                        @csrf
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" name="nama_lengkap" required>

                        <label for="Nik">NIK:</label>
                        <input type="text" name="nik" required>

                        <label for="telepon">Telepon:</label>
                        <input type="text" name="telepon" required>

                        <!-- Add other form fields as needed -->

                        <label for="alamat">Alamat:</label>
                        <input type="text" name="alamat" id="alamatInput" required>
                        <div id="map" style="height: 300px; width: 100%;"></div>

                        <input type="hidden" name="latitude" id="latitude" required>
                        <input type="hidden" name="longitude" id="longitude" required>

                        <button type="submit">Simpan</button>
                    </form>
                    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('map').setView([-7.801401, 110.365124], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        var marker = L.marker([0, 0], { draggable: true }).addTo(mymap);

        mymap.on('click', function (e) {
            var position = e.latlng;
            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;

            // Set nilai kolom alamat dengan nama tempat dari hasil klik
            reverseGeocode(position.lat, position.lng);
        });
function reverseGeocode(latitude, longitude) {
            // Menggunakan Nominatim API untuk mendapatkan alamat dari koordinat
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`)

                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                      document.getElementById('alamatInput').value = data.display_name;

                    } else {
                        document.getElementById('alamat').value = 'Alamat tidak ditemukan';
                    }
                })
                .catch(error => {
                    console.error('Error fetching alamat:', error);
                    document.getElementById('alamat').value = 'Error';
                });
        }
mymap.locate({ setView: true, maxZoom: 16 });

        mymap.on('locationfound', function (e) {
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            marker.setLatLng(e.latlng);

            // Reverse Geocoding untuk mendapatkan alamat dari koordinat
            reverseGeocode(e.latlng.lat, e.latlng.lng);
        });
    </script>
                @endif
            </div>
        </section>
    </main><!-- End #main -->

</body>
</html>
@endsection
