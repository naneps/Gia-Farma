@extends('layouts.main')
@section('title')
    Transaksi | Penjualan
@endsection
@section('css')
    <style>
        .grup-qty {
            display: flex;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        :root {
            --red: #e00b0b;
            --softgreen: #8ce38c;
            --softblue: #7075ff;
            --purpBLue: #5403ff;
            --freshGreen: #28e10a;
            --freshRed: #f50000;
        }

        #kuantitas {

            text-align: center;
            width: 30px;
            height: 30px;
            font-weight: 500;
        }

        .plus,
        .minus {
            width: 30px;
            height: 30px;
        }

        .hapus {
            background: var(--freshRed);
            color: var(--freshRed);
        }

    </style>
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaksi Penjualan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Transaksi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 ">
                                    <center>
                                        <button type="button" onclick="tampilProduk()" data-bs-togle="modal"
                                            class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus-circle"></i>
                                            Pilih Produk</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-8 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Transaksi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="tabel-transaksi">
                                            <thead>
                                                <tr>
                                                    <th width="5%" class="text-center">
                                                        #
                                                    </th>
                                                    {{-- <th>Tanggal Penjuualan</th> --}}
                                                    <th>Nama Obat</th>
                                                    <th>Harga</th>
                                                    <th>Kuantitas</th>
                                                    <th>Subtotal </th>
                                                    <th width="5 " class="text-center">Action</th>
                                                </tr>
                                                <form id="createtransaksi" method="POST">
                                                    @csrf
                                            </thead>



                                        </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Nota</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Purchase Code</label>
                                        <input type="text" class="form-control purchase-code"
                                            placeholder="ASDF-GHIJ-KLMN-OPQR">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="text" disabled class="form-control currency">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



        </section>
    </div>
    @include('modals.modalproduk')
    @push('js')
        <script>
            let table;
            $(function() {
                table = $('#tabel-produk').DataTable();

                // tambah
                $('body').on('submit', '#createtransaksi', function(e) {
                    e.preventDefault()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: `${baseUrl}/transaksipenjualan`,
                        type: 'post',
                        dataType: 'JSON',
                        data: {

                            obat_id: $(`id-${id}`).val(),
                            harga: $(`.harga-${id}`).text(),
                            kuantitas: $(`.qty-${id}`).val(),
                            subtotal: $(`.subtotal-${id}`).text()

                        },
                        success: function(res) {
                            console.log(res);

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

            function tampilProduk() {
                $('#modal-produk').modal('show');
            }

            function hideProduk() {
                $('#modal-produk').modal('hide');
            }

            function pilihProduk(id) {

                $.ajax({
                    url: `${baseUrl}/obat/${id}`,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(res) {
                        hideProduk()
                        let no = $('#tabel-transaksi tbody tr').length
                        // let kuantitas = $('qty').val();

                        let data =
                            `  <tr><td>${++no}</td>
                <input type="hidden" class="id-${res.id}" value="${res.id}">
                <td id="nama_obat">${res.nama_obat}</td>
                <td id="harga" class="harga-${res.id}">${res.harga}</td>
                <td class"grup-qty"">
                      <button type="button" class="btn btn-icon btn-danger minus" field="quantity" onclick="minus(${res.id})"><i
                        class="fas fa-minus"></i></button>
                <input type="number" id="kuantitas"  value="1" class="qty-${res.id} " />
                <button type="button" class="btn-success plus" field="quantity" onclick="plus(${res.id})"><i
                        class="fas fa-plus"></i></button>
                </td>
                <td id="subtotal" class="subtotal-${res.id}">${res.harga}</td>
                <td><button type="button" class="btn-danger "><i class="fas fa-trash"></i></button>
                    </td></tr>`
                        $('#tabel-transaksi').append(data);
                    },

                })
            } //endtampilprofuk
            function minus(res) {
                // changeQuantity(-1, this);
                $(`.qty-${res}`).val(parseInt($(`.qty-${res}`).val()) - 1)
                let price = parseInt($(`.harga-${res}`).text());
                let qty = parseInt($(`.qty-${res}`).val())
                let total = price * qty;
                $(`.subtotal-${res}`).text(total)
                console.log(res);

            }

            function plus(res) {

                // changeQuantity(-1, this);
                $(`.qty-${res}`).val(parseInt($(`.qty-${res}`).val()) + 1)
                let price = parseInt($(`.harga-${res}`).text());
                let qty = parseInt($(`.qty-${res}`).val())
                let total = price * qty;
                $(`.subtotal-${res}`).text(total)

            }
        </script>
        <script>
            function tambahProduk() {
                $.post('{{ route('transaksipenjualan.store') }}', $('.form-produk').serialize())
                    .done(response => {
                        iziToast.success({
                            title: 'Sukses!',
                            message: 'Data Berhasil Ditambah',
                            position: 'topCenter'
                        });
                        table.ajax.reload()
                    })
                    .fail(errors => {

                        return;
                    });
            }
        </script>
    @endpush
@endsection
