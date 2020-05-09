<!-- Modal Tambah Role -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role'); ?>" method="POST" id="formTambahRole">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="role" class="form-control" placeholder="Nama Role" autofocus>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Role -->
<div class="modal fade" id="ubahRoleModal" tabindex="-1" role="dialog" aria-labelledby="ubahRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahRoleModalLabel">Ubah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/ubahrole'); ?>" method="POST" id="formUbahRole">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <input type="text" id="role" name="role" class="form-control" placeholder="Nama Role" autofocus>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary buttonRole"><i class="fas fa-download"></i> Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>