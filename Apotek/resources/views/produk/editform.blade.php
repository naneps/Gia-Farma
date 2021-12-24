<div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="data-obatTitle">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="editproduk" nctype="multipart/form-data" class="p-2">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id_produk" id="id">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="nama_produk">Nama</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div> --}}
                        <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="harga_beli">Harga
                                    Beli</label>
                                <input type="number" name="harga_beli" id="harga_beli" class="form-control">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="harga_jual">Harga
                                    Jual</label>
                                <input type="number" name="harga_jual" id="harga_jual" class="form-control">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="diskon">Diskon</label>
                                <input type="number" name="diskon" id="diskon" class="form-control" value="0">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group ">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" value="0">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="expd">Tanggal Kadaluarsa</label>
                                <input type="date" name="expd" id="expd" class="form-control" value="0">
                                <span class="help-block with-errors"></span>
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
                            <center>
                                <img src="" width="100" alt="">
                            </center>
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
                <button type="submit" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i>
                    Simpan</button>
                <button type="button" id="batal" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                        class="fa fa-arrow-circle-left"></i> Batal</button>
            </div>
        </div>
        </form>
    </div>
</div>
