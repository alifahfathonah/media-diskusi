<div class="main_content">
  <div class="main_content_inner">

    <!-- Flash Message -->
    <?= $this->session->flashdata('message'); ?>

    <div class="row mb-3">
      <div class="col-lg-8">
        <!-- Add Button -->
        <a href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#newSubmenuModal">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text text-white">Tambah Submenu</span>
        </a>
      </div>

      <!-- Search Button -->
      <div class="col-lg-4 justify-content-end">
        <form action="<?= base_url('menu/submenu'); ?>" method="POST">
          <div class="input-group">
            <input type="text" class="form-control form-control-sm" id="keyword_submenu" name="keyword_submenu" placeholder="Cari submenu" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary btn-sm" type="submit" name="cari_submenu" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
            <div class="input-group-append">
              <a href="<?= base_url('menu/resetcarisubmenu'); ?>" class="btn btn-sm btn-info"><i class="fas fa-redo fa-sm"></i></a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-lg">

        <table class="table table-hover table-sm" id="data-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Menu</th>
              <th scope="col">Url</th>
              <th scope="col">Icon</th>
              <th scope="col">Active</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($subMenu as $sm) : ?>
              <tr>
                <th scope="row"><?= ++$start; ?></th>
                <td><?= $sm['title']; ?></td>
                <td><?= get_menu_by_id($sm['menu_id']); ?></td>
                <td><?= $sm['url']; ?></td>
                <td><?= $sm['icon']; ?></td>
                <td><?= $sm['is_active'] == 1 ? '<span class="text-success font-weight-bold">Aktif</span>' : '<span class="text-danger font-weight-bold">Tidak Aktif</span>' ?></td>
                <td>
                  <a href="" class="badge badge-success tampilModalUbahSubmenu" id="tampilModalUbahSubmenu" data-id="<?= $sm['id']; ?>" data-toggle="modal" data-target="#modalUbahSubmenu"><i class="fas fa-edit"></i> edit</a>
                  <a href="<?= base_url('menu/hapussubmenu/') . $sm['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i> delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <caption>Total Result : <?= $total_rows; ?></caption>
        </table>

        <!-- cetak pagination -->
        <?= $this->pagination->create_links(); ?>

      </div>
    </div>

  </div>
</div>

<!-- Modal Tambah Menu -->
<?php require 'modal.php'; ?>