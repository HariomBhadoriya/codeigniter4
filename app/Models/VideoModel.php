<?php
namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'description',
        'video_path',
        'uploaded_by',
        'status',
        'is_premium',
        'duration',
        'views',
        'created_date'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_date';
    protected $updatedField = 'updated_date';
}
?>