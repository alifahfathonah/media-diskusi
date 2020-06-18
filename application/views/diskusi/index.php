<!-- Begin Page Content -->
<div class="container-fluid" id="diskusi">

  <div class="row mb-3">

    <div class="col-lg-12">
      <ul class="list-group list-group-flush">
        <!-- batas bawah ini yang akan di loop -->
        <?php for ($i = 1; $i <= 5; $i++) : ?>
          <li class="list-group-item list-group-item-action">
            <div class="row">
              <div class="col-md-8">
                <a href="<?= base_url('diskusi/forum'); ?>" style="text-decoration: none !important;">
                  <img src="<?= base_url('assets/img/group/default.png'); ?>" class="img-thumbnail rounded-circle" height="50px" width="50px">
                  <span class="text-dark font-weight-bold">Group <?= $i; ?></span>
                  <br>
                  <small class="text-secondary">120.20 percakapan</small>
                </a>
              </div>
              <div class="col-md-4">
                <a href="<?= base_url('diskusi/forum'); ?>" class="text-secondary" style="text-decoration: none !important;">
                  <div class="mt-4 text-success">Lihat percakapan</div>
                </a>
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