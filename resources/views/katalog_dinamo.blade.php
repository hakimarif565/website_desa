<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Katalog Dinamo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Kampung Dinamo</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/#tentang">Tentang Kampung Dinamo</a></li>
          <li><a class="nav-link scrollto" href="/#layanan">Layanan & UMKM</a></li>
          <li><a class="nav-link scrollto" href="/#rekomendasi">Rekomendasi</a></li>
          <li><a class="nav-link scrollto" href="/#dokumentasi">Foto & Video</a></li>
          <li><a class="nav-link scrollto" href="/#kontak">Kontak</a></li>
          <!-- <li><a class="getstarted" href="/login">Login</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container mt-4">

        <ol>
          <li><a href="/">Home</a></li>
          <li>Dinamo</li>
        </ol>
        <h2>Servis Dinamo</h2>

      </div>
    </section><!-- End Breadcrumbs -->
    <section class="section-content inner-page bg padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse ($datas as $data)
                    <div class="col-md-4">
                        <figure class="card card-product">
                            @if ($data->usaha_img == NULL || $data->usaha_img == '')
                                <div class="d-flex justify-content-center img-wrap padding-y"><img height="200" width="200" src="{{ asset('img/rekomendasi/data1.jpg') }}" class="img-fluid" alt=""></div>
                            @else
                                <div class="d-flex justify-content-center img-wrap padding-y"><img height="200" width="200" src="{{ url('data_file/'.$data->usaha_img) }}" alt=""></div>
                            @endif
                            <figcaption class="d-flex info-wrap">
                                <h4 class="title"><a href="/dinamo/{{ $data->usaha_id }}">{{ $data->usaha_nama }}</a></h4>
                            </figcaption>
                            <div class="d-flex bottom-wrap">
                                <a href="/dinamo/{{ $data->usaha_id }}" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i>{{ Str::title($data->usaha_tipe) }}</a>
                            </div>
                        </figure>
                    </div>
                    @empty
                        <p>Jasa Dinamo Masih Kosong</p>
                    @endforelse
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {!! $datas->links() !!}
                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h4>Kampung Wisata Dinamo Surabaya</h4>
              <p>Ngagel Rejo Surabaya, Indonesia</p>
              {{-- <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form> --}}
            </div>
          </div>
        </div>
      </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Kampung Dinamo</h3>
            <p>
              Ngagel Rejo RW.6 - 11 <br>
              Surabaya, Jawa Timur<br>
              Indonesia<br><br>
              <strong>Telpon:</strong> +62 5589 55488 55<br>
              <strong>Email :</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Tentang Kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#tentang">Sejarah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#layanan">Layanan & UMKM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#dokumentasi">Foto & Video</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/#kontak">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Produk dan Layanan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/dinamo">Servis Dinamo</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/layanan">Layanan Masyarakat</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/umkm">UMKM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/market">Bratang Market</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sosial Media</h4>
            <p>Temukan Kampung Dinamo Surabaya pada Sosial Media Dibawah Ini</p>
            <div class="social-links mt-3">
              <a href="https://www.instagram.com/kknngagelrejo/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
  {{-- <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script> --}}
  {{-- <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
