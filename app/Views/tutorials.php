<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video List</title>
    <style>
        .video-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            padding: 1rem;
        }
        .video-card {
            width: 300px;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        .video-card video {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .video-card-body {
            padding: 1rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .video-card-body h5 {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        .video-card-body p {
            margin: 0.25rem 0;
            color: #6c757d;
        }
        .video-card-footer {
            padding: 0.75rem;
            background: #f8f9fa;
            border-top: 1px solid #dee2e6;
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Video List -->
    <h2 class="mt-5 ms-3">Video List</h2>
    <?php if (!empty($videos)): ?>
        <div class="video-container">
            <?php foreach ($videos as $video): ?>
                <div class="video-card">
                    <video controls>
                        <source src="<?= base_url(esc($video['video_path'])) ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-card-body">
                        <div>
                            <h5><?= esc($video['title']) ?></h5>
                            <p>Type: <?= $video['is_premium'] ? 'Premium' : 'Free' ?></p>
                            <p>Views: <?= number_format(esc($video['views'])) ?></p>
                            <p>Duration: <?= number_format(esc($video['duration'])) ?> min</p>
                        </div>
                        <div class="video-card-footer">
                            <a href="<?= base_url('admin_dashboard/edit_video/' . $video['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="<?= base_url('admin_dashboard/delete_video/' . $video['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="ms-3">No videos available.</p>
    <?php endif; ?>
</body>
</html>
<?= $this->endSection() ?>