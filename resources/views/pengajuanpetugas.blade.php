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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
<!-- Daftar pengajuan yang perlu ditangani -->
<div class="card-body">
            <table class="table table-hover">
                <h3>Permintaan Pengambilan Sampah</h3>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Pengguna</th>
            <th>Petugas</th>
            <th>Jenis Sampah</th>
            <th>Status</th>
            <th>Aksi</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
   
        @foreach($pengajuanToHandle as $pengajuan)
        <tr>
    <td class="py-2">{{ $pengajuan->tanggal }}</td>
    <td class="py-2">{{ $pengajuan->nama_pengguna }}</td>
    <td class="py-2">{{ $pengajuan->nama_petugas }}</td>
    <td class="py-2">{{ $pengajuan->jenis_sampah }}</td>
    <td class="py-2">{{ $pengajuan->status }}</td>
    <td class="py-2">
        <div class="btn-group" role="group" aria-label="aksi">
            <form method="post" action="{{ url('/pengambilan/' . $pengajuan->id . '/action') }}">
                @csrf
                <button type="submit" name="action" value="acc" class="btn btn-danger btn-sm"
                        {{ $pengajuan->status !== 'menunggu' ? 'disabled' : '' }}>Acc</button>

                <button type="submit" name="action" value="jemput_sampah"
                        class="btn btn-warning btn-sm" {{ $pengajuan->status !== 'di acc' ? 'disabled' : '' }}>
                    Jemput Sampah
                </button>

                <button type="submit" name="action" value="ambil_sampah" class="btn btn-success btn-sm"
                        {{ $pengajuan->status !== 'diproses' ? 'disabled' : '' }}>Selesai
                </button>
            </form>
        </div>
    </td>
    <td class="py-2">
        <button type="button" class="btn btn-primary btn-sm"
                onclick="$('#daftarBuangModal').modal('show');"
                {{ $pengajuan->status !== 'selesai' ? 'disabled' : '' }}>
            Daftar Buang
        </button>
    </td>
</tr>

        @endforeach
       
    </tbody>
</table>
</div>
</div>
    </section>

    <div class="modal fade" id="daftarBuangModal" tabindex="-1" role="dialog" aria-labelledby="daftarBuangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarBuangModalLabel">Form Daftar Buang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi formulir Daftar Buang di sini -->
       <!-- resources/views/formulir.blade.php -->

<form action="/daftar_buang" method="POST">
    @csrf

    <div class="form-group">
       
        <input type="hidden" name="pengguna_id" value="{{ $pengajuan->pengguna_id }}" class="form-control" required readonly>
    </div>

    <div class="form-group">
        <label for="nama_pengguna">Nama Pengguna</label>
        <input type="text" name="nama_pengguna" value="{{ $pengajuan->nama_pengguna }}" class="form-control" required readonly>
    </div>

    <div class="form-group">
       
        <input type="hidden" name="petugas_id" value="{{ $pengajuan->petugas_id }}" class="form-control" required readonly>
    </div>

    <div class="form-group">
        <label for="nama_petugas">Nama Petugas</label>
        <input type="text" name="nama_petugas" value="{{ $pengajuan->nama_petugas }}" class="form-control" required readonly>
    </div>


    <div class="form-group">
        <label for="jenis_sampah">Jenis Sampah:</label>
        <input type="text" name="jenis_sampah" value="{{ $pengajuan->jenis_sampah }}" class="form-control" required readonly>
    </div>  

    <div class="form-group">
    <label for="nama_instansi">Pilih Bank:</label>
    <select name="nama_instansi" id="nama_instansi" class="form-control" required>
        @foreach($profilbank as $bank)
            <option value="{{ $bank->nama_instansi }}" data-bank-id="{{ $bank->id }}">{{ $bank->nama_instansi }}</option>
        @endforeach
    </select>
</div>
<input type="text" name="bank_id" id="bank_id" readonly>

<script>
    document.getElementById('nama_instansi').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];
        var bankId = selectedOption.getAttribute('data-bank-id');
        document.getElementById('bank_id').value = bankId;
    });
</script>




    <!-- ... (other form elements) ... -->

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Ajukan Ke Bank Sampah</button>
    </div>
</form>

      </div>
    </div>
  </div>
</div>

  </main><!-- End #main -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
