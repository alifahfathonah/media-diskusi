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

<!-- Modal Ubah Group -->
<div class="modal fade" id="ubahGroupModal" tabindex="-1" role="dialog" aria-labelledby="ubahGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahGroupModalLabel">Ubah Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('group/ubahgroup'); ?>" method="POST" id="formUbahGroup">
        <div class="modal-body">
          <input type="hidden" name="idGroupUbah" id="idGroupUbah">
          <div class="form-group">
            <input type="text" class="form-control" id="namaGroupUbah" name="namaGroupUbah" placeholder="Nama group">
            <small class="form-text text-danger" id="pesanErrorNamaGroupUbah"></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="deskripsiGroupUbah" name="deskripsiGroupUbah" placeholder="Deskripti group">
            <small class="form-text text-danger" id="pesanErrorDeskripsiGroupUbah"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>