<!-- Sidebar -->
<div class="main_sidebar">
  <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>

  <!-- Sidebar Header -->
  <div class="sidebar-header">
    <h4>Menu</h4>
    <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
  </div>

  <!-- ==================================================================================== -->
  <!-- Query Menu -->
  <?php
  $roleID = $this->session->userdata('role_id');
  $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $roleID
                ORDER BY `user_access_menu`.`menu_id` ASC";
  $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- ==================================================================================== -->

  <!-- Sidebar Menu -->
  <div class="sidebar">
    <div class="sidebar_innr" data-simplebar>
      <div class="sections">
        <ul>
          <!-- LOOPING MENU -->
          <?php foreach ($menu as $m) : ?>
            <div class="font-weight-bold">
              <?= $m['menu']; ?>
            </div>

            <!-- Siapkan Sub Menu sesuai Menu -->
            <?php
            $menuID = $m['id'];
            $querySubMenu = "SELECT * FROM `user_sub_menu`
                    JOIN `user_menu` 
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    WHERE `user_sub_menu`.`menu_id` = $menuID
                    AND `user_sub_menu`.`is_active` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>
              <?php if ($title == $sm['title']) : ?>
                <li class="active text-primary">
                <?php else : ?>
                <li>
                <?php endif; ?>
                <a href="<?= base_url($sm['url']); ?>" class="mt-1 text-decoration-none text-monospace">
                  <i class="<?= $sm['icon']; ?> text-primary"></i>
                  <span><?= $sm['title']; ?></span></a>
                </li>
              <?php endforeach; ?>

              <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
              <a class="nav-link text-danger" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt text-danger"></i>
                <span>Logout</span></a>
            </li>

        </ul>

      </div>

      <div id="foot">
        <ul>
          <li>
            <a href="page-term.html" class="text-decoration-none text-muted">
              <center>About Us</center>
            </a>
          </li>
          <br />
          <li>
            <a href="page-privacy.html" class="text-decoration-none text-muted">
              <center>Privacy Policy</center>
            </a>
          </li>
          <br />
          <li>
            <a href="page-term.html" class="text-decoration-none text-muted">
              <center>Terms - Conditions</center>
            </a>
          </li>
        </ul>

        <div class="foot-content">
          <p>
            <center>
              Copyrigth&copy;<?= date('Y'); ?> <br /><strong>
                Sekolah Tinggi Informatika dan Komputer Indonesia Malang </strong><br />
              .All Rights Reserved.
            </center>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>