@extends('layouts.layoutCustomer')
@section('title2')
    home
@endsection
@section('content')

    <div class="main-content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-primary text-white-all">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
            </ol>
        </nav>
        <div class="hero text-white hero-bg-image hero-bg-parallax"
            style="background-image: url('{{ asset('img/unsplash/andre-benz-1214056-unsplash.jpg') }}');">
            <div class="hero-inner">
                <h2>Welcome, Ujang!</h2>
                <p class="lead">You almost arrived, complete the information about your account to complete
                    registration.</p>
                <div class="mt-4">
                    <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup
                        Account</a>
                </div>
            </div>
        </div>
    </div>

@endsection
