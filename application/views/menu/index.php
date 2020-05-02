<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">

      <!-- form error alert -->
      <?= form_error('menu', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

      <?= $this->session->flashdata('message'); ?>

      <!-- Button Tambah -->
      <a href="" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#newMenuModal">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text text-white">Tambah Menu</span>
      </a>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Menu</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($menu as $m) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $m['menu']; ?></td>
              <td>
                <a href="" class="badge badge-primary">edit</a>
                <a href="" class="badge badge-danger">delete</a>
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
<?php require 'modal_tambah.php'; ?>