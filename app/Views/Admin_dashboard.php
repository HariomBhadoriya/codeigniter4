<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<style>
    .form-container {
    background: #fff;
    border-radius: 12px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    }

    .form-container:hover {
    transform: translateY(-3px);
    }

    .form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
    border: 1px solid #ced4da;
    border-radius: 8px;
    padding: 0.75rem;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
    border-color: #3498db;
    box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
    outline: none;
    }

    .form-control:invalid:focus {
    border-color: #e74c3c;
    box-shadow: 0 0 8px rgba(231, 76, 60, 0.2);
    }

    textarea.form-control {
    resize: vertical;
    min-height: 100px;
    }

    .form-select {
    background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23333'%3E%3Cpath d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E") no-repeat right 0.75rem center/16px 16px;
    }

    input[type="file"] {
    padding: 0.5rem;
    background: #f9f9f9;
    border-radius: 8px;
    cursor: pointer;
    }

    input[type="file"]::-webkit-file-upload-button {
    background: #3498db;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease;
    }       

    input[type="file"]::-webkit-file-upload-button:hover {
    background: #2980b9;
    }

    .btn-primary {
    background: #3498db;
    border: none;
    border-radius: 8px;
    padding: 0.75rem 2rem;
    font-size: 1.1rem;
    font-weight: 500;
    transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
    background: #2980b9;
    transform: translateY(-2px);
    }

    .btn-primary:active {
    transform: translateY(0);
    }

    .video-list-section {
    background: #fff;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .video-list-section h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    }

    .table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
    }

    .table thead th {
    background: #2c3e50;
    color: #fff;
    font-weight: 600;
    padding: 1rem;
    text-align: left;
    }

    .table tbody tr {
    transition: background 0.3s ease;
    }

    .table tbody tr:hover {
    background: #f1f8ff;
    }

    .table td {
    padding: 1rem;
    vertical-align: middle;
    border-bottom: 1px solid #dee2e6;
    }

    .table video {
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    }

    .table video:hover {
    transform: scale(1.05);
    }

    .btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    border-radius: 6px;
    }

    .btn-primary.btn-sm {
    background: #3498db;
    }

    .btn-primary.btn-sm:hover {
    background: #2980b9;
    }

    .btn-danger.btn-sm {
    background: #e74c3c;
    }

    .btn-danger.btn-sm:hover {
    background: #c0392b;
    }

    .no-videos {
    text-align: center;
    padding: 2rem;
    color: #7f8c8d;
    font-size: 1.2rem;
    background: #f9f9f9;
    border-radius: 8px;
    }

    @media (max-width: 768px) {
    .form-container, .video-list-section {
        padding: 1.5rem;
    }

    .table th, .table td {
        padding: 0.75rem;
        font-size: 0.9rem;
    }

    .table video {
        width: 80px;
        height: 80px;
    }

    .btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.85rem;
    }
    

    @media (max-width: 576px) {
    .table {
        display: block;
        overflow-x: auto;
    }

    .form-container {
        padding: 1rem;
    }

    .btn-primary {
        width: 100%;
        padding: 0.75rem;
    }
  }
 
</style>

<div class="container mt-4">
    <div class="text-center mb-4">
        <h2>Welcome to your dashboard, <?= esc(session()->get('username')) ?>!</h2>
    </div>
 
    
    <div class="row mb-4">
        <!-- Total Views -->
        
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5>Total Views</h5>
                    <p class="display-6"><?= number_format(esc($total_views ?? 0)) ?></p>
                </div>
            </div>
        </div>

      
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5>Total Duration</h5>
                    <p class="display-6"><?= number_format(esc($total_duration ?? 0)) ?> min</p>
                </div>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5>Subscribers</h5>
                    <p class="display-6"><?= number_format(esc($total_subscribers ?? 0)) ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <form action="<?= base_url('admin_dashboard/upload_video') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="title" class="form-label">Video Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4"><?= old('description') ?></textarea>
        </div>
        <div class="mb-3">
            <label for="video_file" class="form-label">Video File</label>
            <input type="file" class="form-control" id="video_file" name="video_file" accept="video/" required>
         </div>
        <div class="mb-3">
            <label for="is_premium" class="form-label">Video Type</label>
            <select id="is_premium" name="is_premium" class="form-select">
                <option value="0" <?= old('is_premium') == '0' ? 'selected' : '' ?>>Free</option>
                <option value="1" <?= old('is_premium') == '1' ? 'selected' : '' ?>>Premium</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Upload Video</button>
    </form>


<?= $this->endSection() ?> 
