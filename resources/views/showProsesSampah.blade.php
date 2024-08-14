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

    <div class="card-body">
        <h3>Sisa Kapasitas Bank</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Semua Bank</h5>

                        @php
                            $totalOrganik = $timbang->where('bank_id')->sum('berat_organik');
                            $totalAnorganik = $timbang->where('bank_id')->sum('berat_anorganik');
                            $sisaKapasitas = $banks->where('bank_id')->sum('kapasitas_penampungan') - ($totalOrganik + $totalAnorganik);
                        @endphp

                        <p class="card-text">Sampah Organik Terkumpul: {{ $totalOrganik }} kg</p>
                        <p class="card-text">Sampah Anorganik Terkumpul: {{ $totalAnorganik }} kg</p>
                        <p class="card-text">Sisa Kapasitas Bank: {{ $sisaKapasitas }} kg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="card-body">
                <table class="table table-hover">
                    <h3>Permintaan Pengajuan Pembuangan</h3>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis Sampah</th>
                            <th>Nama Petugas</th>
                            <th>Nama Pengguna</th>
                            <th>Nama Instansi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prosesToHandle as $pengajuan)
                        <tr>
                            <td class="py-2">{{ $pengajuan->tanggal }}</td>
                            <td class="py-2">{{ $pengajuan->jenis_sampah }}</td>
                            <td class="py-2">{{ $pengajuan->nama_petugas }}</td>
                            <td class="py-2">{{ $pengajuan->nama_pengguna }}</td>
                            <td class="py-2">{{ $pengajuan->nama_instansi }}</td>
                            <td class="py-2">{{ $pengajuan->status }}</td>
                            <td class="py-2">
                                <button type="button" class="btn btn-primary btn-sm"
                                        data-toggle="modal" data-target="#timbangModal{{ $pengajuan->id }}">
                                    Timbang Sampah
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="timbangModal{{ $pengajuan->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="timbangModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="timbangModalLabel">Timbang Sampah</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/savetimbang" method="post">
                                            @csrf
                                                <input name="tanggal" type="hidden"
                                                value="{{ $pengajuan->tanggal}}">
                                                <input type="hidden" name="pengguna_id"
                                                value="{{ $pengajuan->pengguna_id }}">
                                                <input name="nama_pengguna" type="hidden"
                                                value="{{ $pengajuan->nama_pengguna }}">
                                                <input name="petugas_id" type="hidden"
                                                value="{{ $pengajuan->petugas_id }}">
                                                <input name="nama_petugas" type="hidden"
                                                value="{{ $pengajuan->nama_petugas }}">
                                                <input name="bank_id" type="hidden"
                                                value="{{ $pengajuan->bank_id}}">
                                                <input name="nama_instansi" type="hidden"
                                                value="{{ $pengajuan->nama_instansi }}">
                                                
                                            <label for="berat_organik">Berat Sampah Organik (kg):</label>
                                            <input type="text" name="berat_organik"
                                                class="form-control" required>
                                            <label for="berat_anorganik">Berat Sampah Anorganik
                                                (kg):</label>
                                            <input type="text" name="berat_anorganik"
                                                class="form-control" required>
                                            <button type="submit"
                                                class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="card-body">
                <table class="table table-hover">
                    <h3>Hasil Timbangan Sampah</h3>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Petugas</th>
                            <th>Nama Pengguna</th>
                            <th>Nama Instansi</th>
                            <th>Berat Anorganik</th>
                            <th>Berat Organik</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timbang as $timbangan)
                        <tr>
                            <td class="py-2">{{ $timbangan->tanggal }}</td>
                            <td class="py-2">{{ $timbangan->nama_petugas }}</td>
                            <td class="py-2">{{ $timbangan->nama_pengguna }}</td>
                            <td class="py-2">{{ $timbangan->nama_instansi }}</td>
                            <td class="py-2">{{ $timbangan->berat_anorganik }} kg</td>
                            <td class="py-2">{{ $timbangan->berat_organik }} kg</td>
                            
                           
                        </tr>
                        @endforeach
</thead>
</table>
</div>

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
