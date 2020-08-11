<!-- Contents -->
<div class="main_content" id="user">
  <div class="main_content_inner">
    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-2-3@m fead-area">

        <!-- ini bagian post -->
        <div class="post" v-for="p in post">
          <div class="post-heading">
            <div class="post-avature">
              <img :src="gambarUser(p.image)" alt="" />
              <!-- ini poto yang nge pos -->
            </div>

            <div class="post-title">
              <h4>{{p.name}}</h4>
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
            <div class="fullsizeimg text-center">
              <img :src="gambarForum(p.image_forum)" alt="" />
              <!-- ini kalo misal post poto ya, kalo gamau di coment aja atau fihapus -->
            </div>

            <p>{{ p.text_content }}</p>
            <div class="post-state-details">
              <div>
                <img src="<?= base_url('assets/images/icons/reactions_love.png'); ?>" alt="" />
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
            <div v-for="comments in comment">
              <div v-for="c in comments">
                <div class="post-comments-single" v-if="p.id_forum == c.id_forum">
                  <div class="post-comment-avatar">
                    <img :src="gambarUser(c.image)" alt="" />
                    <!-- ini poto profil yg komen -->
                  </div>

                  <div class="post-comment-text">
                    <div class="post-comment-text-inner">
                      <h6>{{ c.name }}</h6>
                      <!-- ini username yg komen -->
                      <p>{{ c.text_comment }}</p>
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
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Sidebar group -->
      <div class="uk-width-expand">
        <div class="p-5 mb-3 rounded uk-background-cover uk-light" style="
                  background-blend-mode: color-burn;
                  background-color: rgba(0, 126, 255, 0.06);" data-src="assets/images/event/event-1.jpg" uk-img>
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