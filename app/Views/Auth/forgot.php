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

    /* 3. CARD STYLE (Single Panel for Forgot Password) */
    .auth-card {
        max-width: 450px; /* Lebar lebih kecil dari login page */
        width: 100%;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 2.5em; /* Padding yang sama dengan panel kiri login */
        animation: fadeIn .6s ease;
        text-align: center; /* Rata tengah untuk konten satu kolom */
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Title */
    .text-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: #333;
    }

    /* Description Text */
    .text-desc {
        font-size: 15px;
        color: #666;
        margin-bottom: 2em;
        line-height: 1.5;
    }
    
    /* Input Style */
    .input {
        border: 1px solid #ddd;
        padding: .9em 15px;
        width: 100%;
        background: #fff;
        border-radius: 8px;
        outline: none;
        font-size: 16px;
        margin-bottom: 1.3em;
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
    }
    .text-register a {
        color: #5e35b1;
        font-weight: 600;
        text-decoration: none;
        font-size: 14px;
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
<!--               FORGOT PASSWORD PAGE            -->
<!-- ========================================= -->

<div class="content-body">
    <div class="auth-card">

        <h1 class="text-title"><?= lang('Auth.forgotPassword') ?></h1>

        <p class="text-desc">
            Masukkan alamat email yang terdaftar. Kami akan mengirimkan instruksi untuk mengatur ulang kata sandi Anda.
        </p>

        <!-- Message Block (CodeIgniter Auth) -->
        <?= view('App\Views\Auth\_message_block') ?>

        <form action="<?= url_to('forgot') ?>" method="post">
            <?= csrf_field() ?>

            <!-- EMAIL INPUT -->
            <input
                type="email"
                name="email"
                class="input <?= session('errors.email') ? 'is-invalid' : '' ?>"
                placeholder="<?= lang('Auth.emailAddress') ?>"
                value="<?= old('email') ?>"
            >

            <?php if (session('errors.email')): ?>
                <div style="color:#f44336;font-size:13px;margin-top:-10px;margin-bottom:10px; text-align: left;">
                    <?= session('errors.email') ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn-submit"><?= lang('Auth.sendInstructions') ?></button>
        </form>

        <!-- BACK TO LOGIN -->
        <div class="text-register">
            <a href="<?= url_to('login') ?>">Kembali ke halaman Login</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>