<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kampung Dinamo Ngagel Rejo - Surabaya</title>
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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Kampung Dinamo</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#tentang">Tentang Kampung Dinamo</a></li>
          <li><a class="nav-link scrollto" href="#layanan">Layanan & UMKM</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi">Rekomendasi</a></li>
          <li><a class="nav-link scrollto" href="#dokumentasi">Foto & Video</a></li>
          <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
          <!-- <li><a class="getstarted" href="/login">Login</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Kampung Wisata Dinamo</h1>
          <h2>Ngagel Rejo Surabaya</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            @if (empty($data->desa_nama))
                <a href="#" class="btn-get-started scrollto">Sejarah</a>
                <a href="#" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            @else
                <a href="/profile_desa/{{ $data->desa_nama }}" class="btn-get-started scrollto">Sejarah</a>
                <a href="{{ $data->video_link }}" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            @endif
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('img/desa/icon_desa.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row justify-content-center" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/untag/untag sby.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/untag/lppm sby.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/sby/logo sby.png') }}" class="img-fluid" alt="">
          </div>

        </div>
      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="tentang" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Sejarah</h2>
        </div>
        @if (empty($data->desa_sejarah))
            <div class="row content">
                <div class="col-lg-12">
                    <p>Sejarah</p>
                </div>
            </div>
        @else
            <div class="row content">
                <div class="col-lg-12">
                    <p>{{$data->desa_sejarah}}</p>
                    <a href="/profile_desa/{{ $data->desa_nama }}" class="btn-learn-more">Baca Selengkapnya</a>
                </div>
            </div>
        @endif
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3><strong>Visi dan Misi</strong> Perangkat Desa</h3>
              <p>
              Website ini kami hadirkan sebagai media informasi Pemerintah Desa kepada masyarakat. Juga sebagai sarana interaksi, komunikasi dan transparansi publik untuk keterbukaan informasi.
              </p>
            </div>

            <div class="accordion-list container">
                @if (empty($data->desa_visi))
                    <ul>
                        <li>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"> VISI<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                            <p>
                            Visi
                            </p>
                        </div>
                        </li>

                        <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">MISI <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                            Misi
                            </p>
                        </div>
                        </li>
                    </ul>
                @elseif (empty($data->desa_misi))
                    <ul>
                        <li>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"> VISI<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                            <p>
                            Visi
                            </p>
                        </div>
                        </li>

                        <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">MISI <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                            Misi
                            </p>
                        </div>
                        </li>
                    </ul>
                @else
                    <ul>
                        <li>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"> VISI<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                            <p>
                            {{$data->desa_visi}}
                            </p>
                        </div>
                        </li>

                        <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">MISI <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                            {{$data->desa_misi}}
                            </p>
                        </div>
                        </li>
                    </ul>
                @endif
            </div>
          </div>

          <div class="col-lg-5 align-items-center align-items-stretch order-1 order-lg-2 img" data-aos="zoom-in" data-aos-delay="150"><img width="400" height="350" src="{{ asset('img/desa/tugu.png')}}" sizes="(max-width: 640px) 400px, 800px" /></div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
          <img width="400" height="400" src="{{ asset('img/desa/produk_layanan.jpg')}}" />
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Produk & Layanan UMKM Desa Kampung Dinamo</h3>
            <p class="fst-italic">
               Jumlah pelaku usaha UMKM pada desa kampung dinamo
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">Servis Dinamo <i class="val">30+ Pelaku Usaha</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">UMKM<i class="val">10+ UMKM Berkembang</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Bratang Market<i class="val">100% Produk Khas Surabaya</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Pelayanan Masyarakat Terpadu<i class="val">100% Pelayanan Terpadu</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="layanan" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan & UMKM</h2>
          <p>layanan service dinamo dan umkm pada desa ngagel rejo</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img height="200" width="200" src="{{ asset('img/dinamo/dinamo_logo.jpg') }}" /></div>
              <h4><a href="/dinamo">Servis Dinamo</a></h4>
              <p>Jasa Pelayanan Servis Dinamo Kampung Wisata Ngagel Rejo Surabaya</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
            <div class="icon"> <img height="200" width="200" src="{{ asset('img/layanan/layanan_masyarakat_logo.jpg') }}" />  </div>
              <h4><a href="/layanan">Layanan & Sarana</a></h4>
              <p>Layanan Masyarakat dan Sarana Prasarana Kampung Wisata Dinamo Surabaya</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><img height="200" width="200" src="{{ asset('img/umkm/umkm_logo.jpg') }}" /> </div>
              <h4><a href="/umkm">UMKM</a></h4>
              <p>UMKM Berkembang Oleh Organisasi dan Individu Terbaik Di-Kampung Wisata Dinamo Surabaya</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><img height="200" width="200" src="{{ asset('img/market/bratang_market_logo.jpg') }}" /></div>
              <h4><a href="/market">Bratang Market</a></h4>
              <p>Market Barang Unik dan Menarik Hanya di Kampung Wisata Dinamo Surabaya</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Testimoni Section ======= -->
    <section id="rekomendasi" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Rekomendasi</h2>
          <p>Dibawah ini adalah rekomendasi dari user</p>
        </div>

        <div class="row justify-content-center">
            @foreach($rekomendasi as $rec)
                <div class="col-lg-6">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                <div class="pic"><img height="200" width="200" src="{{ asset('img/rekomendasi/'.$rec->rekomendasi_foto) }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                    <h4>{{ $rec->rekomendasi_name }}</h4>
                    <span>{{ $rec->rekomendasi_subname }}</span>
                    <p>{{ $rec->rekomendasi_deskripsi }}</p>
                </div>
                </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Terstimoni Section -->


    <!-- ======= Dokumentasi Section ======= -->
    <section id="dokumentasi" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Berita & Acara</h2>
          <p>Kegiatan dan Acara Kampung Dinamo Ngagel Rejo RW.6</p>
        </div>
        <div class="row align-content-center justify-content-center mt-4">
          <?php $i = 1 ?>
            @foreach($berita as $f)
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><img height="200" width="200" src="{{ url('/data_file/'.$f->berita_foto) }}" /></i></div>
                <h4><a href="/berita/{{ $f->berita_id }}">{{ $f->berita_name }}</a></h4>
              </div>
            </div>
            @if($i == 4)
              </div>
              <div class="row mt-4">
              <?php $i == 0 ?>
            @endif
            <?php $i++; ?>
          @endforeach
      </div>
    </section><!-- End Dokumentasi Section -->



{{--
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Free Plan</h3>
              <h4><sup>$</sup>0<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Business Plan</h3>
              <h4><sup>$</sup>29<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Developer Plan</h3>
              <h4><sup>$</sup>49<span>per month</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="buy-btn">Get Started</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section --> --}}

    {{-- <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section --> --}}

    <!-- ======= Contact Section ======= -->
    <section id="kontak" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
          <p>Kontak Kami Jika Ada Pertanyaan Atau Lainnyan.</p>
        </div>

        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p>Kampung Dinamo Ngagel Rejo Rw 6, Surabaya, Jawa Timur, Indonesia</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>ngagelrejosby06@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telpon:</h4>
                <p>+62 851 0341 2459</p>
              </div>

              <iframe src="https://maps.google.com/maps?q=-7.2988807, 112.7502595&z=15&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#tentang">Sejarah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#layanan">Layanan & UMKM</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#dokumentasi">Foto & Video</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#kontak">Kontak</a></li>
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
