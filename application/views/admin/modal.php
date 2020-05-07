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
      <form id="formTambahRole" action="<?= base_url('admin/role'); ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <input type="text" id="role" name="role" class="form-control" placeholder="Nama Role">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary buttonRole"><i class="fas fa-download"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah User Access -->
<div class="modal fade" id="ubahUserAccess" tabindex="-1" role="dialog" aria-labelledby="ubahUserAccessLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahUserAccessLabel">Ubah User Access</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/useraccess'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <select name="" id="" class="form-control">
              <option value="Pilih Access">Pilih Access</option>
              <?php foreach ($role as $r) : ?>
                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>