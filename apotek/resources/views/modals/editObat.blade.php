<div class="modal fade" id="edit-obat" tabindex="-1" role="dialog" aria-labelledby="edit-obatTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-obatTitle">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="p-2 " id="editObat" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="row shadow">
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="nama_obat">Nama Obat</label>
                                <input type="text" name="nama_obat" class="form-control" id="nama_obat"
                                    placeholder="Nama Obat">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="harga">Harga </label>
                                <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-3">

                            <div class="form-group">
                                <label for="stok">Stok </label>
                                <input type="number" name="stok" class="form-control" id="stok" placeholder="stok">
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori_id" id="kategori_id">

                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $data)

                                        <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label for="expd">Tanggal Kadaluarsa </label>
                                <input type="date" name="expd" class="form-control" id="expd"
                                    placeholder="Tanggal Kadaluarsa">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" class="form-control" id="gambar"
                                    placeholder="gambar">
                            </div>
                        </div>
                        <div class="col-6">

                            <img src="" class="" width="150" alt="">

                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control h-100 " rows="4" id="deskripsi" name="deskripsi"
                                    rows="2"></textarea>
                            </div>
                        </div>

                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
