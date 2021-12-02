@extends('layouts.main')
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
                                <h4>Total Obat</h4>
                            </div>
                            <div class="card-body">
                                {{ $dataObat }}
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
                                {{ $dataKategori }}
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
                                <h4>data Supplier</h4>
                            </div>
                            <div class="card-body">
                                {{ $dataSupplier }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Penjualan</h4>
                            </div>
                            <div class="card-body">
                                0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"
                        class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pembelian</h4>
                            </div>
                            <div class="card-body">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn">Month</a>
                                </div>
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
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i
                                                class="fas fa-caret-down"></i></span> 23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span>9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 19%</span>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penjualan Minggu ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <div class="summary-info">
                                    <h4>Rp.1.100.000</h4>
                                    <div class="text-muted">100 barang terjual</div>
                                    <div class="d-block mt-2">
                                        <a href="#">Lihat Semua</a>
                                    </div>
                                </div>
                                <div class="summary-item">
                                    <h6>Lis Barang <span class="text-muted">(3 Items)</span></h6>
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/products/product-1-50.png') }}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">Rp.12000</div>
                                                <div class="media-title"><a href="#">Paracetamol</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/products/product-1-50.png') }}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">Rp.12000</div>
                                                <div class="media-title"><a href="#">Paracetamol</a></div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/products/product-1-50.png') }}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">Rp.12000</div>
                                                <div class="media-title"><a href="#">Paracetamol</a></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
    </div>

@endsection
