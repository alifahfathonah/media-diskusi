<div class="limiter">
	<div class="container-login100" style="background-image: url('<?= base_url('assets/img/bg-01.jpg'); ?>');">
		<div class="wrap-login100">
			<form class="login100-form validate-form" method="POST" action="<?= base_url('auth'); ?>">
				<span class="login100-form-logo">
					<i class="zmdi zmdi-landscape"></i>
				</span>

				<span class="login100-form-title p-b-34 p-t-27">
					Log In With Your STIKI's Email
				</span>

				<div class="dropdown validate-input" data-validate="Choose username">
					<select name="" id="" class="form-control">
						<option value=""> User Categories </option>
						<option value=""> Student </option>
						<option value=""> Lecture </option>
						<option value=""> Administration </option>
					</select>
				</div>

				<div class="wrap-input100 validate-input mt-4" data-validate="Enter email">
					<input class="input100" type="text" name="email" id="password" placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100" type="password" name="password" id="password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="privacy">
					<label class="label-checkbox100" for="ckb1">
						Privacy Policy and Terms of Service
					</label>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Login
					</button>
				</div>

				<div class="text-center mt-3">
					<a class="small txt1" href="forgot-password.html">Forgot Password?</a>
				</div>
				<div class="text-center">
					<a class="small txt1" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
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