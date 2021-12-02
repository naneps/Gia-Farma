@extends('layouts.main')
@section('title')
    |Kategori
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
                <h1>Kategori</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Kategori</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">

                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Kategori</h4>

                            </div>
                            <div class="card-body">
                                <form class="p-2 " id="tambahKategori" method="post">
                                    @csrf


                                    <div class="form-group ">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" name="kategori" class="form-control" id="kategori"
                                            placeholder="Kategori">
                                    </div>

                                    <div class="form-group">
                                        <label for="harga">Satuan</label>
                                        <input type="text" name="satuan" class="form-control" id="satuan" placeholder="">
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                        <div class="col-6">

                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kategori dan Satuan Obat</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tabel-kategori">
                                        <thead>
                                            <tr>
                                                <th widht="5$" class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Kategori</th>
                                                <th>Satuan Obat</th>
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
                let table = $('#tabel-kategori').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('kategori.tabel') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
                            data: 'kategori',
                            name: 'kategori'
                        },
                        {
                            data: 'satuan',
                            name: 'satuan'
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
                $('body').on('submit', '#tambahKategori', function(e) {

                    e.preventDefault()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: `${baseUrl}/kategori`,
                        type: 'post',
                        dataType: 'JSON',
                        data: {
                            kategori: $('#kategori').val(),
                            satuan: $('#satuan').val(),
                        },
                        success: function(res) {
                            $('#m-kategori').modal('hide');
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
                                url: `${baseUrl}/kategori/${id}`,
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
                        url: `${baseUrl}/kategori/${id}`,
                        type: 'get',
                        dataType: 'JSON',

                        success: function(res) {
                            $('#id').val(res.id);
                            $('#editKategori #kategori ').val(res.kategori);
                            $('#editKategori #satuan').val(res.satuan);


                        },

                    })
                })
                $('body').on('submit', '#editKategori', function(e) {
                    e.preventDefault();
                    let id = $('#id').val();

                    $.ajax({
                        url: `${baseUrl}/kategori/${id}`,
                        type: 'put',
                        dataType: 'JSON',
                        data: {
                            kategori: $('#editKategori  #kategori').val(),
                            satuan: $('#editKategori #satuan').val(),


                        },
                        success: function(res) {
                            $('#e-kategori').modal('hide');
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
    @include('modals.modalKategori')
    @include('modals.editKategori')
@endsection
