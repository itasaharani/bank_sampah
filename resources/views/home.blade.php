@extends('layouts.main') 
@section('title','home')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moderna Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Humase</span></h2>
          <p class="animate__animated animate__fadeInUp">Sistem Informasi Pengelolaan Sampah Humase merupakan 
            sebuah perangkat lunak berbasis website yang memiliki 
            visi untuk menciptakan dampak positif bagi masyarakat 
            dalam bidang pembuangan sampah yang bertujuan untuk 
            memudahkan individu untuk membuang sampah dengan cara 
            yang lebih modern dan menarik..</p>
            <button><a href="dashpengguna">Launch to dashboard</a></button>
       
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Kenapa Harus Humase ? </h2>
          <p class="animate__animated animate__fadeInUp">Di sini, kami berkomitmen untuk merubah paradigma pembuangan sampah menjadi lebih inovatif dan ramah lingkungan. Dengan fitur-fitur terbaru, Anda dapat melibatkan diri dalam menciptakan lingkungan yang bersih dan sehat. Bergabunglah dengan kami dalam perjalanan menuju kehidupan yang lebih berkelanjutan!".</p>
          
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Yuk Bergabung!</h2>
          <p class="animate__animated animate__fadeInUp">Kebersihan dimulai dari diri sendiri. Dengan Sistem Informasi Pengelolaan Sampah Humase, Anda tidak hanya membuang sampah, tetapi juga ikut berkontribusi dalam menjaga keindahan lingkungan. Temukan fitur-fitur menarik kami, dari pelaporan sampah hingga program-program penghargaan. Bersama-sama kita wujudkan lingkungan yang bersih, hijau, dan nyaman untuk generasi masa depan!</p>
          
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Visit our website</a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="/jualsampah">Menjual Sampah</a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="/saldoakun">Saldo Akun dan Poin</a></h4>
              <p class="description"></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="/kelolasampah">Kelola Sampah</a></h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="/laporan">Laporan & Riwayat Transaksi</a></h4>
             
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="assets/img/why-us.png" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=i0bb7Et0ots" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <h3>Sekilas Berita</h3>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Sampah, Masalah Serius!</a></h4>
              <p class="description">Sampah adalah masalah serius yang dihadapi masyarakat modern. Untuk mengatasi peningkatan jumlah sampah harian, diperlukan solusi efektif. Bank sampah muncul sebagai inovasi dalam penanganan sampah, memungkinkan partisipasi aktif masyarakat dalam daur ulang dan pemilahan sampah. Melalui bank sampah, lingkungan lebih bersih tercipta, dampak negatif sampah pada ekosistem berkurang, dan masyarakat terlibat mendapatkan nilai ekonomis. Bank sampah bukan hanya solusi untuk masalah sampah, tetapi juga langkah positif menuju lingkungan berkelanjutan.</p>
            </div>

           

          </div>
        </div>

      </div>
    </section>
    <!-- End Why Us Section -->



  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
</body>

</html>
@endsection