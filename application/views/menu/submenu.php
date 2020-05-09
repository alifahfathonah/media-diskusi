<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg">

      <!-- form error alert -->
      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger text-center" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>


      <?= $this->session->flashdata('message'); ?>

      <!-- Button Tambah -->
      <a href="" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newSubmenuModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text text-white">Tambah Submenu</span>
      </a>

      <table class="table table-hover">
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
          <?php $i = 1; ?>
          <?php foreach ($subMenu as $sm) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $sm['title']; ?></td>
              <td><?= $sm['menu']; ?></td>
              <td><?= $sm['url']; ?></td>
              <td><?= $sm['icon']; ?></td>
              <td><?= $sm['is_active']; ?></td>
              <td>
                <a href="" class="badge badge-success tampilModalUbahSubmenu" id="tampilModalUbahSubmenu" data-id="<?= $sm['id']; ?>" data-toggle="modal" data-target="#modalUbahSubmenu"><i class="fas fa-edit"></i> edit</a>
                <a href="<?= base_url('menu/hapussubmenu/') . $sm['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i> delete</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Menu -->
<?php require 'modal.php'; ?>