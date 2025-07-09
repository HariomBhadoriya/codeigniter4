<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        min-height: 100vh;
        /* display: flex; */
        align-items: center;
        justify-content: center;
        animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 35px 45px;
        border-radius: 12px;
        width: 320px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .login-container:hover {
        transform: scale(1.02);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    label {
        font-weight: 600;
        color: #444;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: border-color 0.3s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #007bff;
        outline: none;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background: linear-gradient(to right, #007bff, #0056b3);
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s;
    }

    input[type="submit"]:hover {
        background: linear-gradient(to right, #0056b3, #003f7f);
    }

    .error {
        color: red;
        margin-bottom: 15px;
        text-align: center;
    }

    .signup-link {
        text-align: center;
        margin-top: 20px;
    }

    .signup-link a {
        color: #007bff;
        text-decoration: none;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-container">
    <h2>Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; text-align: center; margin-bottom: 15px;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('admin/auth') ?>">
        <?= csrf_field() ?>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= set_value('email') ?>" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>

    <div class="signup-link">
        <p>Don't have an account? <a href="<?= base_url('admin/register') ?>">Sign up</a></p>
    </div>
</div>

<?= $this->endSection() ?>