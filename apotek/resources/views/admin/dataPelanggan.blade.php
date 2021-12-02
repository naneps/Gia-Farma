@extends('layouts.main')
@section('title')
    ! pelanggan
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
                <h1>Data Pelanggan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Pelanggan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Pelanggan</h4>
                                <div class="card-header-action">

                                    {{-- <button type="button" data-target="#m-pelanggan " data-toggle="modal"
                                        class="btn btn-primary">Tambah
                                        Data</button> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tabel-pelanggan">
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

        {{-- <script>
            $(function() {

                // Data table
                let table = $('#tabel-pelanggan').DataTable({
                    processing: true,
                    serverSide: true,
                    // ajax: "{{ route('pelanggan.tabel') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'telepo',
                            name: 'telepon'
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
                // $('body').on('submit', '#tambahpelanggan', function(e) {

                //     e.preventDefault()
                //     $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         }
                //     });
                //     $.ajax({
                //         url: `${baseUrl}/pelanggan`,
                //         type: 'post',
                //         dataType: 'JSON',
                //         data: {
                //             obat_id: $('#obat_id').val(),
                //             pelanggan: $('#pelanggan').val(),
                //             gambar: $('#gambar').val(),
                //         },
                //         success: function(res) {
                //             $('#m-pelanggan').modal('hide');
                //             iziToast.success({
                //                 title: 'Sukses!',
                //                 message: 'Data Berhasil Ditambah',
                //                 position: 'topRight'
                //             });
                //             table.ajax.reload()
                //         },
                //         error: function(xhr) {
                //             var res = xhr.responseJSON;
                //             if ($.isEmptyObject(res) == false) {
                //                 $.each(res.errors, function(key, value) {
                //                     iziToast.error({
                //                         title: 'Error',
                //                         message: `${value}`,
                //                         position: 'topRight'
                //                     });
                //                 });
                //             }
                //         }
                //     })
                // })

                // // delete
                // $('body').on('click', '.delete', function() {
                //     let id = $(this).data('id')

                //     Swal.fire({
                //         title: 'Hapus Data ?',
                //         showCancelButton: true,
                //         confirmButtonText: 'Hapus!',
                //         cancelButtonText: `Batal`,
                //     }).then((result) => {
                //         /* Read more about isConfirmed, isDenied below */
                //         if (result.isConfirmed) {
                //             $.ajaxSetup({
                //                 headers: {
                //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //                 }
                //             });
                //             $.ajax({
                //                 url: `${baseUrl}/pelanggan/${id}`,
                //                 type: 'delete',
                //                 dataType: 'JSON',

                //                 success: function(res) {
                //                     iziToast.success({
                //                         title: 'Sukses!',
                //                         message: 'Data Berhasil Dihapus',
                //                         position: 'topRight'
                //                     });
                //                     table.ajax.reload()
                //                 },

                //             })
                //         }
                //     })
                // })

                // // edit
                // $('body').on('click', '.edit', function() {
                //     $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         }
                //     });
                //     let id = $(this).data('id')
                //     $.ajax({
                //         url: `${baseUrl}/pelanggan/${id}`,
                //         type: 'get',
                //         dataType: 'JSON',

                //         success: function(res) {
                //             $('#id').val(res.id);
                //             $('#editpelanggan #obat_id ').val(res.obat_id);
                //             $('#editpelanggan #pelanggan ').val(res.pelanggan);
                //             $('#editpelanggan #gambar').val(res.gambar);


                //         },

                //     })
                // })
                // //
                // $('body').on('submit', '#editpelanggan', function(e) {
                //     e.preventDefault();
                //     let id = $('#id').val();

                //     $.ajax({
                //         url: `${baseUrl}/pelanggan/${id}`,
                //         type: 'put',
                //         dataType: 'JSON',
                //         data: {
                //             obat_id: $('#editpelanggan  #obat_id').val(),
                //             pelanggan: $('#editpelanggan  #pelanggan').val(),
                //             gambar: $('#editpelanggan #gambar').val(),


                //         },
                //         success: function(res) {
                //             $('#e-pelanggan').modal('hide');
                //             iziToast.success({
                //                 title: 'Sukses!',
                //                 message: 'Data Berhasil Di edit',
                //                 position: 'topRight'
                //             });
                //             table.ajax.reload()
                //         },
                //         error: function(xhr) {
                //             var res = xhr.responseJSON;
                //             if ($.isEmptyObject(res) == false) {
                //                 $.each(res.errors, function(key, value) {
                //                     iziToast.error({
                //                         title: 'Error',
                //                         message: `${value}`,
                //                         position: 'topRight'
                //                     });
                //                 });
                //             }
                //         }
                //     })
                // })
            })
        </script> --}}

    @endpush
    {{-- @include('modals.modalpelanggan') --}}
    {{-- @include('modals.editpelanggan' ) --}}
@endsection
