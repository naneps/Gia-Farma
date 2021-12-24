@extends('layouts.master')

@section('title')
    Daftar Produk
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Produk</li>
@endsection

@section('content')
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
                    <div class="card-header">
                        <h4>Tabel Produk</h4>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header with-border">
                                        <div class="btn-group">
                                            <button ton onclick=" addForm('{{ route('produk.store') }}')"
                                                class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>
                                                Tambah</button>
                                            <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')"
                                                class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i>
                                                Hapus</button>
                                            <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')"
                                                class="btn btn-info btn-xs btn-flat"><i class="fa fa-barcode"></i> Cetak
                                                Barcode</button>
                                        </div>
                                    </div>
                                    <div class="box-body table-responsive">
                                        <form action="" method="post" class="form-produk">
                                            @csrf
                                            <table id="tb_produk" class="table table-stiped table-bordered">
                                                <thead>
                                                    <th width="5%">
                                                        <input type="checkbox" name="select_all" id="select_all">
                                                    </th>
                                                    <th width="5%">No</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Harga Jual</th>
                                                    <th>Stok</th>
                                                    <th width="15%"><i class="fa fa-cog"></i></th>
                                                </thead>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    @include('produk.form')
    @include('produk.detail')
    @include('produk.editform')
@endsection

@push('js')
    <script>
        let table;

        $(function() {
            table = $('#tb_produk').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('produk.data') }}',
                },
                columns: [{
                        data: 'select_all',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_produk'
                    },
                    {
                        data: 'nama_produk'
                    },
                    {
                        data: 'nama_kategori'
                    },


                    {
                        data: 'harga_jual'
                    },

                    {
                        data: 'stok'
                    },

                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });



            $('[name=select_all]').on('click', function() {
                $(':checkbox').prop('checked', this.checked);
            });
        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('div').remove('img');
            $('#modal-form .modal-title').text('Tambah Produk');
            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nama_produk]').focus();

            // tambah
            $('body').on('submit', '#formproduk', function(e) {
                let expd = ''
                $('#expd').val() == '' ? expd : expd = moment($('#expd').val()).format('Y-M-D')


                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `${baseUrl}/produk`,
                    type: 'post',
                    dataType: 'JSON',
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,
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


        function showDetail() {
            $('#modal-detail').modal('show');
            $('body').on('click', '#detail', function(e) {

                let id = $(this).data('id')
                $.ajax({
                    url: `${baseUrl}/produk/${id}`,
                    type: 'get',
                    dataType: 'JSON',

                    success: function(res) {
                        console.log(res);


                        $('#modal-detail #harga_beli').text(res.harga_beli);
                        $('#modal-detail #stok').text(res.stok);
                        $('#modal-detail #diskon').text(res.diskon);
                        $('#modal-detail #deskripsi').text(res.deskripsi);
                        $('#modal-detail #expd').text(res.expd);



                        $('#modal-detail #gambar ').prop('src', `${baseUrl}/img/produk/${res.gambar}`);


                    },
                })
            })
        }

        function editForm() {
            $('#edit-form').modal('show');
            $('body').on('click', '#edit', function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let id = $(this).data('id')
                $.ajax({
                    url: `${baseUrl}/produk/${id}`,
                    type: 'get',
                    dataType: 'JSON',

                    success: function(res) {

                        $('#id').val(res.id_produk);
                        $('#editproduk #nama_produk').val(res.nama_produk);
                        $('#editproduk #id_kategori').val(res.id_kategori);

                        $('#editproduk #harga_jual').val(res.harga_jual);
                        $('#editproduk #harga_beli').val(res.harga_beli);
                        $('#editproduk #stok').val(res.stok);
                        $('#editproduk #diskon').val(res.diskon);
                        $('#editproduk #deskripsi').val(res.deskripsi);
                        $('#editproduk #expd').val(res.expd);



                        $('#editproduk img ').prop('src', `${baseUrl}/img/produk/${res.gambar}`);


                    },
                })
            })



            $('body').on('submit', '#editproduk', function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let expd = ''
                $('#editproduk #expd').val() == '' ? expd : expd = moment($('#editObat #expd').val()).format(
                    'Y-M-D')
                $.ajax({
                    url: `${baseUrl}/produk/${id}`,
                    type: 'post',
                    dataType: 'JSON',
                    data: new FormData(this),
                    cache: false,
                    processData: false,
                    contentType: false,

                    success: function(res) {
                        $('#edit-form').modal('hide');
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

        function deleteData(url) {
            Swal.fire({
                title: 'Hapus Data ??',
                //   text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    Swal.fire(
                        'Terhapus!',
                        'data berhasil diapus.',
                        'success'
                    )
                    table.ajax.reload();
                }
            })
        }

        function deleteSelected(url) {
            if ($('input:checked').length > 1) {
                if (confirm('Yakin ingin menghapus data terpilih?')) {
                    $.post(url, $('.form-produk').serialize())
                        .done((response) => {
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menghapus data');
                            return;
                        });
                }
            } else {
                alert('Pilih data yang akan dihapus');
                return;
            }
        }

        function cetakBarcode(url) {
            if ($('input:checked').length < 1) {
                alert('Pilih data yang akan dicetak');
                return;
            } else if ($('input:checked').length < 3) {
                alert('Pilih minimal 3 data untuk dicetak');
                return;
            } else {
                $('.form-produk')
                    .attr('target', '_blank')
                    .attr('action', url)
                    .submit();
            }
        }
    </script>
@endpush
