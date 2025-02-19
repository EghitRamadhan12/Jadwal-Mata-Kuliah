<div class="modal fade" id="mataKuliahModal" tabindex="-1" role="dialog" aria-labelledby="mataKuliahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="model-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah">
                @csrf
                <div class="modal-body">
                    <div class="row py-2">
                        <div class="col-md-12" id="form-preview">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group fill form-show-validation">
                                <label>Nama Mata Kuliah</label>
                                <input type="text" class="form-control" name="mk" id="mk" placeholder="Nama Mata Kuliah">
                            </div>
                            <div class="form-group fill form-show-validation">
                                <input type="hidden" id="id" name="id">
                                <label>Program Studi</label>
                                <select class="form-control" name="id_prodi" id="id_prodi">
                                    <option value="" selected disabled hidden>Choose here</option>
                                </select>
                            </div>
                            <div class="form-group fill form-show-validation">
                                <label>sks</label>
                                <input type="number" class="form-control" name="sks" id="sks" placeholder="Jumlah SKS">
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