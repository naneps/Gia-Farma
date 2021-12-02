@extends('layouts.main')
@section('title')
    |Produk
@endsection
@section('css')
    <link href="{{ asset('third-party/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('third-party/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    {{-- @include('layouts.topbar')
    @include('layouts.sidebar') --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Produk</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header  ">
                        <h4>Tabel Produk</h4>
                        <div class="card-header-action">
                            <button type="button" data-target="#data-obat" id="btn-tambah" data-toggle="modal"
                                class="btn btn-primary">Tambah
                                Produk</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table tabel-obat">
                                <thead>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    {{-- <th>gambar</th>
                                    <th>Deskripsi</th> --}}
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_obat }}</td>
                                                    <td>{{ $item->harga }}</td>
                                                    <td>{{ $item->stok }}</td>
                                                    <td>{{ $item->kategori }}</td>
                                                    <td>{{ $item->expd }}</td>
                                                    <td><button class="btn"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button class="btn"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>

                                                </tr>
                                            @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('js')

        <script src="{{ asset('third-party/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('third-party/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('third-party/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>


        <script>
            $(function() {
                // Data table
                let table = $('.tabel-obat').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('obat.tabel') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
                            data: 'nama_obat',
                            name: 'nama_obat'
                        },
                        {
                            data: 'harga',
                            name: 'harga,'
                        },
                        {
                            data: 'stok',
                            name: 'stok,'
                        },
                        {
                            data: 'kategori.kategori',
                            name: 'kategori.kategori,'
                        },
                        {
                            data: 'kategori.satuan',
                            name: 'kategori.satuan,'
                        },
                        {
                            data: 'expd',
                            name: 'expd,'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
                $('body').on('click', '#btn-tambah', function() {

                    $('#tambahObat').trigger('reset');
                })

                // tambah
                $('body').on('submit', '#tambahObat', function(e) {

                    let expd = ''
                    $('#expd').val() == '' ? expd : expd = moment($('#expd').val()).format('Y-M-D')


                    e.preventDefault()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: `${baseUrl}/obat`,
                        type: 'post',
                        dataType: 'JSON',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            $('#data-obat').modal('hide');
                            iziToast.success({
                                title: 'Sukses!',
                                message: 'Data Berhasil Ditambah',
                                position: 'topRight'
                            });
                            table.ajax.reload()
                        },
                        error: function(xhr) {
                            var res = xhr.responseJSON;
                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function(key, value) {
                                    iziToast.error({
                                        title: 'Error',
                                        message: `${value}`,
                                        position: 'topRight'
                                    });
                                });
                            }
                        }
                    })
                })


                // Delete Obat

                $('body').on('click', '.delete', function() {
                    let id = $(this).data('id')
                    Swal.fire({
                        title: 'Hapus Data ?',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: `Batal`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: `${baseUrl}/obat/${id}`,
                                type: 'delete',
                                dataType: 'JSON',

                                success: function(res) {
                                    iziToast.success({
                                        title: 'Sukses!',
                                        message: 'Data Berhasil Dihapus',
                                        position: 'topRight'
                                    });
                                    table.ajax.reload()
                                },

                            })
                        }
                    })
                })

                // Edit
                $('body').on('click', '.edit', function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    let id = $(this).data('id')
                    $.ajax({
                        url: `${baseUrl}/obat/${id}`,
                        type: 'get',
                        dataType: 'JSON',

                        success: function(res) {
                            console.log(res);
                            $('#id').val(res.id);
                            $('#editObat #nama_obat ').val(res.nama_obat);
                            $('#editObat #harga ').val(res.harga);
                            $('#editObat #kategori_id ').val(res.kategori_id);
                            $('#editObat #expd ').val(res.expd);
                            $('#editObat #stok ').val(res.stok);
                            $('#editObat #deskripsi ').val(res.deskripsi);
                            $('#editObat img ').prop('src', `${baseUrl}/img/obat/${res.gambar}`);

                        },

                    })
                })
                $('body').on('submit', '#editObat', function(e) {
                    e.preventDefault();
                    let id = $('#id').val();
                    let expd = ''
                    $('#editObat #expd').val() == '' ? expd : expd = moment($('#editObat #expd').val()).format(
                        'Y-M-D')
                    $.ajax({
                        url: `${baseUrl}/obat/${id}`,
                        type: 'post',
                        dataType: 'JSON',
                        data: new FormData(this),
                        cache: false,
                        processData: false,
                        contentType: false,

                        success: function(res) {
                            $('#edit-obat').modal('hide');
                            iziToast.success({
                                title: 'Sukses!',
                                message: 'Data Berhasil Ditambah',
                                position: 'topRight'
                            });
                            table.ajax.reload()
                        },
                        error: function(xhr) {
                            var res = xhr.responseJSON;
                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function(key, value) {
                                    iziToast.error({
                                        title: 'Error',
                                        message: `${value}`,
                                        position: 'topRight'
                                    });
                                });
                            }
                        }
                    })
                })
            })
        </script>
    @endpush
    @include('modals.modalObat')
    @include('modals.editObat')
@endsection
