@extends('layouts.main')
@section('title')
    Transaksi | Penjualan
@endsection
@section('content')
    {{-- @include('layouts.topbar')
    @include('layouts.sidebar') --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Penjualan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Penjualan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Transaksi</h4>
                            </div>
                            <div class="row ml-2">
                                <div class="col-4">
                                    <button type="button" class="btn btn-icon icon-left btn-success"><i
                                            class="fas fa-file-export"></i>
                                        Export Pdf</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                </div>
                                <table class="table table-striped" id="tabel-penjualan">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            {{-- <th>Tanggal Penjuualan</th> --}}
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Total Barang</th>
                                            <th>Total Penjualan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="badge badge-success"> GF001301121</div>
                                        </td>
                                        <td>30-November-2021</td>
                                        <td>3</td>
                                        <td>30000</td>
                                        <td>
                                            <button type="button" onclick="showDetailPenjualan()"
                                                class="btn btn-sm btn-icon icon-left btn-info"><i
                                                    class="fas fa-info-circle"></i> Info</button>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>
    </div>
    @include('admin.penjualan.modalDetailPenjualan')
    @push('js')
        <script>
            function showDetailPenjualan() {
                $('#detail-penjualan').modal('show');
            }
        </script>
    @endpush
@endsection
