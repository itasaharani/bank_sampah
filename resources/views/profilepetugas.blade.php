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
                <h1>Add Profile</h1>

                @if(isset($profilepetugas))
                    <!-- Tampilkan data profil -->
                    <p>Nama Lengkap: {{ $profilepetugas->nama_lengkap }}</p>
                    <p>NIK: {{ $profilepetugas->nik }}</p>
                    <p>Telepon: {{ $profilepetugas->telepon }}</p>
                    <p>Alamat: {{ $profilepetugas->alamat }}</p>
                    <p>Latitude: {{ $profilepetugas->latitude }}</p>
                    <p>Longitude: {{ $profilepetugas->longitude }}</p>
                    <a href="{{ url('/edit-profilepetugas') }}">Edit Profil</a>
                @else
                    <form action="/savepetugas" method="post">
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
