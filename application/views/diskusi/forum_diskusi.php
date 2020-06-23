<!-- Middle Column -->
<div class="w3-col m7" id="forum_diskusi">
  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">
          <h6 class="w3-opacity">Mulai percakapan baru</h6>
          <div class="form-group">
            <textarea name="text_content" id="text_content" cols="30" rows="10" class="form-control" placeholder="Masukan percakapan forum diskusi baru disini..."></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="image" id="image" class="form-control">
          </div>
          <!-- <p contenteditable="true" class="w3-border w3-padding text-muted">
            Disini!
          </p> -->
          <button type="button" class="w3-button w3-red">
            <i class="fa fa-remove"></i> Batal
          </button>
          <button type="button" class="w3-button w3-green float-right">
            <i class="fa fa-pencil"></i> Post
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- forum diskusi content -->
  <div class="w3-container w3-card w3-white w3-round w3-margin" v-for="forum in forumDiskusi">
    <br />
    <img src="<?= base_url('assets/img/group/default.png'); ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 60px;" />
    <span class="w3-right w3-opacity">1 min</span>
    <h4>John Doe</h4>
    <br />
    <hr class="w3-clear" />
    <p>
      {{ forum.text_content }}
    </p>
    <div class="w3-row-padding" style="margin: 0 -16px;">
      <div class="w3-half">
        <img src="<?= base_url('assets/img/group/default.png'); ?>" style="width: 100%;" alt="Northern Lights" class="w3-margin-bottom" />
      </div>
      <div class="w3-half">
        <img src="<?= base_url('assets/img/group/default.png'); ?>" style="width: 100%;" alt="Nature" class="w3-margin-bottom" />
      </div>
    </div>
    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
      <i class="fa fa-thumbs-up"></i> Like
    </button>
    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
      <i class="fa fa-comment"></i> Comment
    </button>
  </div>
  <div v-if="emptyResult" class="w3-container w3-card w3-white w3-round w3-margin">
    <h4 class="text-center text-muted">Belum ada postingan forum diskusi!</h4>
  </div>
  <!-- ./forum diskusi content -->

  <!-- <div class="w3-container w3-card w3-white w3-round w3-margin">
    <br />
    <img src="<?= base_url('assets/img/group/default.png'); ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 60px;" />
    <span class="w3-right w3-opacity">1 min</span>
    <h4>John Doe</h4>
    <br />
    <hr class="w3-clear" />
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
      eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
      enim ad minim veniam, quis nostrud exercitation ullamco laboris
      nisi ut aliquip ex ea commodo consequat.
    </p>
    <div class="w3-row-padding" style="margin: 0 -16px;">
      <div class="w3-half">
        <img src="<?= base_url('assets/img/group/default.png'); ?>" style="width: 100%;" alt="Northern Lights" class="w3-margin-bottom" />
      </div>
      <div class="w3-half">
        <img src="<?= base_url('assets/img/group/default.png'); ?>" style="width: 100%;" alt="Nature" class="w3-margin-bottom" />
      </div>
    </div>
    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
      <i class="fa fa-thumbs-up"></i> Like
    </button>
    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
      <i class="fa fa-comment"></i> Comment
    </button>
  </div> -->

  <!-- <div class="w3-container w3-card w3-white w3-round w3-margin">
    <br />
    <img src="<?= base_url('assets/img/group/default.png'); ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 60px;" />
    <span class="w3-right w3-opacity">16 min</span>
    <h4>Jane Doe</h4>
    <br />
    <hr class="w3-clear" />
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
      eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
      enim ad minim veniam, quis nostrud exercitation ullamco laboris
      nisi ut aliquip ex ea commodo consequat.
    </p>
    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
      <i class="fa fa-thumbs-up"></i> Like
    </button>
    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
      <i class="fa fa-comment"></i> Comment
    </button>
  </div> -->

  <!-- <div class="w3-container w3-card w3-white w3-round w3-margin">
    <br />
    <img src="<?= base_url('assets/img/group/default.png'); ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 60px;" />
    <span class="w3-right w3-opacity">32 min</span>
    <h4>Angie Jane</h4>
    <br />
    <hr class="w3-clear" />
    <p>Have you seen this?</p>
    <img src="<?= base_url('assets/img/group/default.png'); ?>" style="width: 100%;" class="w3-margin-bottom" />
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
      eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
      enim ad minim veniam, quis nostrud exercitation ullamco laboris
      nisi ut aliquip ex ea commodo consequat.
    </p>
    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
      <i class="fa fa-thumbs-up"></i> Like
    </button>
    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
      <i class="fa fa-comment"></i> Comment
    </button>
  </div> -->

  <!-- End Middle Column -->
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->