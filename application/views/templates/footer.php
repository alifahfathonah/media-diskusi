<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Media Diskusi STIKI <?= date('Y'); ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Vuetify -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

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
  role -> admin 
  menu -> admin
  group -> dosen
  config -> semua file yang menggunakan base url

  type="module" : berguna untuk menjalakan syntax import & export pada file
  jika tidak menggunakan type="module" maka file tidak dapat diexport dan import
-->
<script type="module" src="<?= base_url('assets/js/admin/role.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/menu.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/group.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/config.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/group_diskusi.js'); ?>"></script>
<script type="module" src="<?= base_url('assets/js/admin/diskusi.js'); ?>"></script>

<!-- moment library -->
<script src="<?= base_url('assets/js/moment/moment.min.js'); ?>"></script>

<script>
  // Accordion
  function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
      x.previousElementSibling.className += " w3-theme-d1";
    } else {
      x.className = x.className.replace("w3-show", "");
      x.previousElementSibling.className = x.previousElementSibling.className.replace(
        " w3-theme-d1",
        ""
      );
    }
  }

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }
</script>

</body>

</html>