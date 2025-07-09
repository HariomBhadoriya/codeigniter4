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
        padding: 20px;
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
        margin-top: 30px;
    }

    .signup-link a {
        background-color: #28a745;
        color: white;
        padding: 8px 14px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .signup-link a:hover {
        background-color: #1e7e34;
    }
</style>

<div class="login-container">
    <h2>Login</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login/auth') ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>

  <p style="text-align: center; margin-top: 15px;">
  Don't have an account?
  <br>
  <a href="<?= base_url('register') ?>" style="background-color: blue; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none;">
    Sign up
  </a>
</p>

</div>

<?= $this->endSection() ?>
