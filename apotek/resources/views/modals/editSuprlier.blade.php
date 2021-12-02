<div class="modal fade" id="e-supplier" tabindex="-1" role="dialog" aria-labelledby="supplierTitle"
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
                <form class="p-2 " id="edit-supplier" method="post">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="">nama_sup</label>
                                <input type="text" name="nama_sup" class="form-control" id="nama_sup" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="telepon" class="form-control" id="telepon" placeholder="">
                            </div>
                        </div>
                        <div class="col">
                            <div class=" form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control h-100" row="4" id="alamat" name="alamat"
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
