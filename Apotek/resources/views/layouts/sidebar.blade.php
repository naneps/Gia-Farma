    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="#">{{$setting->nama_perusahaan}}</a> </a>
            </div>
            {{-- <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
                </div>n
                <div class="pull-left info">
                    <p>{{ auth()->user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div> --}}

            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class=" {{ in_array(Request::segment(1), ['dashboard']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link  {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"><i
                            class="fas fa-home"></i><span>Dashboard</span></a>
                </li>



                <li class="menu-header">Master Data</li>

                <li
                    class="dropdown {{ in_array(Request::segment(1), ['produk', 'kategori', 'deskripsi']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-capsules"></i> <span>Produk</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-link {{ Request::segment(1) == 'produk' ? 'active' : '' }}"><a
                                class="nav-link" href="
                    {{ route('produk.index') }}">
                                <span>Data Produk</span></a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'kategori' ? 'active' : '' }}"><a
                                class="nav-link" href="
                    {{ route('kategori.index') }}">
                                <span>Kategori</span></a>
                        </li>
                        {{-- <li class="nav-link {{ Request::segment(1) == 'deskripsi' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('deskripsi.tabel') }}">
                                <span>Deskripsi Produk</span></a>
                        </li> --}}

                    </ul>
                </li>

                <li class=" {{ in_array(Request::segment(1), ['supplier']) ? 'active' : '' }}">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link  {{ Request::segment(1) == 'supplier' ? 'active' : '' }}"> <i class="fas fa-truck"></i><span>Data Supplier</span></a>
                </li>

                <li class="menu-header">Transaksi</li>
                <li
                    class="dropdown {{ in_array(Request::segment(1), ['penjualan', 'transaksipenjualan', 'grafik']) ? 'active' : '' }}">
                    <a href="{{ route('pengeluaran.index') }}" class="nav-link"><i
                            class="fas fa-cash-register"></i>
                        <span>Pengeluaran</span></a>
                </li>
                <li
                    class="dropdown {{ in_array(Request::segment(1), ['penjualan', 'transaksipenjualan', 'grafik']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cash-register"></i>
                        <span>Penjualan</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-link {{ Request::segment(1) == 'transaksipenjualan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('transaksi.index') }}">Transaksi
                            </a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'penjualan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('penjualan.index') }}">Data Penjualan
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown {{ in_array(Request::segment(1), ['pembelian']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-shopping-cart"></i> <span>Pembelian</span>
                    </a>
                    <ul class="dropdown-menu">
                        {{-- <li class="nav-link {{ Request::segment(1) == 'transaksipenjualan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('transaksipembelian.index') }}">Transaksi
                            </a>
                        </li> --}}
                        <li class="nav-link {{ Request::segment(1) == 'pembelian' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('pembelian.index') }}">Data Pembelian </a>
                        </li>
                        {{-- <li class="nav-link {{ Request::segment(1) == 'stastistik' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('pembelian.index') }}">Grafik Pembelian</a>
                        </li> --}}
                    </ul>
                </li>
                <li class="dropdown {{ in_array(Request::segment(1), ['laporan']) ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}" class="nav-link ">
                        <i class="fas fa-file-medical-alt"></i> <span>laporan</span>
                    </a>
                </li>


                {{-- <li class="menu-header">Manajemen</li> --}}
                {{-- <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Setting</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('setting.index') }}">pengaturan</a></li>
                        <li><a class="nav-link" href="{{ route('user.index') }}">user</a></li>

                    </ul>
                </li> --}}
        </aside>
    </div>
