<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
          <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
              <?php endif; ?>

              <form action="<?= base_url('changePass/changePassword') ?>" method="post">
                  <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" required>
                        </div>
         <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
<input type="password" name="new_password" id="new_password" class="form-control" required>
                                                
</div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Change Password</button>
                                         
                    </form>
                    <a href="<?= site_url('dashboard') ?>"> <button> Back</button> </a>
                    </div>
                            
                </div>
        </div>

         
    </div>
    </div>
</body>
</html>
