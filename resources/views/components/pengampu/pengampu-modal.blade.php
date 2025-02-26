<div class="modal fade" id="pengampuModal" tabindex="-1" role="dialog" aria-labelledby="pengampuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Tambah Data</h5>
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
                                <label>Nama Dosen </label>
                                <select class="form-control" name="id_dosen" id="id_dosen">
                                    <option value="" selected disabled hidden>Choose here</option>
                                </select>
                            </div>
                            <div class="form-group fill form-show-validation">
                                <input type="hidden" id="id" name="id">
                                <label>Mata Kuliah</label>
                                <select class="form-control" name="id_mk" id="id_mk">
                                    <option value="" selected disabled hidden>Pilih hari</option>
                                </select>
                            </div>
                            <div class="form-group fill form-show-validation">
                                <label>Nama Kelas</label>
                                <select class="form-control" name="id_kelas" id="id_kelas">
                                    <option value="" selected disabled hidden>Choose here</option>
                                </select>
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