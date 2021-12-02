<div class="modal fade" id="e-kategori" tabindex="-1" role="dialog" aria-labelledby="kategoriTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriTitle">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="p-2 " id="editKategori" method="post">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" id="kategori"
                                    placeholder="Kategori">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="harga">Satan</label>
                                <input type="text" name="satuan" class="form-control" id="satuan" placeholder="">
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
