<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $setting->nama_perusahaan }} | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ url($setting->path_logo) }}" type="image/png">
  <link href="{{ asset('landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landing/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('landing/assets/css/style.css') }}" rel="stylesheet">


</head>

<body>

@include('layouts.navbar')

@yield('hero')

  <main id="main">

  @yield('content')

  </main>

<section>
    <footer id="footer">

        <div class="footer-top ">
          <div class="container">
            <div class="row align-item-center">

              <div class="col-lg-3 col-md-6 footer-contact ">
                <h3>{{$setting->nama_perusahaan}}</h3>
                <p>
                    {{$setting->alamat}} <br>
                  <strong>Phone:</strong> {{$setting->telepon}}<br>
                  {{-- <strong>Email:</strong> {{$setting->email}}<br> --}}
                </p>
              </div>

              <div class="col-lg-2 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Produk</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Kontak Kami</a></li>

                </ul>
              </div>





            </div>
          </div>
        </div>

        <div class="container d-md-flex py-4">


        </div>
      </footer>
</section>


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landing/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('landing/assets/js/main.js') }}"></script>
  <script>
    const baseUrl = 'http://127.0.0.1:8000';
</script>
  @stack('js')

</body>

</html>
