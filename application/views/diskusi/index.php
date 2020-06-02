<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row mb-3">
    <div class="col-lg-12">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="row text-dark font-weight-bold">
            <div class="col-md-4">Group</div>
            <div class="col-md-4">Description</div>
            <div class="col-md-2">Jumlah Peserta</div>
            <div class="col-md-2">Manage</div>
          </div>
        </li>
        <!-- batas bawah ini yang akan di loop -->
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <li class="list-group-item list-group-item-action">
            <div class="row">
              <div class="col-md-4">
                <a href="<?= base_url('diskusi/forum'); ?>" style="text-decoration: none !important;">
                  <img src="<?= base_url('assets/img/group/default.png'); ?>" class="img-thumbnail rounded-circle" height="50px" width="50px">
                  <span class="text-dark font-weight-bold">Group 1</span>
                  <br>
                  <small class="text-secondary">Dibuat oleh <span class="text-success">Admin</span>1 days ago</small>
                </a>
              </div>
              <div class="col-md-4">
                <a href="<?= base_url('diskusi/forum'); ?>" class="text-secondary" style="text-decoration: none !important;">
                  <div class="mt-4 text-dark">Description Group 1</div>
                </a>
              </div>
              <div class="col-md-2">
                <div class="mt-4 text-dark">0 <i class="fas fa-users text-warning"></i></div>
              </div>
              <div class="col-md-2">
                <div class="dropdown mt-3">
                  <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item bg-success" data-toggle="modal" data-target="#groupModal"><i class="fas fa-edit"></i> Ubah</button>
                    <button class="dropdown-item bg-danger" data-toggle="modal" data-target="#groupModal"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php endfor; ?>
      </ul>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->