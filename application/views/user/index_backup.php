<!-- Contents -->
<div class="main_content">
  <div class="main_content_inner">
    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-2-3@m fead-area">

        <div class="post-newer">
          <div class="post-new" uk-toggle="target: body ; cls: post-focus">
            <div class="post-new-media">
              <div class="post-new-media-user">
                <img src="assets/images/avatars/avatar-1.jfif" alt="" />
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
                  <img src="assets/images/avatars/avatar-1.jfif" alt="" />
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

        <!-- ini bagian post -->
        <div class="post">
          <div class="post-heading">
            <div class="post-avature">
              <img src="assets/images/avatars/avatar-2.jpg" alt="" />
              <!-- ini poto yang nge pos -->
            </div>

            <div class="post-title">
              <h4>Mahsa Savira</h4>
              <!-- username pengguna yg post -->
              <p>2 <span> hrs </span> <i class="uil-users-alt"></i></p>
              <!-- waktu post -->
            </div>

            <div class="post-btn-action">
              <span class="uil-ellipsis-h"></span>
              <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                <ul class="uk-nav uk-dropdown-nav">
                  <li>
                    <a href="#">
                      <i class="uil-share-alt mr-1"></i> Share
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="post-description">
            <div class="fullsizeimg">
              <img src="assets/images/post/post-1.jpg" alt="" />
              <!-- ini kalo misal post poto ya, kalo gamau di coment aja atau fihapus -->
            </div>

            <div class="post-state-details">
              <div>
                <img src="assets/images/icons/reactions_love.png" alt="" />
                <p>134</p>
                <!-- ini kalo mau nge love klik di icon ini -->
              </div>
              <p>24 Comments</p>
              <!-- ini total komen-->
            </div>
          </div>

          <div class="post-state">
            <div class="post-state-btns">
              <i class="uil-thumbs-up"></i> 134 <span> Liked </span>
            </div>
            <div class="post-state-btns">
              <i class="uil-comment"></i> 24 <span> Coments </span>
            </div>
            <div class="post-state-btns">
              <i class="uil-share-alt"></i> 23 <span> Shared </span>
            </div>
          </div>

          <!-- post comments -->
          <div class="post-comments">
            <div class="post-comments-single">
              <div class="post-comment-avatar">
                <img src="assets/images/avatars/avatar-1.jfif" alt="" />
                <!-- ini poto profil yg komen -->
              </div>

              <div class="post-comment-text">
                <div class="post-comment-text-inner">
                  <h6>Melanaumi Apriza</h6>
                  <!-- ini username yg komen -->
                  <p>wow menarik banget ya,</p>
                  <!-- isi komen -->
                </div>
                <div class="uk-text-small">
                  <a href="#" class="text-danger mr-1">
                    <i class="uil-heart"></i> Love
                  </a>
                  <a href="#" class="mr-1"> Replay </a>
                  <span> 1h </span>
                </div>
              </div>
            </div>

            <a href="#" class="view-more-comment">
              View 2 more Comments
            </a>
            <!--ini buat nampilin semua komen-->

            <div class="post-add-comment">
              <div class="post-add-comment-avature">
                <img src="assets/images/avatars/avatar-1.jfif" alt="" />
                <!--ini poto profil yg mau komen jadi user yg lg login-->
              </div>

              <div class="post-add-comment-text-area">
                <input type="text" placeholder="Write Your Comment Here ..." />
              </div>
            </div>
          </div>
        </div>

        <div class="post">
          <div class="post-heading">
            <div class="post-avature">
              <img src="assets/images/avatars/avatar-1.jfif" alt="" />
            </div>
            <div class="post-title">
              <h4>Melanaumi Apriza</h4>
              <p>5 <span> hrs </span> <i class="uil-users-alt"></i></p>
            </div>
            <div class="post-btn-action">
              <span class="uil-ellipsis-h"></span>
              <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                <ul class="uk-nav uk-dropdown-nav">
                  <!-- nah pas bagian ini tu kalo post nya punya user yg login ad tambahan edit sma delete sma disable -->
                  <li>
                    <a href="#">
                      <i class="uil-share-alt mr-1"></i> Share
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="uil-edit-alt mr-1"></i> Edit Post
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="uil-comment-slash mr-1"></i> Disable
                      Comments</a>
                  </li>
                  <li>
                    <a href="#" class="text-danger">
                      <i class="uil-trash-alt mr-1"></i> Delete
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="post-description">
            <div class="uk-grid-small" uk-grid>
              <div class="uk-width-1-1@m">
                <!--ini kalo misal post nya poto banyak -->
                <img src="assets/images/post/post-1.jpg" class="rounded" alt="" />
                <!--iini link poto nya-->
              </div>
              <div class="uk-width-1-2@m uk-width-1-2">
                <img src="assets/images/post/post-3.jpg" class="rounded" alt="" />
              </div>
              <div class="uk-width-1-2@m uk-width-1-2 uk-position-relative">
                <img src="assets/images/post/post-3.jpg" class="rounded" alt="" />
                <div class="uk-position-center uk-light">
                  <a href="#">
                    <h3>+ 10 more</h3>
                    <!--ini keterangan ad berapa poto lg -->
                  </a>
                </div>
              </div>
            </div>

            <div class="post-state-details">
              <div>
                <img src="assets/images/icons/reactions_love.png" alt="" />
                <p>1323</p>
              </div>
              <p><span class="mr-2"></span> 212 Comments</p>
            </div>
          </div>

          <div class="post-state">
            <div class="post-state-btns">
              <i class="uil-thumbs-up"></i> 1323 <span> Liked </span>
            </div>
            <div class="post-state-btns">
              <i class="uil-heart"></i> 212 <span> Coments</span>
            </div>
            <div class="post-state-btns">
              <i class="uil-share-alt"></i> 1932 <span> Shared </span>
            </div>
          </div>

          <!-- post comments -->
          <div class="post-comments">
            <div class="post-comments-single">
              <div class="post-comment-avatar">
                <img src="assets/images/avatars/avatar-2.jpg" alt="" />
                <!-- poto yg komen -->
              </div>
              <div class="post-comment-text">
                <div class="post-comment-text-inner">
                  <h6>Mahsa Savira</h6>
                  <!--nama yg komen -->
                  <p>eww banyak ya</p>
                </div>
                <div class="uk-text-small">
                  <a href="#" class="text-danger mr-1">
                    <i class="uil-heart"></i> Love
                  </a>
                  <a href="#" class="mr-1"> Replay </a>
                  <span> 1 hrs </span>
                  <!-- waktu comments -->
                </div>
              </div>
            </div>

            <div class="post-comments-single">
              <div class="post-comment-avatar">
                <img src="assets/images/avatars/avatar-5.jpg" alt="" />
              </div>
              <div class="post-comment-text">
                <div class="post-comment-text-inner">
                  <h6>Monica Tifani</h6>
                  <p>iya siap</p>
                </div>
                <div class="uk-text-small">
                  <a href="#" class="text-primary mr-1">
                    <i class="uil-thumbs-up"></i> Like
                  </a>
                  <a href="#" class="mr-1"> Replay </a>
                  <span> 1 hrs </span>
                </div>
              </div>
            </div>

            <a href="#" class="view-more-comment">
              View 8 more Comments</a>

            <div class="post-add-comment">
              <div class="post-add-comment-avature">
                <img src="assets/images/avatars/avatar-1.jfif" alt="" />
              </div>
              <div class="post-add-comment-text-area">
                <input type="text" placeholder="Write Your Comment Here ..." />
              </div>
            </div>
          </div>
        </div>

        <div class="post">
          <div class="post-heading">
            <div class="post-avature">
              <img src="assets/images/group/group-1.png" alt="" />
            </div>
            <div class="post-title">
              <h4>TI Angkatan 2017</h4>
              <p>9 <span> hrs </span> <i class="uil-users-alt"></i></p>
            </div>
            <div class="post-btn-action">
              <span class="uil-ellipsis-h"></span>
              <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                <ul class="uk-nav uk-dropdown-nav">
                  <li>
                    <a href="#">
                      <i class="uil-share-alt mr-1"></i> Share
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="post-description">
            <p>
              PENGUMUMAN bagi seluruh mahasiswa TI Angkatan 2017 - 2019
              bahwa SE Ditiadakan
            </p>
            <div class="post-state-details">
              <div>
                <img src="assets/images/icons/reactions_love.png" alt="" />
                <p>13</p>
              </div>
              <p>24 Comments</p>
            </div>
          </div>

          <div class="post-state">
            <div class="post-state-btns">
              <i class="uil-thumbs-up"></i> 126<span> Liked </span>
            </div>
            <div class="post-state-btns">
              <i class="uil-heart"></i> 18 <span> Coments</span>
            </div>
            <div class="post-state-btns">
              <i class="uil-share-alt"></i> 193 <span> Shared </span>
            </div>
          </div>

          <!-- post comments -->
          <div class="post-comments">
            <div class="post-comments-single">
              <div class="post-comment-avatar">
                <img src="assets/images/avatars/avatar-5.jpg" alt="" />
              </div>
              <div class="post-comment-text">
                <div class="post-comment-text-inner">
                  <h6>Monica Tifani</h6>
                  <p>yah ga asik</p>
                </div>
                <div class="uk-text-small">
                  <a href="#" class="text-danger mr-1">
                    <i class="uil-heart"></i> Love
                  </a>
                  <a href="#" class="mr-1"> Replay </a>
                  <span> 9 hrs </span>
                </div>
              </div>
            </div>

            <div class="post-add-comment">
              <div class="post-add-comment-avature">
                <img src="assets/images/avatars/avatar-1.jfif" alt="" />
              </div>
              <div class="post-add-comment-text-area">
                <input type="text" placeholder="Write Your Comment Here ..." />
              </div>
            </div>
          </div>
        </div>

        <div class="post">
          <div class="post-heading">
            <div class="post-avature">
              <img src="assets/images/avatars/avatar-5.jpg" alt="" />
            </div>
            <div class="post-title">
              <h4>Monica Tifani</h4>
              <p>9 <span> hrs </span> <i class="uil-users-alt"></i></p>
            </div>
            <div class="post-btn-action">
              <span class="uil-ellipsis-h"></span>
              <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                <ul class="uk-nav uk-dropdown-nav">
                  <li>
                    <a href="#">
                      <i class="uil-share-alt mr-1"></i> Share</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="post-description">
            <div class="fullsizevid">
              <div class="embed-video">
                <iframe src="https://www.youtu.be/QW28YKqdxe0" frameborder="2" uk-video="automute: true" allowfullscreen uk-responsive></iframe>
              </div>
            </div>

            <div class="post-state-details">
              <div>
                <img src="assets/images/icons/reactions_love.png" alt="" />
                <p>13</p>
              </div>
              <p>
                <span class="mr-2">
                  <i class="uil-eye"></i> 3890 Views
                </span>
                232 Comments
              </p>
            </div>
          </div>

          <div class="post-state">
            <div class="post-state-btns">
              <i class="uil-thumbs-up"></i> 13 <span> Liked </span>
            </div>
            <div class="post-state-btns">
              <i class="uil-heart"></i> 232 <span> Coments </span>
            </div>
            <div class="post-state-btns">
              <i class="uil-share-alt"></i> 113 <span> Shared </span>
            </div>
          </div>

          <!-- post comments -->
          <div class="post-comments">
            <div class="post-add-comment">
              <div class="post-add-comment-avature">
                <img src="assets/images/avatars/avatar-1.jfif" alt="" />
              </div>
              <div class="post-add-comment-text-area">
                <input type="text" placeholder="Write your Comment Here ..." />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar group -->
      <div class="uk-width-expand">
        <div class="p-5 mb-3 rounded uk-background-cover uk-light" style="
                  background-blend-mode: color-burn;
                  background-color: rgba(0, 126, 255, 0.06);
                " data-src="assets/images/event/event-1.jpg" uk-img>
          <div class="uk-width-4-5">
            <h3 class="mb-2">
              <i class="uil-users-alt p-1 text-dark bg-white circle icon-small"></i>
              G R O U P S
            </h3>
            <p>
              Bergabung dengan Group yang kamu perlukan sekarang juga.
            </p>
            <a href="#" class="button white small"> Find Groups </a>
          </div>
        </div>

        <div uk-sticky="offset:70 ; media : @m">
          <ul class="uk-child-width-expand tab-small my-2 uk-tab">
            <li class="uk-active"><a href="#"> Groups You Joined </a></li>
          </ul>

          <div style="height: calc(100vh - 150px);">
            <a href="#">
              <div class="contact-list">
                <div class="contact-list-media">
                  <img src="assets/images/group/group-1.png" alt="" />
                  <!-- profil poto grupnya -->
                </div>
                <h5>TI Angkatan 2017</h5>
                <!-- nama grupnya -->
              </div>
            </a>
            <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
              <!-- pop up profil poto grupnya -->
              <div class="contact-list-box">
                <div class="contact-list-box-media">
                  <img src="assets/images/group/group-1.png" alt="" />
                </div>
                <h4>TI Angkatan 2017</h4>
                <p>
                  <i class="uil-users-alt icon-small"></i> Followed by
                  <strong> Mahsa Savira </strong> and
                  <strong> 90 Others </strong>
                </p>

                <div class="contact-list-box-btns">
                  <a href="#" class="button primary block mr-2">
                    <!-- link menuju grup nya -->
                    <i class="uil-envelope mr-1"></i> View Group
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>