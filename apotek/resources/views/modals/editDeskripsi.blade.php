<div class="modal fade  " id="e-deskripsi" tabindex="-1" role="dialog" aria-labelledby="deskripsiTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deskripsiTitle">Edit Deskripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="editDeskripsi" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="obat_id">Nama Produk</label>
                                <select search class="form-control" id="obat_id">
                                    <option selected disabled>Nama Obat</option>
                                    @foreach ($dataObat as $obat)
                                        <option value='{{ $obat->id}}'>{{ $obat->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="text" name="gambar" class="form-control" id="gambar"
                                    placeholder="gambar">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2"></textarea>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
