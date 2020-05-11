<!-- Modal Tambah Menu -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="POST" id="formTambahMenu">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="menuTambah" name="menuTambah" placeholder="Nama menu">
            <small class="form-text text-danger" id="pesanErrorMenuTambah"></small>
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

<!-- Modal Ubah Menu -->
<div class="modal fade" id="ubahMenuModal" tabindex="-1" role="dialog" aria-labelledby="ubahMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahMenuModalLabel">Ubah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/ubahmenu'); ?>" method="POST" id="formUbahMenu">
        <div class="modal-body">
          <input type="hidden" id="idUbahMenu" name="idUbahMenu">
          <div class="form-group">
            <input type="text" class="form-control" id="menuUbahMenu" name="menuUbahMenu" placeholder="Nama menu">
            <small class="form-text text-danger" id="pesanErrorMenuUbah"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Tambah Sub Menu -->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubmenuModalLabel">Tambah Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="POST" id="formTambahSubMenu">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Nama submenu">
            <small class="form-text text-danger" id="pesanErrorTitle"></small>
          </div>
          <div class="form-group">
            <select name="menu_id" id="menu_id" class="form-control">
              <option value="">Pilih Menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="form-text text-danger" id="pesanErrorMenu"></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
            <small class="form-text text-danger" id="pesanErrorUrl"></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
            <small class="form-text text-danger" id="pesanErrorIcon"></small>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary submitBtn"><i class="fas fa-download"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Sub Menu -->
<div class="modal fade" id="modalUbahSubmenu" tabindex="-1" role="dialog" aria-labelledby="modalUbahSubmenuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUbahSubmenuLabel">Ubah Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/ubahsubmenu'); ?>" method="POST" id="formUbahSubMenu">
        <div class="modal-body">
          <input type="hidden" id="idUbah" name="idUbah">
          <div class="form-group">
            <input type="text" class="form-control" id="titleUbah" name="titleUbah" placeholder="Nama submenu">
            <small class="form-text text-danger" id="pesanErrorTitleUbah"></small>
          </div>
          <div class="form-group">
            <select name="menuIdUbah" id="menuIdUbah" class="form-control">
              <option value="">Pilih Menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="form-text text-danger" id="pesanErrorMenuUbah"></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="urlUbah" name="urlUbah" placeholder="Submenu Url">
            <small class="form-text text-danger" id="pesanErrorUrlUbah"></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="iconUbah" name="iconUbah" placeholder="Submenu icon">
            <small class="form-text text-danger" id="pesanErrorIconUbah"></small>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="is_activeUbah" name="is_activeUbah" checked>
              <label class="form-check-label" for="is_activeUbah">
                Active?
              </label>
            </div>
            <small class="form-text text-danger" id="pesanErrorIsActiveUbah"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i> Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>