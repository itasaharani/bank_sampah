@extends('layouts.main') 
@section('title', 'home')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Petugas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets2/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets2/vendor/simple-datatables/style.css" rel="stylesheet">

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

<!-- Main Content -->
<main id="main" class="main">
    <div class="pagetitle">
        <!-- Page Title content -->
    </div>

    <section class="section dashboard">
        <div class="row">
        <div class="card-body">
                <table class="table table-hover">
                    <h3>Permintaan Pengambilan Sampah</h3>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Petugas</th>
                            <th>Nama Pengguna</th>
                            <th>Nama Instansi</th>
                            <th>Berat Anorganik</th>
                            <th>Berat Organik</th>
                            <th>aksi</th>
                            <th>status</th>
                            <th>gaji</th>

                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gaji as $timbangan)
                        <tr>
                            <td class="py-2">{{ $timbangan->tanggal }}</td>
                            <td class="py-2">{{ $timbangan->nama_petugas }}</td>
                            <td class="py-2">{{ $timbangan->nama_pengguna }}</td>
                            <td class="py-2">{{ $timbangan->nama_instansi }}</td>
                            <td class="py-2">{{ $timbangan->berat_anorganik }} kg</td>
                            <td class="py-2">{{ $timbangan->berat_organik }} kg</td>
                            <td class="py-2">
                            <div class="btn-group" role="group" aria-label="aksi">
                            <form method="post" action="{{ route('update-status.action', $timbangan->id) }}">
    @csrf
    <!-- ... (form fields) ... -->
    <button type="submit" name="action" value="acc" class="btn btn-warning btn-sm"  {{ $timbangan->status == 'di tolak' || $timbangan->status == 'diterima' ? 'disabled' : '' }}
            >Acc</button>

    <button type="submit" name="action" value="tolak"
            class="btn btn-danger btn-sm" {{ $timbangan->status == 'di tolak' || $timbangan->status == 'diterima' ? 'disabled' : '' }} >
        Tolak
    </button>
</form>

</td>

        <td class="py-2">{{ $timbangan->status }} </td>
        <td class="py-2">{{ $timbangan->gaji }} </td>

                           
                        </tr>
                        @endforeach
</thead>
</table>
</div>
           
                      
        </div>
    </section>

    

    <!-- ... (existing code) ... -->

</main>

<!-- Back to Top Button -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets2/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets2/vendor/chart.js/chart.umd.js"></script>
<script src="assets2/vendor/echarts/echarts.min.js"></script>
<script src="assets2/vendor/quill/quill.min.js"></script>
<script src="assets2/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets2/vendor/tinymce/tinymce.min.js"></script>
<script src="assets2/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets2/js/main.js"></script>

</body>

</html>

@endsection
