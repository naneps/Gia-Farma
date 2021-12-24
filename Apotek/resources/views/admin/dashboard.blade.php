@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')

@endsection

@section('content')

    {{-- @include('layouts.topbar')
    @include('layouts.sidebar') --}}

    <div class="main-content ">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon bg-primary" data-aos="flip-down">

                            <i class="fas fa-capsules"></i>
                        </div>
                        <div class=" card-wrap">
                            <div class="card-header">
                                <h4>Total Produk</h4>
                            </div>
                            <div class="card-body">
                                {{ $produk }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Data Kategori</h4>
                            </div>
                            <div class="card-body">
                                {{ $kategori }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon " style="background: #0F00FF;">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total supplier</h4>
                            </div>
                            <div class="card-body">
                                {{ $supplier }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penjualan</h4>
                            </div>
                            <div class="card-body">
                                {{$penjualan}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pembelian</h4>
                            </div>
                            <div class="card-body">
                                {{$pembelian}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Penjualan Perminggu</h4>
                            <div class="card-header-action">
                                {{-- <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn">Month</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor"
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="myChart" height="384" style="display: block; width: 633px; height: 384px;"
                                width="633" class="chartjs-render-monitor"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">

                                    <div class="detail-value">Rp.{{$penjualan_hari}}</div>
                                    <div class="detail-name"><Table>Pejualan Hari ini</Table></div>
                                </div>
                                <div class="statistic-details-item">

                                    <div class="detail-value">Rp.{{$penjualan_minggu}}</div>
                                    <div class="detail-name"><Table>Pejualan Minggu ini</Table></div>
                                </div>
                                <div class="statistic-details-item">

                                    <div class="detail-value">Rp.{{$penjualan_bulan}}</div>
                                    <div class="detail-name"><Table>Pejualan Bulan ini</Table></div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header m-0">
                            <h4>Produk Terakhir Terjual </h4>
                        </div>
                        <div class="card-body">
                            <div class="summary">

                                <div class="summary-item">

                                    <ul class="list-unstyled list-unstyled-border" id="productToday">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
    </div>
@push('js')
    <script src="{{ asset('js/page/modules-chartjs.js') }}"></script>
    <script>
        $(function() {

            $.ajax({
                    url: `${baseUrl}/out`,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(res) {
                        $.each(res, function(k,v){
                            $('#productToday').append(`<li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/produk/') }}/${v.produk.gambar}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">Rp.${v.produk.harga_jual}</div>
                                                <div class="media-title"><a href="#">${v.produk.nama_produk}</a></div>
                                            </div>
                                        </li>`);
                        })
                    },

                })
        })
    </script>
@endpush
@endsection
