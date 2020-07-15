<div class="main_content">
  <div class="main_content_inner">

    <div class="row">
      <div class="col-lg-6">

        <?= $this->session->flashdata('message'); ?>

        <h4>Role : <?= $role['role']; ?></h4>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Menu</th>
              <th scope="col">Access</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($menu as $m) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $m['menu']; ?></td>
                <td>
                  <div class="form-check">
                    <input class="form-check-input change-role-access" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                  </div>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>

    <!-- Modal Tambah Menu -->
    <?php require 'modal.php'; ?>

  </div>
</div>