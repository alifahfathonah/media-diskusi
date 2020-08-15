<style>
  input[type="file"] {
    display: inline-block;
    opacity: 0;
    position: absolute;
    margin-left: 10px;
    margin-right: 10px;
    padding-top: 20px;
    padding-bottom: 67px;
    width: 85%;
    z-index: 99;
    margin-top: 10px;
    cursor: pointer;
  }

  .custom-file-upload {
    position: relative;
    display: inline-block;
    cursor: pointer;
    padding-top: 20px;
    padding-bottom: 20px;
    background: url(http://www.a-yachtcharter.com/search-fleet/webaccess/assets/img/uploadIcon.png) #fff center center no-repeat;
    width: 100%;
    border: 1px dashed #000 !important;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
    text-align: center;
  }
</style>

<!-- contents -->
<div class="main_content" id="profile_group">

  <div class="main_content_inner pt-0" v-for="g in group">

    <div class="single-group">
      <div class="group-cover">

        <!--Signle group cover -->
        <img :src="gambarGroup(g.group_image)" alt="">

      </div>

      <div class="single-group-details">
        <div class="left-side">
          <div class="single-group-image">
            <a href="#" class="text-decoration-none">
              <img :src="gambarGroup(g.group_image)" alt="">
            </a>
          </div>
          <div class="single-group-details-info">
            <h3> {{g.group_name}} </h3>
            <p>
              <p> <i class="uil-thumbs-up"></i> {{g.jumlah_peserta}} Joined Group </p>
            </p>
          </div>
        </div>

        <div class="right-side">
          <?php if ($role != 'Mahasiswa') : ?>
            <div class="btn-subscribe">
              <a :href="route('group/verifikasi/' + g.id_grup)" class="button primary text-decoration-none"> <i class="uil-thumbs-up"></i> Verifikasi New User
              </a>
              <span class="subs-amount"> {{g.jumlah_peserta}} </span>
            </div>
          <?php else : ?>
            <div class="btn-subscribe">
              <a href="#" class="button primary text-decoration-none"> <i class="uil-thumbs-up"></i> Join
              </a>
              <span class="subs-amount"> {{g.jumlah_peserta}} </span>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="nav-single-group" uk-sticky="offset:61;media : @s">
        <nav class="responsive-tab">
          <ul>
            <li class="uk-active"><a class="active text-decoration-none" href="#"> Discussions </a></li>
            <li><a href="#" class="text-decoration-none"> Members </a></li>
            <li><a href="#" class="text-decoration-none"> Photos </a></li>
            <li><a href="#" class="text-decoration-none"> Videos </a></li>
          </ul>
        </nav>
        <form class="nav-single-group-saerchbox">
          <i class="uil-search"></i>
          <input class="uk-input" type="text" value="Search ...">
        </form>
      </div>


    </div>

    <div class="section-small">

      <!-- falsh message ketika postingan berhasil! -->
      <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="postingBerhasil">
        {{pesanPostingBerhasil}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div uk-grid>

        <div class="uk-width-2-3@m fead-area">

          <!-- input post -->
          <div class="post-newer mt-4">
            <div class="post-new" uk-toggle="target: body ; cls: post-focus">
              <div class="post-new-media">
                <div class="post-new-media-user">
                  <img :src="gambarUser(user.image)" alt="" />
                  <!-- ini harusnya foto profile setiap user yg login -->
                </div>
                <div class="post-new-media-input">
                  <input type="text" class="uk-input" placeholder="What's Happening?" />
                  <!-- input klik sini tar muncul pop up -->
                </div>
              </div>
              <hr />
            </div>

            <div class="post-pop">
              <div class="post-new-overyly" uk-toggle="target: body ; cls: post-focus"></div>

              <div class="post-new uk-animation-slide-top-small">
                <div class="post-new-header">
                  <h4>Create New Post</h4>
                  <!-- Close Button-->
                  <span class="post-new-btn-close" uk-toggle="target: body ; cls: post-focus" uk-tooltip="title:Close; pos: left "></span>
                </div>

                <div class="post-new-media">
                  <div class="post-new-media-input">
                    <div class="form-group">
                      <textarea name="text_content" id="text_content" cols="57" rows="5" class="form-control" :class="{'is-invalid': formValidate.text_content}" v-model="postDiskusi.text_content" placeholder="What's Happening <?= $user['name']; ?>?" autofocus></textarea>
                      <small class="text-danger has-text-danger" v-html="formValidate.text_content"></small>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="post-new-media">
                  <label for="file-upload" class="custom-file-upload">
                    <div class="post-new-media-input">
                      <div style="height: 150px; width: 150px;" class="border rounded mx-auto" @click="$refs.image.click()">
                        <input type="file" name="image" id="image" class="uk-input" ref="image" @change="previewImage">
                        <img :src="avatar" height="200px" width="200px" class="img-thumbnail">
                      </div>
                    </div>
                  </label>
                </div>

                <div class="uk-flex uk-flex-between">
                  <!-- ini class buat button submit -->
                  <a class="button danger px-6" @click="cancelPost" uk-toggle="target: body ; cls: post-focus"> Cancel </a>
                  <a class="button primary px-6" @click="posting"> Post </a>
                </div>
              </div>
            </div>
          </div>
          <!-- ./input post -->

          <div class="post" v-for="post in postingan">
            <div class="post-heading">
              <div class="post-avature">
                <img :src="gambarUser(post.image)" alt="">
              </div>
              <div class="post-title">
                <h4> {{post.name}} </h4>
                <p> 9 <span> hrs </span> <i class="uil-users-alt"></i> </p>
              </div>
              <div class="post-btn-action">
                <span class="icon-more uil-ellipsis-h"></span>
                <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                  <ul class="uk-nav uk-dropdown-nav">
                    <li><a href="#" class="text-decoration-none"> <i class="uil-share-alt mr-1"></i> Share </a> </li>
                    <li><a :href="'<?= base_url('group/hapusPostingan/') ?>' + post.id_forum" class="text-decoration-none"> <i class="uil-trash-alt mr-1"></i> Delete </a> </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="post-description">
              <div class="fullsizeimg text-center">
                <img :src="gambarPostingan(post.image_forum)" alt="" />
                <!-- ini kalo misal post poto ya, kalo gamau di coment aja atau fihapus -->
              </div>

              <p> {{post.text_content}} </p>
              <div class="post-state-details">
                <div>
                  <img src="<?= base_url('assets/images/icons/reactions_love.png'); ?>" alt="">
                  <p> 13 </p>
                </div>
                <p> 24 Comments </p>
              </div>

            </div>

            <div class="post-state">
              <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 126<span> Liked </span></div>
              <div class="post-state-btns"> <i class="uil-chat"></i> 18 <span> Coments</span></div>
              <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared </span></div>
            </div>

            <!-- post comments -->
            <div class="post-comments">
              <div v-for="comments in comment">
                <div v-for="c in comments">
                  <div class="post-comments-single" v-if="c.id_forum == post.id_forum">
                    <div class="post-comment-avatar">
                      <img :src="gambarUser(c.image)" alt="">
                    </div>
                    <div class="post-comment-text">
                      <div class="post-comment-text-inner">
                        <h6> {{c.name}} </h6>
                        <p> {{c.text_comment}} </p>
                      </div>
                      <div class="uk-text-small">
                        <a href="#" class="text-danger mr-1 text-decoration-none"> <i class="uil-heart"></i> Love </a>
                        <a href="#" class="mr-1 text-decoration-none"> Replay </a>
                        <span> 9 hrs </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <form action="<?= base_url('group/comment'); ?>" method="POST">
                <div class="post-add-comment">
                  <div class="post-add-comment-avature">
                    <img :src="gambarUser(user.image)" alt="">
                  </div>
                  <div class="post-add-comment-text-area">
                    <input type="hidden" name="id_grup" id="id_grup" :value="post.id_grup">
                    <input type="hidden" name="id_forum" id="id_forum" :value="post.id_forum">
                    <input type="text" name="text_comment" id="text_comment" placeholder="Write Your Comment Here ...">
                  </div>
                  <button class="btn btn-primary btn-sm ml-2 px-3" type="submit"><i class="fas fa-paper-plane"></i></button>
                </div>
              </form>
            </div>
            <!-- ./post comment -->

          </div>
          <div class="col-lg-12 text-center" v-if="emptyResultPostingan">
            <h2 class="font-weight-bold">there are no <span class="text-primary">discussion posts</span></h2>
          </div>

        </div>

        <!-- sidebar -->
        <div class="uk-width-expand">

          <h3> Info </h3>
          <div class="list-group-items">
            <i class="uil-thumbs-up"></i>
            <h5> <span class="mr-1"> {{ g.jumlah_peserta }} </span> Members Joined <p class="text-success mb-0 ml-2">
                +4 This week </p>
            </h5>
          </div>

          <div class="list-group-items">
            <i class="uil-list-ul"></i>
            <h5> <span class="mr-1"> 100 </span> Posts <p class="text-primary mb-0 ml-2"> +2 Daily
              </p>
            </h5>
          </div>

          <?php if ($role != 'Mahasiswa') : ?>
            <a :href="route('group/updateGroup/' + g.id_grup)" class="button soft-primary block my-3 text-decoration-none"> Edit </a>
          <?php endif; ?>

          <hr class="my-3">


          <h3> Description </h3>

          <p> {{g.group_desc}} </p>

          <a href="#" class="button secondary block my-3 text-decoration-none"> See All </a>

          <hr class="mt-3 mb-2">

          <div uk-sticky="offset:140 ; bottom:true ; meda : @m">


            <div class="section-header pt-2">
              <div class="section-header-left">
                <h3> Members </h3>
              </div>
              <div class="section-header-right">
                <a href="#" class="see-all text-primary text-decoration-none"> See All</a>
              </div>
            </div>

            <div class="uk-child-width-1-1@m uk-grid-collapse" uk-grid>
              <div v-for="member in members">
                <div class="list-items">
                  <div class="list-item-media">
                    <img :src="gambarUser(member.image)" alt="">
                  </div>
                  <div class="list-item-content">
                    <a href="group-feed.html" class="text-decoration-none">
                      <h5> {{member.name}} </h5>
                    </a>
                    <p> {{member.email}} </p>
                  </div>
                </div>
              </div>
            </div>

            <a href="#" class="button secondary block my-3 text-decoration-none"> See All </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>