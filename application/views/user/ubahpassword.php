<div class="main_content">
  <div class="main_content_inner">

    <div class="row">
      <div class="col-lg-6">
        <?= $this->session->userdata('message'); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <form action="<?= base_url('user/ubahpassword'); ?>" method="POST">
          <div class="form-group">
            <label for="current_password">Password Sekarang</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
            <small class="form-text text-danger"><?= form_error('current_password'); ?></small>
          </div>
          <div class="form-group">
            <label for="new_password1">Password Baru</label>
            <input type="password" class="form-control" id="new_password1" name="new_password1">
            <small class="form-text text-danger"><?= form_error('new_password1'); ?></small>
          </div>
          <div class="form-group">
            <label for="new_password2">Konfirmasi Password</label>
            <input type="password" class="form-control" id="new_password2" name="new_password2">
            <small class="form-text text-danger"><?= form_error('new_password2'); ?></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Ubah Password</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>