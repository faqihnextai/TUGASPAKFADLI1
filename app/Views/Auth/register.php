<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
/* BACKGROUND CREAM */
body {
  background: #fff7e6;
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
  box-shadow: 0px 8px 25px rgba(0,0,0,0.10);
  animation: fadeIn .4s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
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

.text-register {
  text-align: center;
  font-size: 14px;
  margin-top: 1.3em;
}
.text-register a {
  color: #d85f2a;
  font-weight: 600;
}
</style>


<div class="content-body">
  <div class="card-login">

    <div class="logo-wrapper">
      <img src="<?= base_url('logo.jpg') ?>" alt="Logo">
    </div>

    <h1 class="text-title">Buat Akun Baru</h1>

    <?= view('App\Views\Auth\_message_block') ?>

    <form action="<?= url_to('register') ?>" method="post">
      <?= csrf_field() ?>

      <input type="email"
             class="input <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
             name="email"
             placeholder="<?= lang('Auth.email') ?>"
             value="<?= old('email') ?>">

      <input type="text"
             class="input <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
             name="username"
             placeholder="<?= lang('Auth.username') ?>"
             value="<?= old('username') ?>">

      <input type="password"
             class="input <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
             name="password"
             placeholder="<?= lang('Auth.password') ?>">

      <input type="password"
             class="input <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
             name="pass_confirm"
             placeholder="<?= lang('Auth.repeatPassword') ?>">

      <button type="submit" class="btn-submit">
        <?= lang('Auth.register') ?>
      </button>

    </form>

    <div class="text-register">
        Sudah punya akun? <a href="<?= url_to('login') ?>">Masuk di sini</a>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
