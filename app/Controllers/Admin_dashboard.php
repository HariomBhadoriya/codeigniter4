<?php

namespace App\Controllers;

use App\Models\VideoModel;
use App\Models\AdminModel;
use CodeIgniter\HTTP\RedirectResponse;

class Admin_dashboard extends BaseController
{
    protected $videoModel;
    protected $adminModel;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->videoModel = new VideoModel();
        $this->adminModel = new AdminModel();
    }

    public function index(): string
    {
        $admin_id = session()->get('user_id'); // Use 'user_id' to match upload_video

        $data = [
            'title' => 'Admin Dashboard',
            'total_views' => $this->videoModel->where('uploaded_by', $admin_id)->selectSum('views')->first()['views'] ?? 0,
            'total_duration' => $this->videoModel->where('uploaded_by', $admin_id)->selectSum('duration')->first()['duration'] ?? 0,
            'total_subscribers' => $this->adminModel->countAllResults(),
            'videos' => $this->videoModel->where('uploaded_by', $admin_id)->findAll()
        ];

        return view('admin_dashboard', $data);
    }

    public function upload_video(): RedirectResponse
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]',
            'video_file' => 'uploaded[video_file]|max_size[video_file,102400]|mime_in[video_file,video/mp4,video/avi,video/quicktime]'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->with('error', implode('<br>', $validation->getErrors()));
        }

        $videoFile = $this->request->getFile('video_file');
        if ($videoFile->isValid() && !$videoFile->hasMoved()) {
            $newName = $videoFile->getRandomName();
            $uploadPath = FCPATH . 'uploads/videos';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $videoFile->move($uploadPath, $newName);

            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'video_path' => 'uploads/videos/' . $newName,
                'uploaded_by' => session()->get('user_id'),
                'status' => 'active',
                'is_premium' => $this->request->getPost('is_premium') ? 1 : 0,
                'duration' => 0,
                'views' => 0,
                'created_date' => date('Y-m-d H:i:s')
            ];

            if (!$data['uploaded_by']) {
                return redirect()->back()->with('error', 'User session invalid. Please log in again.');
            }

            if ($this->videoModel->insert($data)) {
                log_message('debug', 'Video uploaded: ' . $data['video_path']);
                return redirect()->to('/admin_dashboard')->with('success', 'Video uploaded successfully.');
            }

            log_message('error', 'Database insert failed for video: ' . $data['video_path']);
            return redirect()->back()->with('error', 'Failed to save video metadata.');
        }

        return redirect()->back()->with('error', 'Failed to upload video.');
    }

    public function manage_videos(): string
    {
        $admin_id = session()->get('user_id'); // Use 'user_id' to match upload_video

        $data = [
            'title' => 'Manage Videos',
            'total_views' => $this->videoModel->where('uploaded_by', $admin_id)->selectSum('views')->first()['views'] ?? 0,
            'total_duration' => $this->videoModel->where('uploaded_by', $admin_id)->selectSum('duration')->first()['duration'] ?? 0,
            'total_subscribers' => $this->adminModel->countAllResults(),
            'videos' => $this->videoModel->where('uploaded_by', $admin_id)->findAll()
        ];

        return view('tutorials', $data);
    }

    public function edit_video($id): string
    {
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->to('admin_dashboard')->with('error', 'Invalid video ID.');
        }

        $admin_id = session()->get('user_id'); // Use 'user_id' to match upload_video
        $video = $this->videoModel->where(['id' => $id, 'uploaded_by' => $admin_id])->first();

        if (!$video) {
            return redirect()->to('admin_dashboard')->with('error', 'Video not found or access denied.');
        }

        $data = [
            'title' => 'Edit Video',
            'video' => $video
        ];

        return view('edit_video', $data);
    }

    public function update_video($id): RedirectResponse
    {
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->to('admin_dashboard')->with('error', 'Invalid video ID.');
        }

        $admin_id = session()->get('user_id'); // Use 'user_id' to match upload_video
        $video = $this->videoModel->where(['id' => $id, 'uploaded_by' => $admin_id])->first();

        if (!$video) {
            return redirect()->to('admin_dashboard')->with('error', 'Video not found or access denied.');
        }

        $validation = \Config\Services::validation();
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'is_premium' => 'in_list[0,1]',
            'description' => 'permit_empty|max_length[1000]'
        ];

        $videoFile = $this->request->getFile('video_file');
        if ($videoFile && $videoFile->isValid()) {
            $rules['video_file'] = 'max_size[video_file,102400]|mime_in[video_file,video/mp4,video/avi,video/quicktime]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'is_premium' => $this->request->getPost('is_premium') ? 1 : 0
        ];

        if ($videoFile && $videoFile->isValid() && !$videoFile->hasMoved()) {
            try {
                $newName = $videoFile->getRandomName();
                $uploadPath = FCPATH . 'uploads/videos';

                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $videoFile->move($uploadPath, $newName);
                $data['video_path'] = 'uploads/videos/' . $newName;

                if (!empty($video['video_path']) && file_exists(FCPATH . $video['video_path'])) {
                    unlink(FCPATH . $video['video_path']);
                }
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Failed to upload video file: ' . $e->getMessage());
            }
        }

        if ($this->videoModel->update($id, $data)) {
            return redirect()->to('admin_dashboard')->with('success', 'Video updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update video.');
    }

    public function delete_video($id): RedirectResponse
    {
        $admin_id = session()->get('user_id'); // Use 'user_id' to match upload_video
        $video = $this->videoModel->where(['id' => $id, 'uploaded_by' => $admin_id])->first();

        if (!$video) {
            return redirect()->to('admin_dashboard')->with('error', 'Video not found or access denied.');
        }

        if ($this->videoModel->delete($id)) {
            if (!empty($video['video_path']) && file_exists(FCPATH . $video['video_path'])) {
                unlink(FCPATH . $video['video_path']);
            }

            return redirect()->to('admin_dashboard')->with('success', 'Video deleted successfully.');
        }

        return redirect()->to('admin_dashboard')->with('error', 'Failed to delete video.');
    }
}