@extends('layouts.landing')
@section('title')
Beranda
@endsection
@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div style="collor:white" class="container">
      <h1>Selamat Datang Di Gia Farma</h1>
      <h2>Informasi mengenai kami ada di sini</h2>
      {{-- <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
    </div>
  </section><!-- End Hero -->
@endsection

@section('content')
 <!-- ======= Why Us Section ======= -->
 <section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <h3>Apotek Bahagia</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
            </p>
            <div class="text-center">
              <a href="#" class="more-btn">Selengkapnya <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>

      </div>

    </div>
</section><!-- End Why Us Section -->


  <section id="counts" class="counts">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="fas fa-user-md"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$dataproduk}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Produk</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="far fa-hospital"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$kategori}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Kategori</p>
          </div>
        </div>



      </div>

    </div>
  </section><!-- End Counts Section -->


  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Layanan </h2>
        <p>Kami menyediakan layanan sebegai berikut </p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-heartbeat"></i></div>
            <h4><a href="">Menjual Obat-obatan</a></h4>
            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-pills"></i></div>
            <h4><a href="">Menjual Alat Kesehatan</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-hospital-user"></i></div>
            <h4><a href="">Cek Tensi Darah</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-dna"></i></div>
            <h4><a href="">Cek Kolesterol</a></h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-wheelchair"></i></div>
            <h4><a href="">Cek Asam Urat</a></h4>
            <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-notes-medical"></i></div>
            <h4><a href="">Cek Gula Darah</a></h4>
            <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->
@endsection
@push('js')
<script>
    console.log("Ok");
</script>
@endpush
