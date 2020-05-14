<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-8">
      <!-- Button Tambah -->
      <a href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#newGroupModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text text-white">Tambah Group</span>
      </a>
    </div>
    <!-- Button Cari -->
    <div class="col-lg-4 justify-content-end">
      <form action="<?= base_url('group'); ?>" method="POST">
        <div class="input-group">
          <input type="text" class="form-control form-control-sm" id="keyword_group" name="keyword_group" placeholder="Cari group" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary btn-sm" type="submit" name="cari_group" id="button-addon2"><i class="fas fa-search"></i></button>
          </div>
          <div class="input-group-append">
            <a href="<?= base_url('group/resetcarigroup'); ?>" class="btn btn-sm btn-info"><i class="fas fa-redo fa-sm"></i></a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">

      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Group</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($group as $g) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $g['group_name']; ?></td>
              <td><?= $g['group_desc']; ?></td>
              <td>
                <a href="<?= base_url('group/ubahgroup/') . $g['id']; ?>" class="badge badge-success tampilModalUbahMenu" id="tampilModalUbahMenu" data-id="<?= $g['id'] ?>" data-toggle="modal" data-target="#ubahMenuModal"><i class="fas fa-edit"></i> edit</a>
                <a href="<?= base_url('group/hapusgroup/') . $g['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i> delete</a>
              </td>
            </tr>
          <?php $i++;
          endforeach; ?>
        </tbody>
        <!-- <caption>Total Results : <?= $total_rows; ?></caption> -->
      </table>

      <?php if (empty($group)) : ?>
        <div class="alert alert-danger text-center">Tidak ada data ditemukan!</div>
      <?php endif; ?>

      <!-- cetak pagination -->
      <!-- <?= $this->pagination->create_links(); ?> -->

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah Menu -->
<?php require 'modal.php'; ?>