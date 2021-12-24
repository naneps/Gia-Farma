@extends('layouts.master')
@section('title')
    |Kategori
@endsection
@section('css')
    <link href="{{ asset('third-party/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('third-party/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
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
                                <h4 class="title">Tambah Kategori</h4>

                            </div>
                            <div class="card-body">
                                <form class="p-2 " id="formkategori" method="post">
                                    @csrf


                                    <div class="form-group ">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                            placeholder="Kategori">
                                    </div>




                                    <div class="row">

                                        <div class="col-8">

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
                                    <table class="table table-striped" id="tabel_kategori">
                                        <thead>
                                            <tr>
                                                <th widht="5$" class="text-center">
                                                    #
                                                </th>
                                                <th>Nama Kategori</th>

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


    @includeIf('kategori.form')
@endsection

@push('js')
    <script src="{{ asset('third-party/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('third-party/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('third-party/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <script>
        let table;

        $(function() {
            table = $('#tabel_kategori').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('kategori.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_kategori'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });




            // tambah
            $('body').on('submit', '#formkategori', function(e) {

                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('kategori.store') }}',
                    type: 'post',
                    dataType: 'JSON',
                    data: {
                        nama_kategori: $('#nama_kategori').val(),

                    },
                    success: function(res) {
                        // $('#m-kategori').modal('hide');
                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Data Berhasil Ditambah',
                            position: 'topRight'
                        });
                        $("#formkategori").trigger('reset');
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
            $('body').on('click', '#hapus', function() {
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
            $('body').on('click', '#edit', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let id = $(this).data('id')
                let url = `${baseUrl}/kategori/${id}`
                $.ajax({
                    url: `${baseUrl}/kategori/${id}`,
                    type: 'get',
                    dataType: 'JSON',

                    success: function(res) {
                        $('#id').val(res.id_kategori);
                        $('#formkategori #nama_kategori ').val(res.nama_kategori);
                        $('.card-header .title').text('Edit Kategori');
                        $('#formkategori button ').text("Edit");
                        $('#formkategori #nama_kategori ').focus();
                        $("#formkategori").attr("method", "put");
                        $("#formkategori").attr("action", url);
                        $("form").attr("id", "editform");
                        $("<input>").attr({
                            name: "id_kategori",
                            id: "id",
                            type: "hidden",
                            value: id
                        }).appendTo("form");




                    },

                })
            })
            $('body').on('submit', '#editform', function(e) {
                e.preventDefault();
                let id = $('#id').val();

                $.ajax({
                    url: `${baseUrl}/kategori/${id}`,
                    type: 'put',
                    dataType: 'JSON',
                    data: {
                        nama_kategori: $('#editform #nama_kategori').val(),



                    },
                    success: function(res) {
                        $("form").trigger('reset');

                        $('.card-header .title').text('Tambah Kategori');
                        $('#editform button ').text("Tambah");
                        $("#editform").attr("method", "post");
                        $("#editform").attr("action", "");
                        $("form").attr("id", "formkategori");

                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Data Berhasil Diubah',
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

        });
    </script>
@endpush
