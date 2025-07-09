<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My App' ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f7fa;
            color: #333;
            padding-right: 250px; 
        }

        .sidebar {
            background: #1a252f; 
            width: 250px;
            height: 80vh;
            position: fixed;
            top: 0;
            right: 0;
            margin-top:10px;
            margin-right: 3px;
            padding: 2rem 1rem;
            display: flex;
            border-radius: 10px;
            flex-direction: column;
            align-items: center;
            overflow-y: auto;
        }

        .sidebar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            margin-bottom: 2rem;
            text-align: center;
        }

        .sidebar-brand:hover {
            color: #f1c40f;
        }

        .sidebar-nav .nav-link {
            color: #fff;
            font-size: 1.1rem;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
            text-align: center;
            width: 100%;
        }

        .sidebar-nav .nav-link:hover {
            color: #f1c40f;
        }

        .sidebar-right {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .sidebar-right .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: #fff;
            font-weight: 500;
            margin-top: 50px;
        }

        .sidebar-right .profile img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        .sidebar-right a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .sidebar-right a:hover {
            color: #f1c40f;
        }

        .dropdown-menu {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 200px;
            padding: 1rem 0;
        }

        .dropdown-menu li {
            padding: 0.8rem 1.5rem;
        }

        .dropdown-menu .dropdown-item {
            color: #333;
            transition: background 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            background: #f1c40f;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 1.5rem;
            text-align: center;
        }

        .bg-primary {
            background: #3498db;
        }

        .bg-success {
            background: #2ecc71;
        }

        .bg-warning {
            background: #f1c40f;
        }

        .card h5 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .card .display-6 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 0.75rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
            outline: none;
        }

        .btn-primary {
            background: #3498db;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-danger {
            background: #e74c3c;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background: #2c3e50;
            color: #fff;
        }

        .table th, .table td {
            padding: 1rem;
            vertical-align: middle;
        }

        .table-striped tbody tr:nth-child(odd) {
            background: #f9f9f9;
        }

        .table video {
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            body {
                padding-right: 0;
            }
            .sidebar {
                width: 200px;
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .sidebar-toggler {
                position: fixed;
                top: 1rem;
                right: 1rem;
                z-index: 1100;
                color: #fff;
                background: #1a252f;
                border: none;
                padding: 0.5rem;
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>
    <button class="sidebar-toggler d-lg-none" type="button" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="sidebar">
        <a href="<?= base_url('admin_dashboard') ?>" class="sidebar-brand">VideoHub</a>
        <ul class="sidebar-nav nav flex-column">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact') ?>">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('tutorials') ?>">Tutorials</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="sidebarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarDropdownMenu">
                    <li><a class="dropdown-item" href="<?= base_url('admin_dashboard') ?>"><i class="fas fa-users me-2"></i>Subscribers</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('admin_dashboard') ?>"><i class="fas fa-clock me-2"></i>Watching Time</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('tutorials') ?>"><i class="fas fa-film me-2"></i>Your Videos</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('admin_dashboard') ?>"><i class="fas fa-upload me-2"></i>Upload New Video</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('admin_dashboard/settings') ?>"><i class="fas fa-cog me-2"></i>Account Settings</a></li>
                </ul>
            </li>
        </ul>
        <div class="sidebar-right">
            <div class="profile">
                <img src="<?= base_url('images/myimg.jpg') ?>" alt="Profile">
                <span><?= esc(session()->get('username')) ?></span>
            </div>
            <a href="<?= base_url('admin/logout') ?>">Logout</a>
        </div>
    </nav>

    <div class="content-wrapper container">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>