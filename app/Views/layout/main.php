<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My App' ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        nav {
            background: linear-gradient(to right, #0083b0, #00b4db);
            padding: 15px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffe082;
        }

        .nav-icon {
            margin-right: 8px;
        }

        .content-wrapper {
            padding: 40px 20px;
            max-width: 960px;
            margin: auto;
        }

        @media (max-width: 576px) {
            nav {
                text-align: center;
            }

            nav a {
                display: block;
                margin: 10px 0;
            }

            .content-wrapper {
                padding: 20px 10px;
            }
        }
    </style>
</head>
<body>

<!-- <nav>
    <a href="<?= base_url('register') ?>"><i class="fas fa-user-plus nav-icon"></i>Register</a>
    <a href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt nav-icon"></i>Login</a>
    <a href="<?= base_url('contact') ?>"><i class="fas fa-envelope nav-icon"></i>Contact</a>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Left-aligned nav links -->
        <div class="navbar-nav">
            <a class="nav-link" href="<?= base_url('admin/register') ?>">
                <i class="fas fa-user-plus nav-icon"></i> Register
            </a>
            <a class="nav-link" href="<?= base_url('admin/login') ?>">
                <i class="fas fa-sign-in-alt nav-icon"></i> Login
            </a>
            <a class="nav-link" href="<?= base_url('contact') ?>">
                <i class="fas fa-envelope nav-icon"></i> Contact
            </a>
        </div>

    
        <div class="navbar-nav ms-auto align-items-center">
            <div class="d-flex align-items-center me-3">
                <img src="<?= base_url('images/img5.jpg') ?>" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                <div>
                    <!-- <h6 class="mb-0">Hariom</h6> -->
                    <small><a href="<?= base_url('profile') ?>" class="text-decoration-none">Profile</a></small>
                </div>
            </div>
            <a class="nav-link" href="<?= base_url('admin/logout') ?>">
                <i class="fas fa-sign-out-alt nav-icon"></i> Logout
            </a>
        </div>
    </div>
</nav>


<div class="content-wrapper">
    <?= $this->renderSection('content') ?>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
