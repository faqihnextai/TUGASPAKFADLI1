<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    /* 1. Global Reset & Background (Light Gray/Cream) */
    body {
        background: #f1f5f9; /* Light gray background */
        margin: 0;
        font-family: 'Inter', sans-serif;
    }

    /* 2. Center Wrapper */
    .content-body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    /* 3. CARD STYLE (Single Panel for Register) */
    .auth-card {
        max-width: 450px; /* Lebar lebih kecil agar fokus ke form */
        width: 100%;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 2.5em; 
        animation: fadeIn .6s ease;
        text-align: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Logo Wrapper (dibiarkan opsional) */
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
        font-size: 2rem; /* Ukuran disamakan dengan title Sign In */
        font-weight: 800;
        margin-bottom: 1.5rem;
        color: #333;
    }

    /* Input Style */
    .input {
        border: 1px solid #ddd;
        padding: .9em 15px; /* Padding disamakan dengan input Sign In */
        width: 100%;
        background: #fff;
        border-radius: 8px; /* Sudut disamakan dengan Sign In */
        outline: none;
        font-size: 16px;
        margin-bottom: 1.3em; /* Jarak disamakan dengan Sign In */
        transition: .2s;
    }
    .input:focus {
        border-color: #5e35b1; /* Deep purple focus */
        box-shadow: 0 0 5px rgba(94, 53, 177, 0.4);
    }
    .input.is-invalid {
        border-color: #f44336;
    }

    /* Button */
    .btn-submit {
        background: #5e35b1; /* Deep purple */
        border: 0;
        width: 100%;
        padding: .8em;
        color: #fff;
        font-size: 18px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 700;
        transition: .2s;
        letter-spacing: 1px;
    }
    .btn-submit:hover {
        background: #7953b7;
        box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);
    }

    /* Back to Login Link */
    .text-register {
        margin-top: 1.8em;
        font-size: 14px;
        color: #666;
    }
    .text-register a {
        color: #5e35b1; /* Deep purple link */
        font-weight: 600;
        text-decoration: none;
    }
    .text-register a:hover {
        text-decoration: underline;
    }

    /* Message Block Styling (Success/Error) */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        text-align: left;
        font-size: 14px;
    }
    .alert-success {
        background-color: #e8f5e9;
        border: 1px solid #a5d6a7;
        color: #2e7d32;
    }
    .alert-danger {
        background-color: #ffebee;
        border: 1px solid #ef9a9a;
        color: #c62828;
    }
</style>


<!-- ========================================= -->
<!--               REGISTER / SIGN UP PAGE            -->
<!-- ========================================= -->

<div class="content-body">
    <div class="auth-card">

        <!-- Logo is optional, uncomment if you want to show it -->
        <!-- <div class="logo-wrapper">
            <img src="<?= base_url('logo.jpg') ?>" alt="Logo">
        </div> -->

        <h1 class="text-title">Buat Akun Baru</h1>

        <!-- Message Block (CodeIgniter Auth) -->
        <?= view('App\Views\Auth\_message_block') ?>

        <form action="<?= url_to('register') ?>" method="post">
            <?= csrf_field() ?>

            <!-- EMAIL INPUT -->
            <input type="email"
                class="input <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                name="email"
                placeholder="<?= lang('Auth.email') ?>"
                value="<?= old('email') ?>">

            <!-- USERNAME INPUT -->
            <input type="text"
                class="input <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
                name="username"
                placeholder="<?= lang('Auth.username') ?>"
                value="<?= old('username') ?>">

            <!-- PASSWORD INPUT -->
            <input type="password"
                class="input <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                name="password"
                placeholder="<?= lang('Auth.password') ?>">

            <!-- CONFIRM PASSWORD INPUT -->
            <input type="password"
                class="input <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                name="pass_confirm"
                placeholder="<?= lang('Auth.repeatPassword') ?>">

            <button type="submit" class="btn-submit">
                <?= lang('Auth.register') ?>
            </button>

        </form>

        <!-- BACK TO LOGIN -->
        <div class="text-register">
            Sudah punya akun? <a href="<?= url_to('login') ?>">Masuk di sini</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>