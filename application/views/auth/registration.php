<div class="limiter">
  <div class="container-login100" style="background-image: url('<?= base_url('assets/images/background/bg-03.jpg'); ?>');">
    <div class="text-center-top w-full">
      <a class="txt1" href="http://stiki.ac.id"> Copyrigth&copy;<?= date('Y'); ?> Sekolah Tinggi Informatika dan Komputer Indonesia Malang <?= date('Y'); ?> </a>
    </div>

    <div class="wrap-login100 p-t-190 p-b-30">

      <div class="login100-form-avatar">
        <img src="<?= base_url('assets/images/icons/stiki.png'); ?>" alt="AVATAR">
      </div>

      <span class="login100-form-title p-t-20 p-b-45"> M E D I A D I S K U S I </span>

      <!-- error form alert -->
      <?php if (form_error('password1')) { ?>
        <div class="alert alert-danger text-center" role="alert"><?= form_error('password1'); ?></div>
      <?php } else if (form_error('name')) { ?>
        <div class="alert alert-danger text-center" role="alert"><?= form_error('name'); ?></div>
      <?php } else if (form_error('email')) { ?>
        <div class="alert alert-danger text-center" role="alert"><?= form_error('email'); ?></div>
      <?php } ?>

      <form class="login100-form validate-form" method="POST" action="<?= base_url('auth/registration'); ?>">
        <div class="wrap-input100 validate-input m-b-10" data-validate="Full Name is required">
          <input class="input100" type="text" name="name" id="name" placeholder="Enter Full Name" value="<?= set_value('name'); ?>">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-user"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
          <input class="input100" type="text" name="email" id="email" placeholder="Enter Email" value="<?= set_value('email'); ?>">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-inbox"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
          <input class="input100" type="password" name="password1" id="password1" placeholder="Enter Password">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" data-validate="Password Confirmation is required">
          <input class="input100" type="password" name="password2" id="password2" placeholder="Enter Confirmation Password">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock"></i>
          </span>
        </div>

        <div class="container-login100-form-btn-regist p-t-10">
          <button class="login100-form-btn"> R E G I S T E R </button>
        </div>
      </form>

      <div class="text-center w-full">
        <a class="txt3" href="<?= base_url('auth/'); ?>"> Already Have an Account? Login Here <i class="fa fa-sign-in"></i></a>
      </div>
    </div>
  </div>
</div>