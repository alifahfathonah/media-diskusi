<!-- Modal Tambah Group -->
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newGroupModalLabel">Tambah Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('group'); ?>" method="POST" id="formTambahGroup">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="namaGroupTambah" name="namaGroupTambah" placeholder="Nama group">
            <small class="form-text text-danger" id="pesanErrorNamaGroupTambah"></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="deskripsiGroupTambah" name="deskripsiGroupTambah" placeholder="Deskripti group">
            <small class="form-text text-danger" id="pesanErrorDeskripsiGroupTambah"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>