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
        margin-top: -10px;
        color: #666;
        margin-bottom: 1.5em;
        line-height: 1.4;
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
        box-shadow: 0 0 5px rgba(255, 159, 72, .6);
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
    }

    .btn-submit:hover {
        background: #ff7e39;
    }

    .text-register {
        text-align: center;
        font-size: 14px;
        margin-top: 1.8em;
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

        <h1 class="text-title"><?= lang('Auth.forgotPassword') ?></h1>

        <p class="text-desc">
            Masukkan email terdaftar. Kami akan mengirimkan link untuk memulihkan password.
        </p>

        <?= view('App\Views\Auth\_message_block') ?>

        <form action="<?= url_to('forgot') ?>" method="post">
            <?= csrf_field() ?>

            <input type="email"
                   name="email"
                   class="input <?php if (session('errors.email')): ?>is-invalid<?php endif ?>"
                   placeholder="<?= lang('Auth.emailAddress') ?>">

            <?php if (session('errors.email')): ?>
                <div style="color:#b50000;font-size:13px;margin-top:-8px;margin-bottom:10px;">
                    <?= session('errors.email') ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn-submit"><?= lang('Auth.sendInstructions') ?></button>
        </form>

        <div class="text-register">
            <a href="<?= url_to('login') ?>">Kembali ke login</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
