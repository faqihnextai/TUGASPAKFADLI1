<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        background: #f1f5f9;
        margin: 0;
        font-family: 'Inter', sans-serif;
    }

    .content-body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .auth-card {
        max-width: 800px;
        width: 100%;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        display: flex;
        overflow: hidden;
        animation: fadeIn .6s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .sign-in-panel {
        flex: 1;
        padding: 2.5em;
        min-width: 300px;
    }

    .text-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        color: #333;
    }

    /* ===== SOCIAL ICONS ===== */
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 1.5em;
    }

    .social-icon {
        width: 38px;
        height: 38px;
        border: 1px solid #ddd;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .2s;
        background: #fff;
    }

    .social-icon:hover {
        background: #f5f5f5;
        border-color: #aaa;
    }

    .social-icon img {
        width: 60%;
        height: 60%;
        object-fit: contain;
    }

    /* Separator */
    .separator-wrapper { margin: 1.5em 0; position: relative; text-align: center; }
    .separator::before {
        content: "";
        height: 1px;
        background: #eee;
        width: 100%;
        position: absolute;
        top: 50%; left: 0;
    }
    .separator span {
        background: #fff;
        padding: 0 10px;
        color: #999;
        font-size: 13px;
        position: relative;
    }

    /* Inputs */
    .input {
        border: 1px solid #ddd;
        padding: .9em 15px;
        width: 100%;
        border-radius: 8px;
        font-size: 16px;
        margin-bottom: 1.3em;
        transition: .2s;
    }

    .input:focus {
        border-color: #5e35b1;
        box-shadow: 0 0 5px rgba(94, 53, 177, 0.4);
    }

    .input.is-invalid { border-color: #f44336; }

    .link-forgot {
        display: block;
        text-align: right;
        margin-top: -10px;
        margin-bottom: 2em;
        font-size: 14px;
        color: #5e35b1;
        font-weight: 600;
    }

    .btn-submit {
        background: #5e35b1;
        border: 0;
        width: 100%;
        padding: .8em;
        color: #fff;
        font-size: 18px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 700;
        transition: .2s;
    }

    .btn-submit:hover {
        background: #7953b7;
        box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);
    }

    .error-box {
        background: #ffecb3;
        padding: 12px;
        margin-top: 20px;
        text-align: center;
        border: 1px solid #ffcc80;
        border-radius: 8px;
        color: #e65100;
        font-weight: 600;
        font-size: 14px;
    }

    .sign-up-panel {
        flex: 1;
        padding: 2.5em;
        background: linear-gradient(135deg, #7953b7, #5e35b1);
        color: #fff;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-width: 300px;
    }

    .sign-up-panel h2 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5em;
    }

    .btn-signup {
        background: #fff;
        border: 2px solid #fff;
        width: 60%;
        margin: 0 auto;
        padding: .8em;
        color: #5e35b1;
        border-radius: 8px;
        font-weight: 700;
        transition: .2s;
    }

    .btn-signup:hover { background: #e0e0e0; }

    @media (max-width: 768px) {
        .auth-card { flex-direction: column; max-width: 400px; }
        .sign-up-panel { border-radius: 0 0 20px 20px; }
    }
</style>

<!-- ================================ PAGE ================================ -->

<div class="content-body">
    <div class="auth-card">

        <!-- LEFT PANEL -->
        <div class="sign-in-panel">
            <h1 class="text-title">Sign In</h1>

            <div class="social-icons">
                <!-- Google -->
               <a href="<?= site_url('google_login_start') ?>" class="social-icon">
    <img src="https://image.similarpng.com/file/similarpng/very-thumbnail/2020/06/Logo-google-icon-PNG.png">
</a>

<a href="<?= site_url('facebook_login_start') ?>" class="social-icon">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFAw5xjAZJ66P77RqKI_XspB-aQ06RKUD0pQ&s">
</a>
            </div>

            <div class="separator-wrapper">
                <div class="separator"><span>or use your email password</span></div>
            </div>

            <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>

                <input
                    class="input <?= session('errors.login') ? 'is-invalid' : '' ?>"
                    type="<?= $config->validFields === ['email'] ? 'email' : 'text' ?>"
                    name="login"
                    placeholder="Email"
                />

                <input
                    class="input <?= session('errors.password') ? 'is-invalid' : '' ?>"
                    type="password"
                    name="password"
                    placeholder="Password"
                />

                <?php if ($config->activeResetter): ?>
                    <a href="<?= url_to('forgot') ?>" class="link-forgot">Forgot Your Password?</a>
                <?php endif; ?>

                <button class="btn-submit" type="submit">SIGN IN</button>
            </form>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="error-box">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- RIGHT PANEL -->
        <div class="sign-up-panel">
            <h2>Hello, Friend!</h2>
            <p>Register to access all features</p>
            <a href="<?= url_to('register') ?>" class="btn-signup">SIGN UP</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
