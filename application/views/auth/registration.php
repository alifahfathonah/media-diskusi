<div class="limiter">
  <div class="container-login100" style="background-image: url('<?= base_url('assets/img/bg-01.jpg'); ?>');">
    <div class="wrap-regis100">
      <form class="login100-form validate-form" method="POST" action="<?= base_url('auth/registration'); ?>">
        <span class="login100-form-logo">
          <i class="zmdi zmdi-landscape"></i>
        </span>

        <span class="login100-form-title p-t-15">
          Registration With Your STIKI's Email
        </span>

        <div class="wrap-input100 validate-input mt-4" data-validate="Full Name">
          <input class="input100" type="text" name="name" id="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
          <span class="focus-input100" data-placeholder="&#xf207;"></span>
        </div>

        <div class="wrap-input100 validate-input mt-4" data-validate="Enter email">
          <input class="input100" type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
          <span class="focus-input100" data-placeholder="&#xf207;"></span>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <input class="input100" type="password" name="password1" id="password1" placeholder="Password">
              <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <input class="input100" type="password" name="password2" id="password2" placeholder="Confirm Password">
              <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
          </div>
        </div>

        <!-- error form alert -->
        <?php if (form_error('password1')) { ?>
          <div class="alert alert-secondary text-center" role="alert"><?= form_error('password1'); ?></div>
        <?php } else if (form_error('name')) { ?>
          <div class="alert alert-secondary text-center" role="alert"><?= form_error('name'); ?></div>
        <?php } else if (form_error('email')) { ?>
          <div class="alert alert-secondary text-center" role="alert"><?= form_error('email'); ?></div>
        <?php } ?>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Registration
          </button>
        </div>

        <div class="text-center mt-3">
          <a class="small txt1" href="#">Forgot Password?</a>
        </div>
        <div class="text-center">
          <a class="small txt1" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
        </div>

        <div class="text-center p-t-30">
          <a class="txt1" href="#">
            Copyrigth&copy; STIKI Malang <?= date('Y'); ?>
          </a>
        </div>
      </form>
    </div>
  </div>
</div>


<div id="dropDownSelect1"></div>