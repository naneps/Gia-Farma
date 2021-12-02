<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>


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

<body class="layout-3">
    <div>
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="container">
                    <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
                    <div class="navbar-nav">
                        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
                                class="fas fa-bars"></i></a>
                    </div>
                    <div class="nav-collapse">
                        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="index-0.html" class="nav-link">General
                                            Dashboard</a></li>
                                    <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce
                                            Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="nav-item active">
                                <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top
                                        Navigation</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                        class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="#" class="nav-link">Not Dropdown
                                            Link</a>
                                    </li>
                                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover
                                            Me</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="#" class="nav-link">Link</a>
                                            </li>
                                            <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link
                                                    2</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a href="#"
                                                            class="nav-link">Link</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#"
                                                            class="nav-link">Link</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#"
                                                            class="nav-link">Link</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Link 3</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Top Navigation</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Layout</a></div>
                            <div class="breadcrumb-item">Top Navigation</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">This is Example Page</h2>
                        <p class="section-lead">This page is just an example for you to create your own page.</p>
                        <div class="card">
                            <div class="card-header">
                                <h4>Example Card</h4>
                            </div>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                This is card footer
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a
                        href="https://nauval.in/">Muhamad Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>

    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="{{ asset('third-party/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('third-party/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('third-party/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('third-party/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('third-party/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src=" {{ asset('third-party/chart.js/dist/Chart.min.css') }} "></script>
    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Template JS File -->
    <script>
        const baseUrl = 'http://apotek.test';
    </script>
    <script>
        AOS.init();
    </script>
</body>

</html>
