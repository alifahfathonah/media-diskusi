<!-- For Night mode -->
<script>
  (function(window, document, undefined) {
    "use strict";
    if (!("localStorage" in window)) return;
    var nightMode = localStorage.getItem("gmtNightMode");
    if (nightMode) {
      document.documentElement.className += " night-mode";
    }
  })(window, document);

  (function(window, document, undefined) {
    "use strict";

    // Feature test
    if (!("localStorage" in window)) return;

    // Get our newly insert toggle
    var nightMode = document.querySelector("#night-mode");
    if (!nightMode) return;

    // When clicked, toggle night mode on or off
    nightMode.addEventListener(
      "click",
      function(event) {
        event.preventDefault();
        document.documentElement.classList.toggle("night-mode");
        if (document.documentElement.classList.contains("night-mode")) {
          localStorage.setItem("gmtNightMode", true);
          return;
        }
        localStorage.removeItem("gmtNightMode");
      },
      false
    );
  })(window, document);
</script>

<!-- javaScripts -->
<script src="<?= base_url('assets/js/framework.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-select.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/simplebar.js'); ?>"></script>
<script src="<?= base_url('assets/js/main.js'); ?>"></script>

<!-- dari template lama -->

<!-- pagination -->
<script src="<?= base_url('assets/js/pagination.js'); ?>"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- my-sweet-alert -->
<script src="<?= base_url('assets/js/my-sweetalert.js'); ?>"></script>

<!-- 
  # config -> semua file yang menggunakan base url
  # type="module" : berguna untuk menjalakan syntax import & export pada file
  # jika tidak menggunakan type="module" maka file tidak dapat diexport dan import 
-->
<script type="module" src="<?= base_url('assets/js/admin/role.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/menu.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/pesan.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/group.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/config.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/diskusi.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/notifikasi.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/forum_diskusi.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/group_diskusi.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/profile_group.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/verifikasi.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/my_profile.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/create_group.js'); ?>"></script>

<!-- moment library -->
<script src="<?= base_url('assets/js/moment/moment.min.js'); ?>"></script>
<!-- ./dari template lama -->
</body>

</html>