@section('css')
    <style>
        .qty {
            display: flex;

        }

        .quantity-field {
            text-align: center;
            width: 40px;
            margin: 0px 5px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .qty input[type='button'] {
            background-color: #eeeeee;
            min-width: 38px;
            width: auto;
            transition: all 300ms ease;
        }

        .qty .button-minus,
        .qty .button-plus {
            font-weight: bold;
            height: 35px;
            padding: 0;
            width: 35px;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            -webkit-appearance: none;
        }

    </style>
@endsection
<div class="modal fade" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="modal-produk">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pilih Produk</h5>

                <button onclick="hideProduk()" type="button" data-bs-dismiss="modal" aria-label="Close"
                    class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered " id="tabel-produk">
                    <thead>
                        <th width="5%">No</th>
                        {{-- <th>Kode</th> --}}
                        <th>Nama</th>
                        <th>Harga </th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($dataObat as $key => $item)
                            <tr>

                                <td width="5%" style="text-align: center">{{ $key + 1 }}</td>
                                <td width="30%">{{ $item->nama_obat }} </td>
                                <td>{{ $item->harga }}</td>

                                <td width="25%">
                                    <a class="btn btn-primary btn-sm " style="color: white"
                                        onclick="pilihProduk('{{ $item->id }}')">
                                        <i class="fa fa-add"></i>
                                        Pilih
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined
                $('#quantity').val(quantity + 1);

                // Increment
            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endpush
