<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .d-flex {
      display: flex;
       border:50%;
    }

    .sidebar {
      border-radius:10px;
      width: 15vw;
      height: 90vh;
      background-color: #343a40;
      color: white;
      padding: 20px;
    }

    .sidebar .profile {
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar .profile img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin-bottom: 10px;
    }

    .content {
      flex-grow: 1;
      padding: 20px;
    }

    .carousel-inner {
      height: 500px;
    }

    .carousel-inner img {
      object-fit: cover;
      height: 100%;
    }
  </style>
</head>
<body class="bg-light">

<div class="d-flex flex-row-reverse pt-40 ">
  
  <div class="sidebar pt-4">
    <div class="profile">
      <img src="images/img5.jpg" alt="Profile Picture">
      <h5>Hariom</h5>
    </div>
    <nav>
      <ul class="list-unstyled">
        <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
        <!-- <li><a href="<?= base_url('register') ?>">Sign up</a></li> -->
        <li><a href="<?= base_url('changePass/changePassword') ?>">Change Password</a></li>
        <li><a href="<?= base_url('editProfile') ?>">Profile</a></li>
        <li><a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a></li>
      </ul>
    </nav>
  </div>
  <div class="content">
   

   
    <div class="text-center mb-4">
      <h2>Welcome to your dashboard, <?= esc(session()->get('username')) ?>!</h2>
    </div>

   
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Your Details</h5>
            <p><strong>Name:</strong> <?= esc(session()->get('username')) ?></p>
            <p><strong>Email:</strong> <?= esc(session()->get('email')) ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- <footer class="bg-dark text-white pt-4 pb-2">
  <div class="container text-center text-md-left">
    <div class="row">

      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase">About Us</h5>
        <p>
          We build secure and scalable web applications with a focus on performance and user experience.
        </p>
      </div>

      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Home</a></li>
          <li><a href="#" class="text-white">Services</a></li>
          <li><a href="#" class="text-white">Contact</a></li>
          <li><a href="#" class="text-white">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="text-uppercase">Contact</h5>
        <p>Email: Hariom123@example.com</p>
        <p>Phone: +91 1234567890</p>
        <p>Location: Gormi, MP, India</p>
      </div>

    </div>
  </div>

  <div class="text-center py-3 border-top border-secondary">
     2025 ROPS CONSULTANCY SERVICES. All rights reserved.
  </div>
</footer>-->

</body>
</html>
