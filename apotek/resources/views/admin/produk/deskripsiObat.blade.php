@extends('layouts.main')
@section('title')
    ! Deskripsi
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
                <h1>Deskripsi Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Deskripsi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Produk</h4>
                                <div class="card-header-action">

                                    {{-- <button type="button" data-target="#m-deskripsi " data-toggle="modal"
                                        class="btn btn-primary">Tambah
                                        Data</button> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tabel-deskripsi">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Produk</th>
                                                <th>Deskripsi</th>
                                                <th>Gambar</th>
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
        <script src="{{ asset('third-party/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('third-party/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('third-party/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

        <script>
            $(function() {

                // Data table
                let table = $('#tabel-deskripsi').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('deskripsi.tabel') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
                            data: 'nama_obat',
                            name: 'nama_obat'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                        {
                            data: 'gambar',
                            name: 'gambar'
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                // tambah
                $('body').on('submit', '#tambahDeskripsi', function(e) {

                    e.preventDefault()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: `${baseUrl}/deskripsi`,
                        type: 'post',
                        dataType: 'JSON',
                        data: {
                            obat_id: $('#obat_id').val(),
                            deskripsi: $('#deskripsi').val(),
                            gambar: $('#gambar').val(),
                        },
                        success: function(res) {
                            $('#m-deskripsi').modal('hide');
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

                // delete
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
                                url: `${baseUrl}/deskripsi/${id}`,
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

                // edit
                $('body').on('click', '.edit', function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    let id = $(this).data('id')
                    $.ajax({
                        url: `${baseUrl}/deskripsi/${id}`,
                        type: 'get',
                        dataType: 'JSON',

                        success: function(res) {
                            $('#id').val(res.id);
                            $('#editDeskripsi #obat_id ').val(res.obat_id);
                            $('#editDeskripsi #deskripsi ').val(res.deskripsi);
                            $('#editDeskripsi #gambar').val(res.gambar);


                        },

                    })
                })
                //
                $('body').on('submit', '#editDeskripsi', function(e) {
                    e.preventDefault();
                    let id = $('#id').val();

                    $.ajax({
                        url: `${baseUrl}/deskripsi/${id}`,
                        type: 'put',
                        dataType: 'JSON',
                        data: {
                            obat_id: $('#editDeskripsi  #obat_id').val(),
                            deskripsi: $('#editDeskripsi  #deskripsi').val(),
                            gambar: $('#editDeskripsi #gambar').val(),


                        },
                        success: function(res) {
                            $('#e-deskripsi').modal('hide');
                            iziToast.success({
                                title: 'Sukses!',
                                message: 'Data Berhasil Di edit',
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
    {{-- @include('modals.modalDeskripsi') --}}
    {{-- @include('modals.editDeskripsi' ) --}}
@endsection
