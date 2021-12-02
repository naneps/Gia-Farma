@extends('layouts.main')
@section('title')
    |Pesanan
@endsection
@section('content')
    {{-- @include('layouts.topbar')
    @include('layouts.sidebar') --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Pesanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Pesanan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Pesanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Pembeli</th>
                                                <th>Nama Prosuk</th>
                                                <th>Kuantitas</th>
                                                <th>Status Pesanan</th>
                                                <th>Pemabyaran</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('js')

    @endpush
@endsection
