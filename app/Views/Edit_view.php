<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; }
        
        .error { color: red; }
        .success { color: green; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        a { display:flex; margin-top: 10px; color: #007bff; text-decoration: none; }
    </style>
    
</head>
<body>
    <h2>Edit Profile</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success"><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <p class="error"><?= esc(session()->getFlashdata('error')) ?></p>
    <?php endif; ?>

    <form action="<?= site_url('editProfile') ?>" method="post">
        
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" value="<?= esc($user['firstName'] ?? '') ?>"required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" value="<?= esc($user['lastName'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= esc($user['email'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="mobileNumber">Mobile Number</label>
            <input type="text" id="mobileNumber" name="mobileNumber" value="<?= esc($user['mobileNumber'] ?? '') ?>" maxlength="15" required>
        </div>
        <button type="submit">Done</button>
    </form>

    <a href="<?= site_url('dashboard') ?>"> <button> Back</button> </a>
</body>
</html>
