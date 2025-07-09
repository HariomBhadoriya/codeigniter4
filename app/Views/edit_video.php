<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="text-center mb-4">
        <h2>Edit Video</h2>
    </div>

    <!-- Edit Video Form -->
    <div class="form-container">
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin_dashboard/update_video/' . $video['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="title" class="form-label">Video Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= old('title', esc($video['title'])) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?= old('description', esc($video['description'])) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="video_file" class="form-label">Video File (Optional)</label>
                <input type="file" class="form-control" id="video_file" name="video_file" accept="video/*">
                <?php if (!empty($video['video_path'])): ?>
                    <small class="form-text text-muted">Current video: <a href="<?= base_url(esc($video['video_path'])) ?>" target="_blank">View</a></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="is_premium" class="form-label">Video Type</label>
                <select id="is_premium" name="is_premium" class="form-select">
                    <option value="0" <?= old('is_premium', $video['is_premium']) == '0' ? 'selected' : '' ?>>Free</option>
                    <option value="1" <?= old('is_premium', $video['is_premium']) == '1' ? 'selected' : '' ?>>Premium</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Video</button>
            <a href="<?= base_url('admin_dashboard') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>