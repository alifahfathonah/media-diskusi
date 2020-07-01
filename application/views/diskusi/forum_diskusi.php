<!-- Middle Column -->
<div class="w3-col m7" id="forum_diskusi">
  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">
          <h6 class="w3-opacity">Mulai percakapan baru</h6>
          <div class="form-group">
            <textarea name="text_content" id="text_content" cols="30" rows="10" class="form-control" :class="{'is-invalid': formValidate.text_content}" v-model="forum_diskusi.text_content" placeholder="Masukan percakapan forum diskusi baru disini..."></textarea>
            <small class="text-danger has-text-danger" v-html="formValidate.text_content"></small>
          </div>
          <label for="image" class="text-muted">Gambar</label>
          <div style="height: 150px; width: 150px;" class="border rounded mx-auto" @click="$refs.image.click()">
            <div class="form-group">
              <input type="file" name="image" id="image" class="form-control" ref="image" @change="previewImage" style="display:none">
              <img :src="avatar" height="150px" width="150px" class="img-thumbnail">
            </div>
          </div>
          <button type="button" class="w3-button w3-red" @click="batal">
            <i class="fa fa-remove"></i> Batal
          </button>
          <button type="button" class="w3-button w3-green float-right" @click="postDiskusi">
            <i class="fa fa-pencil"></i> Post
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- forum diskusi content -->
  <div class="w3-container w3-card w3-white w3-round w3-margin" v-for="forum in forumDiskusi">
    <br />
    <img :src="gambarUser(forum.image)" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width: 60px;" />
    <!-- button hapus ini akan terlihat hanya pada pemiliki postingan -->
    <div class="dropdown w3-right ml-2">
      <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-h"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <button class="dropdown-item bg-danger"><i class="fas fa-trash"></i> Hapus</button>
      </div>
    </div>
    <span class="w3-right w3-opacity">32 min</span>
    <h4>{{ forum.name }}</h4>
    <br />
    <hr class="w3-clear" />
    <img :src="gambarForum(forum.image_forum)" style="width: 100%;" class="w3-margin-bottom" />
    <p>{{ forum.text_content }}</p>
    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom">
      <i class="fa fa-thumbs-up"></i> Like
    </button>
    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom">
      <i class="fa fa-comment"></i> Comment
    </button>
  </div>
  <div v-if="emptyResult" class="w3-container w3-card w3-white w3-round w3-margin">
    <h3 class="text-center text-muted">Belum ada postingan diskusi!</h3>
  </div>
  <!-- ./forum diskusi content -->

  <!-- End Middle Column -->
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->