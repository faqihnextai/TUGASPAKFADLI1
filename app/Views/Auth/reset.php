<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        background: #fff7e6;
        margin: 0;
        font-family: "Open Sans", sans-serif;
    }

    .content-body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-login {
        width: 380px;
        background: #ffffff;
        padding: 2em 2em 3em;
        border-radius: 12px;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.10);
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

    .text-title {
        text-align: center;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1.3em;
    }

    .text-desc {
        text-align: center;
        font-size: 14px;
        margin-top: -5px;
        color: #666;
        margin-bottom: 1.5em;
    }

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
        box-shadow: 0 0 5px rgba(255,159,72,.6);
    }

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
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: #ff7e39;
    }

    .error-text {
        color: #b50000;
        font-size: 13px;
        margin-top: -8px;
        margin-bottom: 10px;
    }

    .back-link {
        text-align: center;
        margin-top: 1.5em;
        font-size: 14px;
    }

    .back-link a {
        color: #d85f2a;
        font-weight: 600;
    }
</style>

<div class="content-body">
    <div class="card-login">

        <div class="logo-wrapper">
            <img src="<?= base_url('logo.jpg') ?>" alt="Logo">
        </div>

        <h1 class="text-title"><?= lang('Auth.resetYourPassword') ?></h1>

        <p class="text-desc"><?= lang('Auth.enterCodeEmailPassword') ?></p>

        <?= view('App\Views\Auth\_message_block') ?>

        <form action="<?= url_to('reset-password') ?>" method="post">
            <?= csrf_field() ?>

            <!-- TOKEN -->
            <input type="text" name="token"
                   class="input <?php if (session('errors.token')): ?>is-invalid<?php endif ?>"
                   placeholder="<?= lang('Auth.token') ?>"
                   value="<?= old('token', $token ?? '') ?>">

            <?php if (session('errors.token')): ?>
                <div class="error-text"><?= session('errors.token') ?></div>
            <?php endif; ?>

            <!-- EMAIL -->
            <input type="email" name="email"
                   class="input <?php if (session('errors.email')): ?>is-invalid<?php endif ?>"
                   placeholder="<?= lang('Auth.email') ?>"
                   value="<?= old('email') ?>">

            <?php if (session('errors.email')): ?>
                <div class="error-text"><?= session('errors.email') ?></div>
            <?php endif; ?>

            <!-- PASSWORD -->
            <input type="password" name="password"
                   class="input <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                   placeholder="<?= lang('Auth.newPassword') ?>">

            <?php if (session('errors.password')): ?>
                <div class="error-text"><?= session('errors.password') ?></div>
            <?php endif; ?>

            <!-- PASSWORD CONFIRM -->
            <input type="password" name="pass_confirm"
                   class="input <?php if (session('errors.pass_confirm')): ?>is-invalid<?php endif ?>"
                   placeholder="<?= lang('Auth.newPasswordRepeat') ?>">

            <?php if (session('errors.pass_confirm')): ?>
                <div class="error-text"><?= session('errors.pass_confirm') ?></div>
            <?php endif; ?>

            <button type="submit" class="btn-submit"><?= lang('Auth.resetPassword') ?></button>
        </form>

        <div class="back-link">
            <a href="<?= url_to('login') ?>">Kembali ke halaman login</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
