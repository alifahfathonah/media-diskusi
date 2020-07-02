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

      <?= $this->session->flashdata('message'); ?>

      <form class="login100-form validate-form" method="POST" action="<?= base_url('auth'); ?>">
        <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
          <input class="input100" type="text" name="email" id="email" placeholder="Enter Email" value="<?= set_value('email'); ?>">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-user"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
          <input class="input100" type="password" name="password" id="password" placeholder="Enter Password">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock"></i>
          </span>
        </div>

        <div class="container-login100-form-btn-login p-t-10">
          <button class="login100-form-btn" type="submit"> L O G I N </button>
        </div>
      </form>


      <div class="text-center-forgot w-full">
        <a class="txt2" href="#login_form"> Forgot Username? Click Here </a>
      </div>

      <div class="popup-window">
        <a href="#x" class="overlay" id="login_form"></a>
        <div class="popup">
          <span class="login100-form-title-popup p-t-20 p-b-45"> Find Your Account </span>

          <div class="text-center w-full">
            <span class="login100-form-text-popup p-t-20 p-b-45"> we'll send a link to your email.<br>
              check your email to get a link.
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Email is required">
            <input class="input100" type="text" name="email" id="email" placeholder="Enter Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-inbox"></i>
            </span>
          </div>

          <div class="container-login100-form-btn-login p-t-10">
            <button class="login100-form-btn"> S E A R C H </button>
          </div>
          <a class="close" href="#close"></a>
        </div>
      </div>

      <div class="text-center-down w-full">
        <a class="txt3" href="<?= base_url('auth/registration'); ?>"> Don't Have an Account? Register Here <i class="fa fa-sign-in"></i></a>
      </div>
    </div>
  </div>
</div>