<div class="main_content">
  <div class="main_content_inner">

    <div class="row mb-3 uk-flex uk-flex-between">
      <div class="col-lg-8">
        <!-- Button Tambah -->
        <a href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#newMenuModal">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text text-white">Tambah Menu</span>
        </a>
      </div>
      <div class="col-lg-4 justify-content-end">
        <form action="<?= base_url('menu'); ?>" method="POST">
          <div class="input-group">
            <input type="text" class="form-control form-control-sm" id="keyword_menu" name="keyword_menu" placeholder="Cari menu" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary btn-sm" type="submit" name="cari_menu" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
            <div class="input-group-append">
              <a href="<?= base_url('menu/resetcarimenu'); ?>" class="btn btn-sm btn-info"><i class="fas fa-redo fa-sm"></i></a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">

        <!-- form error alert -->
        <?= form_error('menu', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <table class="table table-hover table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Menu</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($menu as $m) : ?>
              <tr>
                <th scope="row"><?= ++$start; ?></th>
                <td><?= $m['menu']; ?></td>
                <td>
                  <a href="<?= base_url('menu/ubah/') . $m['id']; ?>" class="badge badge-success tampilModalUbahMenu" id="tampilModalUbahMenu" data-id="<?= $m['id'] ?>" data-toggle="modal" data-target="#ubahMenuModal"><i class="fas fa-edit"></i> edit</a>
                  <a href="<?= base_url('menu/hapus/') . $m['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fas fa-trash"></i> delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <caption>Total Results : <?= $total_rows; ?></caption>
        </table>

        <!-- cetak pagination -->
        <?= $this->pagination->create_links(); ?>

      </div>
    </div>

    <!-- Modal Tambah Menu -->
    <?php require 'modal.php'; ?>

  </div>
</div>