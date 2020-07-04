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
            <a href="#">
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
          <div class="btn-subscribe">
            <a href="#" class="button primary"> <i class="uil-thumbs-up"></i> Join
            </a>
            <span class="subs-amount"> {{g.jumlah_peserta}} </span>
          </div>
        </div>
      </div>

      <div class="nav-single-group" uk-sticky="offset:61;media : @s">
        <nav class="responsive-tab">
          <ul>
            <li class="uk-active"><a class="active" href="#"> Timeline </a></li>
            <li><a href="#"> Members </a></li>
            <li><a href="#"> Photos </a></li>
            <li><a href="#"> Discussions </a></li>
            <li><a href="#"> Videos </a></li>
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
                    <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share </a> </li>
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
                    <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                    <a href="#" class=" mr-1"> Replay </a>
                    <span> 9 hrs </span>
                  </div>
                </div>
                <a href="#" class="post-comment-opt"></a>
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
          <hr class="my-3">


          <h3> Description </h3>

          <p> {{g.group_desc}} </a> </p>

          <a href="#" class="button secondary block my-3"> See All </a>

          <hr class="mt-3 mb-2">

          <div uk-sticky="offset:140 ; bottom:true ; meda : @m">


            <div class="section-header pt-2">
              <div class="section-header-left">
                <h3> Members </h3>
              </div>
              <div class="section-header-right">
                <a href="#" class="see-all text-primary"> See All</a>
              </div>
            </div>

            <div class="uk-child-width-1-1@m uk-grid-collapse" uk-grid>

              <div>
                <div class="list-items">
                  <div class="list-item-media">
                    <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="">
                  </div>
                  <div class="list-item-content">
                    <a href="group-feed.html">
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
                    <a href="group-feed.html">
                      <h5> Monica Tifani </h5>
                    </a>
                    <p> Engineering </p>
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