<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-md" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    @method('post')
                    <div class="  row">


                        <div class="col-lg-6">
                            <div class="form-group ">

                                <label for=" deskripsi" class="col-lg-2 col-lg-offset-1 control-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" autofocus>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for=" nominal" class="col-lg-2 col-lg-offset-1 control-label">Nominal</label>
                                <input type="number" name="nominal" id="nominal" class="form-control" required>

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
