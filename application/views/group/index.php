<!-- contents -->
<div class="main_content" id="group">

  <div class="main_content_inner">

    <!-- falsh message ketika group berhasil dicreate -->
    <?php if ($this->session->flashdata('message')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <h1> Groups </h1>
    <div class="uk-flex uk-flex-between">
      <nav class="responsive-tab style-1 mb-5">
        <ul>
          <li :class="{'uk-active': allGroups}"><a @click="allGroups=true;joinedGroups=false;myGroups=false;getAllGroup()"> All Groups </a></li>
          <li :class="{'uk-active': joinedGroups}"><a @click="allGroups=false;joinedGroups=true;myGroups=false;getJoinedGroup()"> Joined Groups </a></li>
          <?php if ($role != 'Mahasiswa') : ?>
            <li :class="{'uk-active': myGroups}"><a @click="allGroups=false;joinedGroups=false;myGroups=true;getMyGroup()"> My Groups </a></li>
          <?php endif; ?>
        </ul>
      </nav>

      <?php if ($role != 'Mahasiswa') : ?>
        <a href="<?= base_url('group/createGroup'); ?>" class="button primary small circle uk-visible@s text-decoration-none mr-2">
          <i class="uil-plus"> </i> Create New Group
        </a>
      <?php endif; ?>

    </div>

    <div class="uk-position-relative" uk-slider="finite: true">

      <div class="uk-slider-container pb-3">

        <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s  pr-lg-1 uk-grid" uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 100">

          <!-- looping data group -->
          <li v-for="group in groups">
            <div class="group-card">

              <!-- Group Card Thumbnail -->
              <div class="group-card-thumbnail">
                <img :src="gambarGroup(group.group_image)" alt="">
              </div>

              <!-- Group Card Content -->
              <div class="group-card-content">
                <h3> {{group.group_name}} </h3>
                <p class="info"> <a href="#" class="text-decoration-none"> <span> {{group.jumlah_peserta}} Members </span> </a>
                  <a href="#" class="text-decoration-none"> <span> 100 Post </span> </a>
                </p>
                <div class="group-card-member-wrap">
                  <div class="avatar-group uk-width-auto">
                    <img alt="Image placeholder" src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" class="avatar avatar-xs rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" class="avatar avatar-xs rounded-circle">
                  </div>
                  <div class="uk-width-expand pl-2">
                    <p> <strong> Mahsa Savira </strong> and 2 Other are Members</p>
                  </div>
                </div>

                <div class="group-card-btns">
                  <a v-if="allGroups" class="button primary small" @click="join(user.id, group.id_grup)"> Join </a>
                  <a v-if="joinedGroups" class="button secondary small"> Leave </a>
                  <a :href="route('group/profileGroup/' + group.id_grup)" v-if="joinedGroups || myGroups" class="button primary small text-decoration-none"> View </a>
                </div>

              </div>
            </div>

          </li>

        </ul>

        <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#" uk-slider-item="previous"></a>
        <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>

      </div>
    </div>

    <!-- jika group dalam keadaan kosong -->
    <div v-if="emptyResult" class="col-lg-12 text-center">
      <h2 class="font-weight-bold" v-if="joinedGroups">You have never <span class="text-primary">joined</span> any group!</h2>
      <h2 class="font-weight-bold" v-if="allGroups">There are no groups <span class="text-primary">available</span> yet</h2>
      <h2 class="font-weight-bold" v-if="myGroups">You have never <span class="text-primary">created</span> a group</h2>
    </div>

    <div class="section-header pb-0">
      <div class="section-header-left">
        <h3> Categories </h3>
        <p> Find a Group <span class="uk-visible@s"> by Browsing Categories </span></p>
      </div>
      <div class="section-header-right">
        <a href="#" class="see-all" class="text-decoration-none"> See All </a>
      </div>
    </div>

    <div class="uk-position-relative" uk-slider="finite: true">

      <div class="uk-slider-container py-3">

        <ul class="uk-slider-items uk-child-width-1-6@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">

          <li>

            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-5.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4> Networking </h4>
                </div>
              </div>
            </a>
          </li>
          <li>

            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-3.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4> Design </h4>
                </div>
              </div>
            </a>

          </li>
          <li>
            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-2.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4>Programming </h4>
                </div>
              </div>
            </a>

          </li>
          <li>

            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-8.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4> Game </h4>
                </div>
              </div>
            </a>

          </li>
          <li>

            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-7.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4> Music Digital </h4>
                </div>
              </div>
            </a>

          </li>
          <li>

            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-6.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4> Data Science </h4>
                </div>
              </div>
            </a>

          </li>
          <li>

            <a href="#" class="text-decoration-none">
              <div class="group-catagroy-card animate-this" data-src="<?= base_url('assets/images/group/group-8.jpg'); ?>" uk-img>
                <div class="group-catagroy-card-content">
                  <h4> Artificial Intelligence </h4>
                </div>
              </div>
            </a>

          </li>
        </ul>

        <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#" uk-slider-item="previous"></a>
        <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>

      </div>
    </div>


    <div class="section-header pb-2">
      <div class="section-header-left">
        <h3> Groups </h3>
      </div>
    </div>

    <nav class="responsive-tab style-4 mb-3">
      <ul>
        <li :class="{'uk-active': allGroups}"><a @click="allGroups=true;joinedGroups=false;myGroups=false;getAllGroup()"> All Groups <span v-if="allGroups"> {{totalGroups}} </span> </a></li>
        <li :class="{'uk-active': joinedGroups}"><a @click="allGroups=false;joinedGroups=true;myGroups=false;getJoinedGroup()"> Joined <span v-if="joinedGroups"> {{totalGroups}} </span> </a></li>
        <?php if ($role != 'Mahasiswa') : ?>
          <li :class="{'uk-active': myGroups}"><a @click="allGroups=false;joinedGroups=false;myGroups=true;getMyGroup()"> My Groups <span v-if="myGroups"> {{totalGroups}} </span> </a></li>
        <?php endif; ?>
      </ul>
    </nav>


    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-3-3@m">

        <div class="uk-child-width-1-3@s uk-grid-row-small" uk-grid>

          <!-- looping data group -->
          <div v-for="group in groups">
            <div class="list-items">
              <div class="list-item-media">
                <img :src="gambarGroup(group.group_image)" alt="">
              </div>
              <div class="list-item-content">
                <a :href="route('group/profileGroup/' + group.id_grup)" class="text-decoration-none">
                  <h5> {{group.group_name}} </h5>
                </a>
                <p> {{group.group_desc}} </p>
              </div>
              <div class="uk-width-auto">
                <span class="btn-option" aria-expanded="false">
                  <i class="icon-feather-more-horizontal"></i>
                </span>
                <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
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

          <!-- jika group dalam keadaan kosong maka tampilkan pesan berdasarkan tab-nya -->
          <div v-if="emptyResult" class="col-lg-12 text-center">
            <h2 class="font-weight-bold" v-if="joinedGroups">You have never <span class="text-primary">joined</span> any group!</h2>
            <h2 class="font-weight-bold" v-if="allGroups">There are no groups <span class="text-primary">available</span> yet</h2>
            <h2 class="font-weight-bold" v-if="myGroups">You have never <span class="text-primary">created</span> a group</h2>
          </div>

          <div class="uk-flex uk-flex-center my-4">
            <a href="#" class="button secondary small px-11 circle text-decoration-none"> View More </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>