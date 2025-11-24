<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
	/* BACKGROUND CREAM */
	body {
		background: #fff7e6;
		/* soft cream */
		margin: 0;
		font-family: "Open Sans", sans-serif;
	}

	/* Center Wrapper */
	.content-body {
		min-height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	/* CARD STYLE */
	.card-login {
		width: 380px;
		background: #ffffff;
		padding: 2em 2em 3em;
		border-radius: 12px;
		box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.10);
		animation: fadeIn .4s ease;
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: translateY(10px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.logo-wrapper {
		text-align: center;
		margin-bottom: 1.5em;
	}

	.logo-wrapper img {
		width: 85px;
		height: 85px;
		border-radius: 12px;
	}

	/* Title */
	.text-title {
		text-align: center;
		font-size: 1.3rem;
		font-weight: 700;
		margin-bottom: 1.3em;
	}

	/* Input Style */
	.input {
		border: 1px solid #ddd;
		padding: .7em 12px;
		width: 100%;
		background: #fff;
		border-radius: 4px;
		outline: none;
		font-size: 15px;
		margin-bottom: 1em;
		transition: .2s;
	}

	.input:focus {
		border-color: #ff9d48;
		box-shadow: 0 0 5px rgba(255, 159, 72, .6);
	}

	/* Remember section */
	.field-group-inline {
		display: flex;
		justify-content: space-between;
		font-size: 14px;
		margin-bottom: 1.3em;
	}

	/* Button */
	.btn-submit {
		background: #e86c2f;
		border: 0;
		width: 100%;
		padding: .8em;
		color: #fff;
		font-size: 16px;
		border-radius: 4px;
		cursor: pointer;
		font-weight: 700;
		transition: .2s;
	}

	.btn-submit:hover {
		background: #ff7e39;
	}

	/* Separator */
	.separator-wrapper {
		position: relative;
		margin: 1.8em 0;
	}

	.separator::before {
		content: "";
		height: 1px;
		background: #ddd;
		width: 100%;
		position: absolute;
		top: 50%;
	}

	.separator span {
		position: relative;
		background: #fff;
		padding: 0 1em;
		color: #999;
		font-size: 12px;
	}

	/* Social login */
	.link-social-login {
		display: block;
		padding: .7em;
		border: 1px solid #ddd;
		background: #fafafa;
		margin-bottom: .5em;
		border-radius: 4px;
		font-size: 15px;
		text-align: center;
		font-weight: 600;
		color: #333;
		position: relative;
	}

	.link-social-login img {
		position: absolute;
		left: 16px;
		top: 50%;
		transform: translateY(-50%);
		width: 22px;
	}

	/* Small text */
	.text-register {
		text-align: center;
		font-size: 14px;
		margin-bottom: 1.2em;
	}

	.text-register a {
		color: #d85f2a;
		font-weight: 600;
	}
</style>


<!-- ========================================= -->
<!--                 PAGE START                -->
<!-- ========================================= -->

<div class="content-body">
	<div class="card-login">

		<div class="logo-wrapper">
			<img src="<?= base_url('logo.jpg') ?>" alt="Logo">
		</div>


		<h1 class="text-title">Masuk ke Akun</h1>

		<div class="text-register">
			Belum punya akun? <a href="<?= url_to('register') ?>">Daftar di sini</a>
		</div>

		<form action="<?= url_to('login') ?>" method="post">
			<?= csrf_field() ?>

			<!-- LOGIN -->
			<input class="input <?php if (session('errors.login')): ?>is-invalid<?php endif ?>"
				type="<?= $config->validFields === ['email'] ? 'email' : 'text' ?>" name="login"
				placeholder="<?= $config->validFields === ['email'] ? lang('Auth.email') : lang('Auth.emailOrUsername') ?>" />

			<!-- PASSWORD -->
			<input class="input <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
				type="password" name="password" placeholder="<?= lang('Auth.password') ?>" />

			<!-- REMEMBER -->
			<?php if ($config->allowRemembering): ?>
				<div class="field-group-inline">
					<label>
						<input type="checkbox" name="remember" <?php if (old('remember')): ?>checked<?php endif ?> />
						Ingat saya
					</label>

					<?php if ($config->activeResetter): ?>
						<a href="<?= url_to('forgot') ?>">Lupa Password?</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<button class="btn-submit" type="submit"><?= lang('Auth.loginAction') ?></button>
		</form>
		<?php if (session()->getFlashdata('error')): ?>
			<div style="
    background:#ffe7e7;
    padding:12px;
    margin-top:12px;
    text-align:center;
    border:1px solid #ffb3b3;
    border-radius:6px;
    color:#b50000;
    font-weight:600;
  ">
				<?= session()->getFlashdata('error') ?>

				<?php if (! empty($config->activeResetter)): ?>
					<div style="margin-top:8px;font-weight:600;">
						<a href="<?= url_to('forgot') ?>" style="color:#b50000;text-decoration:underline;">Lupa password? Pulihkan akun</a>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>


		<!-- SEPARATOR -->
		<div class="separator-wrapper">
			<div class="separator"><span>ATAU</span></div>
		</div>

		<!-- SOCIAL LOGIN -->
		<a href="#" class="link-social-login">
			<img src="<?= base_url('fb.png') ?>"> Login dengan Facebook
		</a>
		<a href="auth/google" class="link-social-login">
			<img src='<?= base_url("google.png") ?>'> Login dengan Google
		</a>

	</div>
</div>

<?= $this->endSection() ?>