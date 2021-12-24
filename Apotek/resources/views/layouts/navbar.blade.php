<header id="header" class="fixed-top  header-transparent ">
     <div class="container d-flex align-items-center justify-content-between">

         <div class="logo d-flex">
             <a href="index.html"><img width="70" height="190" src="{{$setting->path_logo}}" alt="" class="img-fluid"></a>
             <h1><a href="">{{ $setting->nama_perusahaan }}</a></h1>
             <!-- Uncomment below if you prefer to use an image logo -->
         </div>

         <nav id="navbar" class="navbar">
             <ul>
                 <li><a class="nav-link scrollto  {{ Request::segment(2) == 'beranda' ? 'active' : '' }}" href="{{ url('landing/beranda') }}">Beranda</a></li>
                 <li><a class="nav-link scrollto  {{ Request::segment(2) == 'produk' ? 'active' : '' }}" href="{{ url('landing/produk') }}">Produk</a></li>
                 <li><a class="nav-link scrollto  {{ Request::segment(2) == 'kontak' ? 'active' : '' }}" href="{{ url('landing/kontak') }}">Tentang Kami</a></li>

                 <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar --><div id="topbar" class="d-flex align-items-center fixed-top">
            <div class="container d-flex justify-content-between">

              </div>
            </div>
          </div>



     </div>
 </header><!--
