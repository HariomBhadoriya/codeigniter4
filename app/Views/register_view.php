<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<body>
    <h2>Sign Up </h2>
<style>
    body {
        background: linear-gradient(to right, #74ebd5, #ACB6E5);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
        animation: fadeInDown 0.6s ease-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    form {
        background-color: #ffffff;
        max-width: 420px;
        margin: 60px auto;
        padding: 35px 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #444;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        outline: none;
    }

    input[type="submit"] {
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
        background: linear-gradient(to right, #0056b3, #003f7f);
    }

    @media (max-width: 480px) {
        form {
            padding: 25px 20px;
            margin: 40px 15px;
        }
    }
</style>


    <!-- Display Validation Errors -->
    <?php if(isset($validation)): ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register/store') ?>">
        <label>First Name:</label><br>
        <input type="text" name="firstName" value="<?= set_value('firstName') ?>"><br><br>

        <label>Last Name:</label><br>
        <input type="text" name="lastName" value="<?= set_value('lastName') ?>"><br><br>

        <label>Mobile Number:</label><br>
        <input type="text" name="mobileNumber" value="<?= set_value('mobileNumber') ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= set_value('email') ?>"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Register">
    </form>
    
 <?= $this->endSection() ?>
