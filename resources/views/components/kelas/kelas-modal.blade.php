<div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="dosenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    @csrf
                    <div class="row py-2">
                        <div class="col-md-12" id="form-preview">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group fill form-show-validation">
                                <input type="hidden" id="id" name="id">
                                <label>Nama Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>