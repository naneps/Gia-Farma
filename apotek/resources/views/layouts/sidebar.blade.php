    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="#">Gia Farma </a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class=" {{ in_array(Request::segment(1), ['dashboard']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link  {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"><i
                            class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>



                <li class="menu-header">Master Data</li>

                <li class=" {{ in_array(Request::segment(1), ['pelanggan']) ? 'active' : '' }}">
                    <a href="{{ route('pelanggan.index') }}"
                        class="nav-link  {{ Request::segment(1) == 'pelanggan' ? 'active' : '' }}"><i
                            class="fas fa-fire"></i><span>Data Pelanggan</span></a>
                </li>
                <li
                    class="dropdown {{ in_array(Request::segment(1), ['obat', 'kategori', 'deskripsi']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-capsules"></i> <span>Produk</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-link {{ Request::segment(1) == 'obat' ? 'active' : '' }}"><a
                                class="nav-link" href="
                    {{ route('obat.index') }}">
                                <span>Data Produk</span></a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'kategori' ? 'active' : '' }}"><a
                                class="nav-link" href="
                    {{ route('kategori.index') }}">
                                <span>Kategori</span></a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'deskripsi' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('deskripsi.tabel') }}">
                                <span>Deskripsi Produk</span></a>
                        </li>

                    </ul>
                </li>

                <li class=" {{ in_array(Request::segment(1), ['supplier']) ? 'active' : '' }}">
                    <a href="{{ route('supplier.index') }}"
                        class="nav-link  {{ Request::segment(1) == 'supplier' ? 'active' : '' }}"><i
                            class="fas fa-fire"></i><span>Data Supplier</span></a>
                </li>

                <li class="menu-header">Transaksi</li>
                <li
                    class="dropdown {{ in_array(Request::segment(1), ['penjualan', 'transaksipenjualan', 'grafik']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cash-register"></i>
                        <span>Penjualan</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-link {{ Request::segment(1) == 'transaksipenjualan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('transaksipenjualan.index') }}">Transaksi
                            </a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'penjualan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('penjualan.index') }}">Data Penjualan
                            </a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'penjualan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('penjualan.index') }}">Grafik Penjualan</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown {{ in_array(Request::segment(1), ['pembelian']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-shopping-cart"></i> <span>Pembelian</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-link {{ Request::segment(1) == 'pembelian' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('pembelian.index') }}">Data Pembelian </a>
                        </li>
                        <li class="nav-link {{ Request::segment(1) == 'stastistik' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('pembelian.index') }}">Grafik Pembelian</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown {{ in_array(Request::segment(1), ['pesanan']) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cash-register"></i>
                        <span>Pesanan</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-link {{ Request::segment(1) == 'pesanan' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('pesanan.index') }}"> Data Pesanan</a></li>
                        <li class="nav-link {{ Request::segment(1) == 'pembelian' ? 'active' : '' }}"><a
                                class="nav-link" href=" {{ route('pembelian.index') }}">Bukti Pembayaran</a>
                        </li>
                    </ul>
                </li>


                <li class="menu-header">Manajemen</li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Pengguna</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="">Role</a></li>

                    </ul>
                </li>
        </aside>
    </div>
