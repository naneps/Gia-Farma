<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-md" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addform" action="" method="post" class="form-horizontal">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="nama_kategori">Kategori</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                    required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                        class="fa fa-arrow-circle-left"></i> Batal</button>
            </div>
        </div>
        </form>
    </div>
</div>
