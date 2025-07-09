<?php

namespace App\Controllers;

use App\Models\VideoModel;
use CodeIgniter\Files\File;

class AdminDashboard extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new VideoModel();
    }

    public function index()
    {
        $data = [
            'videos' => $this->videoModel->findAll(),
            'total_views' => $this->videoModel->selectSum('views')->first()['views'] ?? 0,
            'total_duration' => $this->videoModel->selectSum('duration')->first()['duration'] ?? 0,
            'total_subscribers' => 0, // Replace with actual logic for subscribers
        ];

        return view('admin/dashboard', $data);
    }

    public function upload_video()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]',
            'video_file' => 'uploaded[video_file]|max_size[video_file,102400]|ext_in[video_file,mp4,avi,mov]', // 100MB max
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->with('error', $validation->getErrors());
        }

        $videoFile = $this->request->getFile('video_file');
        if ($videoFile->isValid() && !$videoFile->hasMoved()) {
            $newName = $videoFile->getRandomName();
            $videoFile->move(WRITEPATH . 'uploads', $newName);

            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'video_path' => 'uploads/' . $newName,
                'uploaded_by' => session()->get('user_id') ?? 1, // Replace with actual user ID
                'status' => 'active',
                'is_premium' => $this->request->getPost('is_premium') ?? 0,
                'duration' => 0, // You may need to calculate this (e.g., using FFmpeg)
                'views' => 0,
            ];

            $this->videoModel->insert($data);
            return redirect()->to('admin_dashboard')->with('success', 'Video uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload video.');
    }

    public function edit_video($id)
    {
        // Implement edit logic
    }

    public function delete_video($id)
    {
        $video = $this->videoModel->find($id);
        if ($video) {
            // Delete file from server
            if (file_exists(WRITEPATH . $video['video_path'])) {
                unlink(WRITEPATH . $video['video_path']);
            }
            $this->videoModel->delete($id);
            return redirect()->to('admin_dashboard')->with('success', 'Video deleted successfully.');
        }
        return redirect()->back()->with('error', 'Video not found.');
    }
}