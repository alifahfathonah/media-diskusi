<div class="main_content">
  <div class="main_content_inner">
    <!-- here -->
    <div class="row">
      <div class="col-lg-8">
        <div style="width: 20rem;">
          <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $user['name']; ?></h5>
            <p class="card-text"><?= $user['email']; ?></p>
            <small class="text-muted">Bergabung sejak <?= date('Y', $user['date_created']); ?></small>
          </div>
          <div class="card-body">
            <a href="<?= base_url('user'); ?>" class="btn btn-secondary">Kembali</a>
            <a href="<?= base_url('user/edit'); ?>" class="btn btn-success float-right">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- ./here -->
  </div>