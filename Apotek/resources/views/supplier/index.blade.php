@extends('layouts.master')

@section('title')
    Daftar Supplier
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Suplier</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Supplier</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <button onclick="addForm('{{ route('supplier.store') }}')"
                                    class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah</button>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-stiped table-bordered">
                                    <thead>
                                        <th width="5%">No</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
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


    @includeIf('supplier.form')
    @include('supplier.editform')
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
                    url: '{{ route('supplier.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'telepon'
                    },
                    {
                        data: 'alamat'
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
            $('#modal-form .modal-title').text('Tambah Supplier');

            $('#modal-form form')[0].reset();
            $('#modal-form [name=_method]').val('post');
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=nama]').focus();

            $('body').on('submit', '#addform', function(e) {

                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('supplier.store') }}',
                    type: 'post',
                    dataType: 'JSON',
                    data: {
                        nama: $('#nama').val(),
                        telepon: $('#telepon').val(),
                        alamat: $('#alamat').val(),

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



// show edut
            $('body').on('click', '#edit', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let id = $(this).data('id')

                $.ajax({
                    url: `${baseUrl}/supplier/${id}`,
                    type: 'get',
                    dataType: 'JSON',

                    success: function(res) {
                        $('#id').val(res.id_supplier);
                        $('#editform #nama ').val(res.nama);
                        $('#editform #telepon ').val(res.telepon);
                        $('#editform #alamat ').val(res.alamat);

                    },

                })
            })
            // edit
            $('body').on('submit', '#editform', function(e) {
                e.preventDefault();
                let id = $('#id').val();
                $.ajax({
                    url: `${baseUrl}/supplier/${id}`,
                    type: 'put',
                    dataType: 'JSON',
                    data: $('#editform').serialize(),
                    // data: {
                    //     nama: $('#editfom #nama').val(),
                    //     telepon: $('#editfom #telepon').val(),
                    //     alamat: $('#editfom #alamat').val(),

                    // },
                    success: function(res) {
                        $('#modal-edit').modal('hide');
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

// delete
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
                            url: `${baseUrl}/supplier/${id}`,
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
