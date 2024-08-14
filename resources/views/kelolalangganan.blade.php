<!-- resources/views/berlangganan/view_petugas.blade.php -->

@extends('layouts.main')
@section('title','home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Profile</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>

  <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">


  
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
<div class="container mt-5">
    <h1>Pengguna Berlangganan</h1>
<div class="card-body">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Nama Paket</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($langganan as $idx => $dataLangganan)
                <tr class="border-bottom">
                    <th scope="row">{{ $idx + 1 }}</th>
                    <td>
                        @foreach ($profil as $dataProfil)
                            @if ($dataProfil->id === $dataLangganan->id)
                                {{ $dataProfil->nama_lengkap }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $dataLangganan->nama }}</td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
        </section>
    </main><!-- End #main -->
</body>
</html>
