<!-- contents -->
<div class="main_content" id="profile_group">

  <div class="main_content_inner pt-0" v-for="g in group">

    <div class="single-group">
      <div class="group-cover">

        <!--Signle group cover -->
        <img :src="gambar(g.group_image)" alt="">

      </div>

      <div class="single-group-details">
        <div class="left-side">
          <div class="single-group-image">
            <a href="#" class="text-decoration-none">
              <img :src="gambar(g.group_image)" alt="">
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
      <div uk-grid>

        <div class="uk-width-2-3@m fead-area">

          <!-- input post -->
          <div class="post-newer mt-4">
            <div class="post-new" uk-toggle="target: body ; cls: post-focus">
              <div class="post-new-media">
                <div class="post-new-media-user">
                  <img src="<?= base_url('assets/images/avatars/avatar-1.jfif'); ?>" alt="" />
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
                  <div class="post-new-media-user">
                    <img src="<?= base_url('assets/images/avatars/avatar-1.jfif'); ?>" alt="" />
                  </div>
                  <div class="post-new-media-input">
                    <input type="text" class="uk-input" placeholder="What's Happening Melanaumi ?" />
                    <!-- placeholder input nya kalo bisa sih ambil nama user, kalo bisa aja kak -->
                  </div>
                </div>

                <div class="post-new-tab-nav">
                  <!-- ini tu sebenernya ak kasi buat misal nanti bisa upload foto, file, dll, tp kalo gausa ya di off in aja atau dihapus aja -->
                  <a href="#" uk-tooltip="title:Close">
                    <i class="uil-image"></i>
                  </a>
                  <a href="#"> <i class="uil-user-plus"></i> </a>
                  <a href="#"> <i class="uil-video"></i> </a>
                  <a href="#"> <i class="uil-record-audio"></i> </a>
                  <a href="#"> <i class="uil-file-alt"></i> </a>
                  <a href="#"> <i class="uil-emoji"></i> </a>
                  <a href="#"> <i class="uil-gift"></i> </a>
                </div>

                <div class="uk-flex uk-flex-between">
                  <!-- ini class buat button submit -->
                  <a href="#" class="button primary px-6"> Share </a>
                </div>
              </div>
            </div>
          </div>
          <!-- ./input post -->

          <div class="post">
            <div class="post-heading">
              <div class="post-avature">
                <img :src="gambar(g.group_image)" alt="">
              </div>
              <div class="post-title">
                <h4> {{g.group_name}} </h4>
                <p> 9 <span> hrs </span> <i class="uil-users-alt"></i> </p>
              </div>
              <div class="post-btn-action">
                <span class="icon-more uil-ellipsis-h"></span>
                <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                  <ul class="uk-nav uk-dropdown-nav">
                    <li><a href="#" class="text-decoration-none"> <i class="uil-share-alt mr-1"></i> Share </a> </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="post-description">

              <p> PENGUMUMAN bagi seluruh mahasiswa TI Angkatan 2017 - 2019 bahwa SE Ditiadakan </p>
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
              <div class="post-state-btns"> <i class="uil-heart"></i> 18 <span> Coments</span></div>
              <div class="post-state-btns"> <i class="uil-share-alt"></i> 193 <span> Shared </span></div>
            </div>

            <!-- post comments -->
            <div class="post-comments">
              <div class="post-comments-single">
                <div class="post-comment-avatar">
                  <img src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" alt="">
                </div>
                <div class="post-comment-text">
                  <div class="post-comment-text-inner">
                    <h6> Monica Tifani </h6>
                    <p> yah ga asik </p>
                  </div>
                  <div class="uk-text-small">
                    <a href="#" class="text-danger mr-1 text-decoration-none"> <i class="uil-heart"></i> Love </a>
                    <a href="#" class="mr-1 text-decoration-none"> Replay </a>
                    <span> 9 hrs </span>
                  </div>
                </div>
                <a href="#" class="post-comment-opt text-decoration-none"></a>
              </div>

              <div class="post-add-comment">
                <div class="post-add-comment-avature">
                  <img src="<?= base_url('assets/images/avatars/avatar-1.jfif'); ?>" alt="">
                </div>
                <div class="post-add-comment-text-area">
                  <input type="text" placeholder="Write Your Comment Here ...">
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- sidebar -->
        <div class="uk-width-expand">

          <h3> Info </h3>
          <div class="list-group-items">
            <i class="uil-thumbs-up"></i>
            <h5> <span class="mr-1"> {{g.jumlah_peserta}} </span> Members Joined <p class="text-success mb-0 ml-2">
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

              <div>
                <div class="list-items">
                  <div class="list-item-media">
                    <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="">
                  </div>
                  <div class="list-item-content">
                    <a href="group-feed.html" class="text-decoration-none">
                      <h5> Mahsa Savira </h5>
                    </a>
                    <p> Mahasiwa Teknik Informatika 2017 </p>
                  </div>
                </div>
              </div>

              <div>
                <div class="list-items">
                  <div class="list-item-media">
                    <img src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" alt="">
                  </div>
                  <div class="list-item-content">
                    <a href="group-feed.html" class="text-decoration-none">
                      <h5> Monica Tifani </h5>
                    </a>
                    <p> Engineering </p>
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