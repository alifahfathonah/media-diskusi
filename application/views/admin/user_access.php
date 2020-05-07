<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">

      <?= $this->session->flashdata('message'); ?>

      <table class="table table-hover">
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
                <a href="" class="badge badge-success" data-toggle="modal" data-target="#ubahUserAccess"><i class="fas fa-pencil-ruler"></i> Ubah Access</a>
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