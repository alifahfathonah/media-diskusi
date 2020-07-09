<!-- Header -->
<div id="main_header">
  <header>
    <div class="header-innr">
      <!-- Logo-->
      <div class="header-btn-traiger" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible">
        <span></span>
      </div>

      <?php
      $role = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
      ?>

      <?php if ($role['role'] == 'Administrator') : ?>
        <div id="logo">
          <a href="<?= base_url('admin'); ?>" class="text-decoration-none">
            <img src="<?= base_url('assets/images/icons/logodark.png'); ?>" alt="" /></a>
          <a href="<?= base_url('admin'); ?>" class="text-decoration-none">
            <img src="<?= base_url('assets/images/icons/logolight.png'); ?>" class="logo-inverse" alt="" /></a>
        </div>
      <?php else : ?>
        <div id="logo">
          <a href="<?= base_url('user'); ?>" class="text-decoration-none">
            <img src="<?= base_url('assets/images/icons/logodark.png'); ?>" alt="" /></a>
          <a href="<?= base_url('user'); ?>" class="text-decoration-none">
            <img src="<?= base_url('assets/images/icons/logolight.png'); ?>" class="logo-inverse" alt="" /></a>
        </div>
      <?php endif; ?>

      <!-- Form Search-->
      <div class="head_search">
        <form>
          <div class="head_search_cont">
            <input value="" type="text" class="form-control" placeholder="Search Group Here ..." autocomplete="off" />
            <i class="s_icon uil-search-alt"></i>
          </div>

          <!-- Search Box Dropdown -->
          <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-search">
            <!-- Recent Search -->
            <ul class="dropdown-search-list">
              <li class="list-title">Recent Searches</li>
              <li>
                <a href="#" class="text-decoration-none">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="" /> TI
                  Angkatan 2017
                </a>
              </li>
              <li>
                <a href="#" class="text-decoration-none">
                  <img src="<?= base_url('assets/images/group/group-1.png'); ?>" alt="" />
                  Nama Group
                </a>
              </li>
              <li class="list-footer">
                <a href="your-history.html" class="text-decoration-none"> Searches History </a>
              </li>
            </ul>
          </div>
        </form>
      </div>

      <!-- User Icons -->
      <div class="head_user">
        <a href="<?= base_url('user/myprofile'); ?>" class="opts_icon_link uk-visible@s text-decoration-none">
          <?= $user['name']; ?>
        </a>
        <!-- Nama Pengguna -->

        <!-- Message Dropdown -->
        <a href="#" class="opts_icon text-decoration-none" uk-tooltip="title: Messages ; pos: bottom ;offset:7">
          <img src="<?= base_url('assets/images/icons/chat.svg'); ?>" alt="" />
          <span> 2 </span>
          <!-- Jumlah Total Chat Belum Kebaca atau yang masuk terserah, ini aku misalin 2 -->
        </a>

        <!-- Notificiation Dropdown -->
        <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications">
          <!-- Notification Dropdown Conntents -->
          <div class="dropdown-notifications-content" data-simplebar>
            <!-- Notivication Header -->
            <div class="dropdown-notifications-headline">
              <h4>Messages</h4>
              <a href="#" class="text-decoration-none">
                <i class="icon-feather-settings" uk-tooltip="title: Message settings ; pos: left"></i>
              </a>

              <input type="text" class="uk-input" placeholder="Search in Messages ..." />
            </div>

            <!-- Notiviation List -->
            <ul>
              <li>
                <a href="#" class="text-decoration-none">
                  <!-- Link Chat dengan Pengguna -->
                  <span class="notification-avatar status-online">
                    <!-- Titik Online Engga nya -->
                    <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" />
                  </span>
                  <div class="notification-text notification-msg-text">
                    <strong> Mahsa Savira </strong>
                    <!-- Nama Pengguna Yang Chat -->
                    <p>
                      Jangan Lupa PR ...
                      <span class="time-ago"> 2 h </span>
                    </p>
                    <!-- Isi Chat dan Keterangan Waktu -->
                  </div>
                </a>
              </li>

              <li>
                <a href="#" class="text-decoration-none">
                  <span class="notification-avatar">
                    <img src="<?= base_url('assets/images/avatars/avatar-5.jpg'); ?>" alt="" />
                  </span>
                  <div class="notification-text notification-msg-text">
                    <strong> Monica Tifani </strong>
                    <p>
                      Yuhuuuuu Siappp ...
                      <span class="time-ago"> 3 h </span>
                      <!-- Ingat ya kak semakin kebawah waktunya semakin lama -->
                    </p>
                  </div>
                </a>
              </li>
            </ul>
          </div>

          <div class="dropdown-notifications-footer">
            <a href="chats.html" class="text-decoration-none"> See all in Messages </a>
          </div>
        </div>

        <!-- Notificiation Icon  -->
        <a href="#" class="opts_icon text-decoration-none" uk-tooltip="title: Notifications ; pos: bottom ;offset:7">
          <img src="<?= base_url('assets/images/icons/bell.svg'); ?>" alt="" />
          <span><?= jumlah_notifikasi($user['id']); ?></span>
          <!-- Jumlah Total Notif Belum Kebaca atau yang masuk terserah, ini aku misalin 1 -->
        </a>

        <!-- Notificiation Dropdown -->
        <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications">
          <!-- Notification Contents -->
          <div class="dropdown-notifications-content" data-simplebar>
            <!-- Notivication Header -->
            <div class="dropdown-notifications-headline">
              <h4>Notifications</h4>
              <a href="#" class="text-decoration-none">
                <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left"></i>
              </a>
            </div>

            <!-- Notiviation List -->
            <ul>
              <!-- dummy notifikasi -->
              <?php for ($i = 0; $i <= 5; $i++) : ?>
                <li>
                  <a href="#" class="text-decoration-none">
                    <!-- Link Menuju Notifikasi nya -->
                    <span class="notification-avatar">
                      <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" />
                      <!-- ini harusnya foto profilnya pengguna yg interaksi sma km -->
                    </span>
                    <span class="notification-icon bg-gradient-primary">
                      <i class="icon-feather-thumbs-up"></i></span>
                    <span class="notification-text">
                      <strong> Mahsa Savira </strong> Like Your Comment On
                      Monica Tifani's Post
                      <!-- ini harusnya nama pengguna yang berinteraksi sama kamu sama keterangan interaksinya apa -->
                      <span class="text-primary">
                        Pengumuman Kelas PCD S
                      </span>
                      <!-- ini cuplikan post yg kena interaksi -->
                      <br />
                      <span class="time-ago"> 1 hours ago </span>
                      <!-- ini waktunya -->
                    </span>
                  </a>
                </li>
              <?php endfor; ?>
              <?php
              $notifikasi = text_notifikasi($user['id']);
              foreach ($notifikasi as $n) :
              ?>
                <li>
                  <a href="#" class="text-decoration-none">
                    <!-- Link Menuju Notifikasi nya -->
                    <span class="notification-avatar">
                      <img src="<?= base_url('assets/images/avatars/avatar-2.jpg'); ?>" alt="" />
                      <!-- ini harusnya foto profilnya pengguna yg interaksi sma km -->
                    </span>
                    <span class="notification-icon bg-gradient-primary">
                      <i class="icon-feather-thumbs-up"></i></span>
                    <span class="notification-text">
                      <?= $n['text_notif']; ?>
                      <!-- ini harusnya nama pengguna yang berinteraksi sama kamu sama keterangan interaksinya apa -->
                      <span class="text-primary">
                        Pengumuman Kelas PCD S
                      </span>
                      <!-- ini cuplikan post yg kena interaksi -->
                      <br />
                      <span class="time-ago"> 1 hours ago </span>
                      <!-- ini waktunya -->
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- Profile Image -->
        <a class="opts_account text-decoration-none" href="#">
          <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="" /></a>
        <!-- ini harusnya foto profile setiap user yg login -->

        <!-- Profile Dropdown-->
        <div uk-dropdown="mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications rounded">
          <!-- User Name / Avatar -->
          <a href="<?= base_url('user/myprofile'); ?>" class="text-decoration-none">
            <!-- ini harrusnya link menuju profile -->

            <div class="dropdown-user-details">
              <div class="dropdown-user-avatar">
                <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" alt="" />
                <!-- ini harusnya foto profile setiap user yg login -->
              </div>
              <div class="dropdown-user-name">
                <?= $user['name']; ?> <span> See your Profile </span>
              </div>
              <!-- ini harusnya username profile setiap user yg login -->
            </div>
          </a>

          <hr class="m-0" />
          <ul class="dropdown-user-menu">
            <li>
              <a href="timeline.html" class="text-decoration-none">
                <i class="uil-user"></i> Account
              </a>
            </li>
            <!-- ini harrusnya link menuju profile si user -->
            <li>
              <a href="page-setting.html" class="text-decoration-none">
                <i class="uil-cog"></i> Settings
              </a>
            </li>
            <!-- ini harrusnya link setting si user -->
            <li>
              <a href="#" id="night-mode" class="btn-night-mode text-decoration-none">
                <i class="uil-moon"></i> Night Mode
                <span class="btn-night-mode-switch">
                  <span class="uk-switch-button"></span>
                </span>
              </a>
            </li>
            <li>
              <a href="<?= base_url('auth/logout'); ?>" class="text-decoration-none">
                <i class="uil-sign-out-alt"></i> Sign Out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
</div>