<div class="main_content">
  <div class="main_content_inner">

    <div class="row">
      <div class="col-lg-6">

        <?= $this->session->flashdata('message'); ?>

        <table class="table table-hover table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Level</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($allUser as $u) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $u['email']; ?></td>
                <td><?= check_user_level($u['role_id']); ?></td>
                <td>
                  <select name="roleId" id="role" class="form-control form-control-sm">
                    <option value="">Pilih Level</option>
                    <?php foreach ($role as $r) : ?>
                      <option value="" class="change-user-access" data-userid="<?= $u['id']; ?>" data-roleid="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>

  </div>
</div>

<!-- Modal Tambah Menu -->
<?php require 'modal.php'; ?>