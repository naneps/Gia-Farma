@extends('layouts.master')

@section('title')
    Daftar Pengeluaran
@endsection

@section('content')
    <div class="main-content">


        <section class="section">
            <div class="section-header">
                <h1>Rekap Pengeluaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Pengeluaran</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <button onclick="addForm('{{ route('pengeluaran.store') }}')"
                                    class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah</button>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stiped table-bordered">
                                    <thead>
                                        <th width="5%">No</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Nominal</th>
                                        <th width="15%"><i class="fa fa-cog"></i></th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>


    @includeIf('pengeluaran.form')
@endsection

@push('js')
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pengeluaran.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'deskripsi'
                    },
                    {
                        data: 'nominal'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });


        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Pengeluaran');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=deskripsi]').focus();
            // tambah
            $('body').on('submit', '#modal-form', function(e) {

                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('pengeluaran.store') }}',
                    type: 'post',
                    dataType: 'JSON',
                    data: {
                        nominal: $('#nominal').val(),
                        deskripsi: $('#deskripsi').val(),

                    },
                    success: function(res) {
                        $('#modal-form').modal('hide');
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
        }

        function editForm() {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Pengeluaran');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', );
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=deskripsi]').focus();

            $('body').on('click', '#edit', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let id = $(this).data('id')
                let url = `${baseUrl}/pengeluaran/${id}`
                $.ajax({
                    url: `${baseUrl}/pengeluaran/${id}`,
                    type: 'get',
                    dataType: 'JSON',

                    success: function(res) {
                        $('#id').val(res.id_pengeluaran);
                        $('#modal-form #deskripsi ').val(res.deskripsi);
                        $('#modal-form #nominal ').val(res.nominal);
                        $("<input>").attr({
                            name: "pengeluaran",
                            id: "id",
                            type: "hidden",
                            value: id
                        }).appendTo("form");
                    },

                })
            })
            $('body').on('submit', '#modal-form', function(e) {
                e.preventDefault();
                let id = $('#id').val();
                $.ajax({
                    url: `${baseUrl}/pengeluaran/${id}`,
                    type: 'put',
                    dataType: 'JSON',
                    data: {
                        deskripsi: $('#modal-form #deskripsi').val(),
                        nominal: $('#modal-form #nominal').val(),

                    },
                    success: function(res) {
                        $('#modal-form').modal('hide');
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
        }

        function deleteData() {
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
                            url: `${baseUrl}/pengeluaran/${id}`,
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
        }
    </script>
@endpush
