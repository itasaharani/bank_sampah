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
                <h1>Add Profile</h1>

                @if(isset($profilebank))
                    <!-- Tampilkan data profil -->
                    <p>Nama instansi: {{ $profilebank->nama_instansi }}</p>
                    <p>Telepon: {{ $profilebank->telepon }}</p>
                    <p>Alamat: {{ $profilebank->alamat }}</p>
                    <p>Kapasitas Tampung: {{ $profilebank->kapasitas_penampungan }}</p>
                    <p>Latitude: {{ $profilebank->latitude }}</p>
                    <p>Longitude: {{ $profilebank->longitude }}</p>
                    <a href="{{ url('/edit-profilebank') }}">Edit Profil</a>
                @else
                    <form action="/savebank" method="post">
                        @csrf
                        <label for="nama_instansi">Nama Intansi:</label>
                        <input type="text" name="nama_instansi" required>

                        <label for="telepon">Telepon:</label>
                        <input type="text" name="telepon" required>

                        <!-- Add other form fields as needed -->

                        <label for="alamat">Alamat:</label>
                        <input type="text" name="alamat" id="alamatInput" required>

                        
                        <label for="kapasitas_penampungan">Kapasitas Penampungan:</label>
                        <input type="number" name="kapasitas_penampungan" required>

                        <div id="map" style="height: 300px; width: 100%;"></div>

                        <input type="hidden" name="latitude" id="latitude" required>
                        <input type="hidden" name="longitude" id="longitude" required>

                        <button type="submit">Simpan</button>
                    </form>

                    <script>
                        var mymap = L.map('map').setView([0, 0], 2);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap contributors'
                        }).addTo(mymap);

                        var marker = L.marker([0, 0], { draggable: true }).addTo(mymap);

                        marker.on('dragend', function (event) {
                            var marker = event.target;
                            var position = marker.getLatLng();
                            document.getElementById('latitude').value = position.lat;
                            document.getElementById('longitude').value = position.lng;
                        });

                        mymap.locate({ setView: true, maxZoom: 16 });

                        mymap.on('locationfound', function (e) {
                            document.getElementById('latitude').value = e.latlng.lat;
                            document.getElementById('longitude').value = e.latlng.lng;
                            marker.setLatLng(e.latlng);
                        });
                    </script>
                @endif
            </div>
        </section>
    </main><!-- End #main -->

</body>
</html>
@endsection
