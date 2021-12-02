@extends('layouts.main')
@section('title')
    ! Supplier
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
                            <div class="card-header">
                                <h4>Tabel</h4>
                                <div class="card-header-action">
                                    <button type="button" data-target="#m-supplier" id="btn-tambah" data-toggle="modal"
                                        class="btn btn-primary">Tambah
                                        Data</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tabel-supplier">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama </th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
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
                let table = $('#tabel-supplier').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('supplier.tabel') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
                            data: 'nama_sup',
                            name: 'nama_sup'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'telepon',
                            name: 'telepon'
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                })
                //delete
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
                //  tambah
                $('body').on('submit', '#tambahSupplier', function(e) {

                    e.preventDefault()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: `${baseUrl}/supplier`,
                        type: 'post',
                        dataType: 'JSON',
                        data: {
                            nama_sup: $('#nama_sup').val(),
                            alamat: $('#alamat').val(),
                            telepon: $('#telepon').val(),
                        },
                        success: function(res) {
                            $('#m-supplier').modal('hide');
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

            })
        </script>
    @endpush
    @include('modals.modalSupplier')
@endsection
