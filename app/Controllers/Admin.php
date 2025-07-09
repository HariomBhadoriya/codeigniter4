<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function __construct()
    {
        helper(['form']); // Load form helper globally for the controller
    }

    public function index()
    {
        return redirect()->to('admin/login');
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('admin/login')->with('error', 'Please log in to access the dashboard.');
        }

        return view('admin_dashboard');
    }

    public function login()
    {
        return view('admin_login');
    }

    public function auth()
    {
        $session = session();
        $model = new AdminModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $admin = $model->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'user_id'     => $admin['id'],
                'username'    => $admin['username'],
                'email'       => $admin['email'],
                'isLoggedIn'  => true
            ]);
            return redirect()->to('admin/dashboard')->with('success', 'Login successful.');
        }

        return redirect()->to('admin/login')->with('error', 'Invalid email or password.')->withInput();
    }

    public function register()
    {
        return view('admin_register');
    }

    public function saveAdmin()
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[admin.email]',
            'password' => 'required|min_length[6]',
            'mobile'   => 'required|numeric|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return view('admin_register', [
                'validation' => $this->validator
            ]);
        }

        $model = new AdminModel();
        $data = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash password
            'mobile'     => $this->request->getPost('mobile'),
            'subscriber' => 'no',
            'status'     => 'active'
        ];

        if ($model->save($data)) {
            return redirect()->to('admin/login')->with('success', 'Registration successful. Please login.');
        }

        return redirect()->to('admin/register')->with('error', 'Registration failed. Please try again.')->withInput();
    }

    public function logout()
    {
        session()->destroy();
        echo" logout successfully";
        return redirect()->to('admin/login')->with('success', 'Logged out successfully.');
    }
}