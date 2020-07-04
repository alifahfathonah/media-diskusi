<div class="main_content">
  <!-- </div> -->
  <div class="main_content_inner pt-0">
    <div class="profile">
      <div class="profile-cover">

        <!-- profile cover -->
        <img src="<?= base_url('assets/images/background/bg-01.jpg'); ?>" alt=""> <!-- harusnya ini background si profil user -->

        <a href="#"> <i class="uil-camera"></i> Edit </a> <!-- harusnya ini link buat edit profil-->

      </div>

      <div class="profile-details">
        <div class="profile-image">
          <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="">
          <a href="#"> </a>
        </div>
        <div class="profile-details-info">
          <h1> <?= $user['name']; ?> </h1>

          <p> <?= $user['email']; ?> <a href="<?= base_url('user/edit') ?>"> Edit </a></p>
          <!-- <p> Mahasiswa Teknik Informatika Angkatan 2017 <a href="#"> Edit </a></p> harusnya ini link buat edit deskripsi -->
        </div>

      </div>
    </div>


    <div class="section-small">

      <div uk-grid>

        <div class="uk-width-2-3@m fead-area">

          <div class="post-new" uk-toggle="target: body ; cls: post-focus">
            <div class="post-new-media">
              <div class="post-new-media-user">
                <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt=""> <!-- ini harusnya foto profile setiap user yg login -->
              </div>
              <div class="post-new-media-input">
                <input type="text" class="uk-input" placeholder="What's Happening?"> <!-- input klik sini tar muncul pop up -->
              </div>
            </div>
            <hr>
          </div>

          <div class="post-pop">
            <div class="post-new-overyly" uk-toggle="target: body ; cls: post-focus"></div>

            <div class="post-new uk-animation-slide-top-small">
              <div class="post-new-header">

                <h4> Create New Post </h4>
                <!-- Close Button-->
                <span class="post-new-btn-close" uk-toggle="target: body ; cls: post-focus" uk-tooltip="title:Close; pos: left "></span>

              </div>

              <div class="post-new-media">
                <div class="post-new-media-user">
                  <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="">
                </div>
                <div class="post-new-media-input">
                  <input type="text" class="uk-input" placeholder="What's Happening <?= $user['name']; ?> ?"> <!-- placeholder input nya kalo bisa sih ambil nama user, kalo bisa aja kak -->
                </div>
              </div>

              <div class="post-new-tab-nav">
                <!-- ini tu sebenernya ak kasi buat misal nanti bisa upload foto, file, dll, tp kalo gausa ya di off in aja atau dihapus aja -->
                <a href="#" uk-tooltip="title:Close"> <i class="uil-image"></i> </a>
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

          <div class="post">
            <div class="post-heading">
              <div class="post-avature">
                <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="">
              </div>
              <div class="post-title">
                <h4> <?= $user['name']; ?> </h4>
                <p> 5 <span> hrs </span> <i class="uil-users-alt"></i> </p>
              </div>
              <div class="post-btn-action">
                <span class="icon-more uil-ellipsis-h"></span>
                <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                  <ul class="uk-nav uk-dropdown-nav">
                    <!-- nah pas bagian ini tu kalo post nya punya user yg login ad tambahan edit sma delete sma disable -->
                    <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share </a> </li>
                    <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                    <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable Comments</a></li>
                    <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i> Delete </a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="post-description">
              <div class="uk-grid-small" uk-grid>
                <div class="uk-width-1-1@m">
                  <!--ini kalo misal post nya poto banyak -->
                  <img src="<?= base_url('assets/images/post/post-1.jpg'); ?>" class="rounded" alt="">
                  <!--iini link poto nya-->
                </div>
                <div class="uk-width-1-2@m uk-width-1-2">
                  <img src="<?= base_url('assets/images/post/post-3.jpg'); ?>" class="rounded" alt="">
                </div>
                <div class="uk-width-1-2@m uk-width-1-2 uk-position-relative">
                  <img src="<?= base_url('assets/images/post/post-3.jpg'); ?>" class="rounded" alt="">
                  <div class="uk-position-center uk-light">
                    <a href="#">
                      <h3> + 10 more </h3>
                      <!--ini keterangan ad berapa poto lg -->
                    </a></div>
                </div>
              </div>

              <div class="post-state-details">
                <div>
                  <img src="<?= base_url('assets/images/icons/reactions_love.png'); ?>" alt="">
                  <p> 1323 </p>
                </div>
                <p> <span class="mr-2"></span> 212 Comments </p>
              </div>

            </div>

            <div class="post-state">
              <div class="post-state-btns"> <i class="uil-thumbs-up"></i> 1323 <span> Liked </span>
              </div>
              <div class="post-state-btns"> <i class="uil-heart"></i> 212 <span> Coments</span>
              </div>
              <div class="post-state-btns"> <i class="uil-share-alt"></i> 1932 <span> Shared </span>
              </div>
            </div>


            <!-- post comments -->
            <div class="post-comments">
              <div class="post-comments-single">
                <div class="post-comment-avatar">
                  <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt=""> <!-- poto yg komen -->
                </div>
                <div class="post-comment-text">
                  <div class="post-comment-text-inner">
                    <h6> Mahsa Savira </h6>
                    <!--nama yg komen -->
                    <p> eww banyak ya </p>
                  </div>
                  <div class="uk-text-small">
                    <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                    <a href="#" class=" mr-1"> Replay </a>
                    <span> 1 hrs </span> <!-- waktu comments -->
                  </div>
                </div>
                <a href="#" class="post-comment-opt"></a>
              </div>

              <div class="post-comments-single">
                <div class="post-comment-avatar">
                  <img src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" alt="">
                </div>
                <div class="post-comment-text">
                  <div class="post-comment-text-inner">
                    <h6> Monica Tifani </h6>
                    <p> iya siap</p>
                  </div>
                  <div class="uk-text-small">
                    <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                    </a>
                    <a href="#" class=" mr-1"> Replay </a>
                    <span> 1 hrs </span>
                  </div>
                </div>
                <a href="#" class="post-comment-opt"></a>
              </div>

              <a href="#" class="view-more-comment"> View 8 more Comments</a>

              <div class="post-add-comment">
                <div class="post-add-comment-avature">
                  <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="">
                </div>
                <div class="post-add-comment-text-area">
                  <input type="text" placeholder="Write Your Comment Here ...">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- sidebar -->
        <div class="uk-width-expand ml-lg-2">


          <h3> About </h3>
          <div class="list-group-items">
            <i class="uil-home-alt"></i>
            <h5> Bergabung Sejak <span> : <?= date('Y', $user['date_created']); ?> </span> </h5>
          </div>

          <div class="list-group-items">
            <i class="uil-home-alt"></i>
            <h5> Major <span> : Informatics </span> </h5>
          </div>

          <div class="list-group-items">
            <i class="uil-location-point"></i>
            <h5> Domisili <span> : Bukit Tidar, Malang </span> </h5>
          </div>

          <div class="list-group-items">
            <i class="uil-heart"></i>
            <h5> Interested On <span> : Networking, Web Design </span> </h5>
          </div>

          <a href="#" class="button soft-primary block my-3"> Edit </a>

          <hr class="mt-3 mb-0">

          <div class="section-header">
            <div class="section-header-left">
              <h3 class="mb-0"> Groups </h3>
              <p class="uk-text-small"> 34 Joined Group </p>
            </div>
            <div class="section-header-right">
              <a href="#" class="see-all text-primary"> See All </a>
            </div>
          </div>

          <div class="uk-child-width-1-3 uk-grid-small uk-grid-match" uk-grid>
            <div>

              <a href="#" class="profile-friend-card">
                <div class="profile-friend-card-thumbnail">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                </div>
                <div class="profile-friend-card-content">
                  <h4> TI Angkatan 2017 </h4>
                </div>
              </a>

            </div>
            <div>

              <a href="#" class="profile-friend-card">
                <div class="profile-friend-card-thumbnail">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                </div>
                <div class="profile-friend-card-content">
                  <h4> Digital Image Processing A </h4>
                </div>
              </a>

            </div>
            <div>

              <a href="#" class="profile-friend-card">
                <div class="profile-friend-card-thumbnail">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                </div>
                <div class="profile-friend-card-content">
                  <h4> Networking Community </h4>
                </div>
              </a>

            </div>
            <div>

              <a href="#" class="profile-friend-card">
                <div class="profile-friend-card-thumbnail">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                </div>
                <div class="profile-friend-card-content">
                  <h4> Internet of Thing Semester Genap 2019 / 2020 </h4>
                </div>
              </a>

            </div>
            <div>

              <a href="#" class="profile-friend-card">
                <div class="profile-friend-card-thumbnail">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                </div>
                <div class="profile-friend-card-content">
                  <h4> SCEN STIKI </h4>
                </div>
              </a>

            </div>
            <div>

              <a href="#" class="profile-friend-card">
                <div class="profile-friend-card-thumbnail">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                </div>
                <div class="profile-friend-card-content">
                  <h4> Kriptografi A </h4>
                </div>
              </a>

            </div>
          </div>

          <a href="#" class="button secondary block my-3"> See All </a>

          <hr class="mt-3 mb-0">

          <div class="section-header">
            <div class="section-header-left">
              <h3> Photos </h3>
            </div>
            <div class="section-header-right">
              <a href="#" class="see-all text-primary"> See All </a>
            </div>
          </div>

          <div class="uk-child-width-1-3 uk-grid-collapse uk-overflow-hidden" style="border-radius: 16px;" uk-grid>
            <div> <a href="#">
                <div class="photo-card small" data-src="<?= base_url('assets/images/post/post-1.jpg'); ?>" uk-img>
                </div>
              </a>
            </div>
            <div> <a href="#">
                <div class="photo-card small" data-src="<?= base_url('assets/images/post/post-2.jpg'); ?>" uk-img>
                </div>
              </a>
            </div>
            <div> <a href="#">
                <div class="photo-card small" data-src="<?= base_url('assets/images/post/post-3.jpg'); ?>" uk-img>
                </div>
              </a>
            </div>
          </div>

          <hr class="mt-3 mb-2">

          <div uk-sticky="offset:144 ; bottom:true ; meda : @m">


            <div class="section-header pt-2">
              <div class="section-header-left">
                <h3> Group Joined </h3>
              </div>
              <div class="section-header-right">
                <a href="#" class="see-all text-primary"> See All</a>
              </div>
            </div>

            <div class="uk-child-width-1-1@m uk-grid-collapse" uk-grid>
              <div>
                <div class="list-items">
                  <div class="list-item-media">
                    <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="">
                  </div>
                  <div class="list-item-content">
                    <a href="group-feed.html">
                      <h5> TI Angkatan 2017 </h5>
                    </a>
                    <p> Group Besar Mahasiswa Teknik Informatika 2017 </p>
                  </div>
                  <div class="uk-width-auto">
                    <span class="btn-option">
                      <i class="icon-feather-more-horizontal"></i>
                    </span>
                    <div class="dropdown-option-nav" uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                      <ul>
                        <li>
                          <span> <i class="uil-bell"></i> Joined </span>
                        </li>
                        <li>
                          <span> <i class="uil-share-alt"></i> Share Your Friends
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <a href="#" class="button secondary block my-3"> See All </a>

          </div>
        </div>
      </div>
    </div>
  </div>