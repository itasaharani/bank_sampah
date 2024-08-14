<!-- resources/views/berlangganan/view_pengguna.blade.php -->
@extends('layouts.main')
@section('title','Jual Sampah')
@section('content')

<!-- Template Main CSS File -->
<link href="assets2/css/style.css" rel="stylesheet">


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
  <h4>Klik Pin Untuk Mengetahui Nama Petugas</h4>
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
     <section class="section dashboard">
         <div class="row">
  <h2>    
Pilihan Berlangganan</h2> 
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Paket <span> | A</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>440k</h6>
                      <span class="text-success small pt-1 fw-bold">3 Bulan</span> 
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Paket <span>| B</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>600K</h6>
                      <span class="text-success small pt-1 fw-bold">6 bulan</span>  

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Paket <span>| C</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>800K</h6>
                      <span class="text-danger small pt-1 fw-bold">12 Bulan</span>  

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

<div class="container mt-5">
        <h2>Yuk, Berlangganan Sekarang</h2>

        @if(isset($langganan))
        <div class="card-body">
            <p>Nama : {{ $langganan->nama}}</p>
            <p>Jenis Sampah: {{ $langganan->jenis_sampah }}</p>
            <p>Paket Harga: {{ $langganan->paket_harga }}</p>
            <p>Masa Berlaku: {{ $langganan->masa_berlaku }}</p>
            <p>Status: {{ $langganan->status }}</p>
            <p>Akhir Langganan: {{ $endDate }}</p>
         </div>
        @else
        <form id="langgananForm" action="/berlangganan" method="post">
    @csrf
    <div class="form-group w-25">
    <label for="paket_harga">Pilih Paket Harga:</label>
    <select name="paket_harga" id="paket_harga_select" required>
        <option value="A">Paket A - Jenis Sampah: Semua (Non & Organik) , Harga: 440.000, Masa Berlaku: 90 hari</option>
        <option value="B">Paket B - Jenis Sampah: Semua (Non & Organik), Harga: 600.000, Masa Berlaku: 180 hari</option>
        <option value="C">Paket C - Jenis Sampah: Semua (Non & Organik), Harga: 800.000, Masa Berlaku: 365 hari</option>
    </select>
</div>

    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>

    <label for="jenis_sampah">Jenis Sampah:</label>
    <input type="text" name="jenis_sampah" id="jenis_sampah" required>
    <br>

    <label for="paket_harga">Paket Harga:</label>
    <input type="text" name="paket_harga_display" id="paket_harga_display" readonly>

    <label for="masa_berlaku">Masa Berlaku:</label>
    <input type="text" name="masa_berlaku" id="masa_berlaku" required>
    <label for="petugas_id">Pilih Petugas:</label>
<select name="petugas_id" id="petugas_id" required>
    @foreach($profilepetugas as $petugas)
        <option value="{{ $petugas->id }}">{{ $petugas->nama_lengkap }}</option>
    @endforeach
</select>


    <button type="submit">Berlangganan</button>
</form>

<script>
    document.getElementById('paket_harga_select').addEventListener('change', function () {
        var selectedPackage = this.value;

        if (selectedPackage === 'A') {
            document.getElementById('nama').value = 'Paket A';
            document.getElementById('jenis_sampah').value = 'Semua';
            document.getElementById('paket_harga_display').value = '440.000';
            document.getElementById('masa_berlaku').value = '90';
        } else if (selectedPackage === 'B') {
            document.getElementById('nama').value = 'Paket B';
            document.getElementById('jenis_sampah').value = 'Semua';
            document.getElementById('paket_harga_display').value = '600.000';
            document.getElementById('masa_berlaku').value = '180';
        } else if (selectedPackage === 'C') {
            document.getElementById('nama').value = 'Paket C';
            document.getElementById('jenis_sampah').value = 'Semua';
            document.getElementById('paket_harga_display').value = '800.000';
            document.getElementById('masa_berlaku').value = '365';
        }
    });
</script>

        @endif
    </div>
    </div>
    </section>
    </main><!-- End #main -->

@endsection
