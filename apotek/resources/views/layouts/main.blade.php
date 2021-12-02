<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @yield('css')
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- CSS Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('third-party/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('third-party/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('third-party/chart.js/dist/Chart.min.css   ') }}" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('third-party/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('third-party/izitoast/dist/css/iziToast.min.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.topbar')
            @include('layouts.sidebar')
            @yield('content')

            <footer class="main-footer stiky-bottom">
                <div class="footer-left">
                    Copyright &copy; {{ date('Y ') }}
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>

    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>

    <!-- JS Libraries -->
    <script src="{{ asset('third-party/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('third-party/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('third-party/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('third-party/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('third-party/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src=" {{ asset('third-party/chart.js/dist/Chart.min.css') }} "></script>
    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    <script>
        const baseUrl = 'http://apotek.test';
    </script>
    <script>
        AOS.init();
    </script>
    @stack('js')

</body>

</html>
