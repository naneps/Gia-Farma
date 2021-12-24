@extends('layouts.landing')
@section('title')
Produk
@endsection
@section('hero')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div style="collor:white" class="container">
      <h1>Selamat Datang Di Gia Farma</h1>
      <h2>Iformasi Kebuutuhan ada ada disini</h2>
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
                <p>Tersedia Berbagai Macam Produk Kessehatan</p>
            </div>

            <div class="text-center">
              <a href="#" class="more-btn">Selengkapnya <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>

      </div>

    </div>
</section><!-- End Why Us Section -->
    <section id="doctors" class="mt-5 pb-3">
        <div class="container">

          <div class="section-title">
            <h2>Produk</h2>
            <p>Cari Kebutuhan Anda Disini.</p>
          </div>
          <div class="row">
              <div class="col">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari"  name="search" id="search">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
                  </div>
              </div>
          </div>

          <div class="row" id="products">



        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="produk?page=1">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
            {{-- {{$dataproduk->links()}} --}}
        </nav>

        </div>
      </section><!-- End Doctors Section -->
      @include('landing.detailproduk')

      @endsection
      @push('js')
      <script>
          $(function(){
                 $('body').on('click', '.detail', function() {
                    var myModal = new bootstrap.Modal(document.getElementById('modal-detail'))
                    myModal.show();
                        let id = $(this).data('id')
                        $.ajax({
                            url: `${baseUrl}/product/${id}`,
                            type: 'get',
                            dataType: 'JSON',

                            success: function(res) {
                                // console.log(res);

                                $('#modal-detail #deskripsi').text(res.deskripsi);

                                // $('#modal-detail #gambar ').prop('src', `${baseUrl}/img/produk/${res.gambar}`)
                        },
                    })
                })

                $.ajax({
                    url: `${baseUrl}/products`,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(res) {
                        $.each(res, function(k,v){
                                $('#products').append(`<div class="col-lg-3 mt-3 ">
                                    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 15rem; height: 25rem;">
                                        <img src="{{ asset('img/produk/') }}/${v.gambar}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                            </b><h5 class="card-title ">${v.nama_produk}</h5>
                                            <p class="card-text">Harga : Rp.${v.harga_jual}</p>
                                            <p class="card-text">Stok : ${v.stok}</p>
                                            <div class="row mt-2">
                                                <div class="col align-self-buttom">
                                                    <center>
                                                        <button type="button" data-id="${v.id_produk}" class="btn btn-icon icon-left btn-primary detail allign-text-buttom"><i class="fas fa-info-circle"></i> Detail</button>
                                                     </center>
                                                </div>
                                            </div>

                                    </div>
                            </div>`);
                        })
                    },

                })

                // search
                $('#search').on('keyup',function() {
                    var query = $(this).val();
                    $.ajax({

                        url:`${baseUrl}/search`,

                        type:'GET',

                        data:{'nama_produk':query},

                        success:function (data) {
                            console.log(data);
                            // $('#products').append(`<div class="col-lg-3 mt-3 ">
                            //         <div class="card" style="width: 15rem;">
                            //             <img src="{{ asset('img/produk/') }}/${data.gambar}" class="card-img-top" alt="...">
                            //                 <div class="card-body">
                            //                 </b><h5 class="card-title ">${data.nama_produk}</h5>
                            //                 <p class="card-text">Harga : Rp.${data.harga_jual}</p>
                            //                 <p class="card-text">Stok : ${data.stok}</p>
                            //                 <center>

                            //                     <button type="button" data-id="${data.id_produk}" class="btn btn-icon icon-left btn-primary detail"><i class="fas fa-info-circle"></i> Detail</button>
                            //                 </center>
                            //         </div>
                            // </div>`);
                        }
                    })
                    // end of ajax call
                });
             })


            </script>
      @endpush
