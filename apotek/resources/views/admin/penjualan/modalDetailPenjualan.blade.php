@section('css')
    <style>


    </style>
@endsection
<div class="modal fade" id="detail-penjualan" tabindex="-1" role="dialog" aria-labelledby="detailPenjualan">
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
                        <th>Kuantitas </th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>

    </script>
@endpush
