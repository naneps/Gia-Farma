@extends('layouts.landing')
@section('title')
Tentang Kami
@endsection
@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div style="collor:white" class="container">
      <h1>Tentang Kami</h1>
      <h2>Informasi mengenai kami ada di sini</h2>
      {{-- <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
    </div>
  </section><!-- End Hero -->
@endsection

@section('content')

<section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-12  ">
          <div class="content">
            <div class="text-center">
                <h3>Apotek Bahagia</h3>
                {{-- <p>Tersedia Berbagai Macam Produk Kessehatan</p> --}}
            </div>

            <div class="text-center">
              {{-- <a href="#" class="more-btn">Selengkapnya <i class="bx bx-chevron-right"></i></a> --}}
            </div>
          </div>
        </div>

      </div>

    </div>
</section><!-- End Why Us Section -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Tentang Kami</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
    </div>

    <div>
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.2979192783287!2d108.36957481424291!3d-6.48390409530954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec1c6ab69193f%3A0x53c10b17c74e4936!2sapotek%20bahagia!5e0!3m2!1sen!2sid!4v1640158921483!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container">
      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Lokasi</h4>
              <p>{{$setting->alamat}}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>giafarma@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telepon:</h4>
              <p>{{$setting->telepon}}</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection

