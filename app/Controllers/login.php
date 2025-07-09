<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Login extends BaseController
{
    public function index()
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
                'firstName'   => $admin['username'], 
                'email'  => $admin['email'],
                'is_logged_in'=> true
            ]);
            return redirect()->to('Admin_dashboard');
        } else {
            return redirect()->to('login')->with('error', 'check your email id and password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');

    }
}
