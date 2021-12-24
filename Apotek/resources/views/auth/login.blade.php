@extends('layouts.auth')

@section('login')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="{{ url($setting->path_logo) }}" alt="logo.png" width="100">
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Login</h4></div>

            <div class="card-body">
              <form action="{{ route('login') }}" method="post" class="needs-validation">
                @csrf
                <div class="form-group has-feedback @error('email') has-error @enderror">
                    <input type="email" name="email" class="form-control" placeholder="Email" required
                        value="{{ old('email') }}" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @else
                        <span class="help-block with-errors"></span>
                    @enderror
                </div>
                <div class="form-group has-feedback @error('password') has-error @enderror">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @else
                        <span class="help-block with-errors"></span>
                    @enderror


                    <!-- /.col -->
                    <div class="col-xs-4 m-3">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login
                           </button>
                    </div>

            </form>


        </div>
      </div>
    </div>
  </section>

    <!-- /.login-card -->
@endsection
