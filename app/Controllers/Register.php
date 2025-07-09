<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Register extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('register_view');
    }

    public function store()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'firstName'     => 'required|min_length[2]',
            'lastName'      => 'required|min_length[2]',
            'mobileNumber'  => 'required|numeric|min_length[10]',
            'email'         => 'required|valid_email|is_unique[user.email]',
            'password'      => 'required|min_length[6]',
            
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('register_view', ['validation' => $validation]);
        }

        $model = new AdminModel();

        $model->save([
            'firstName'     => $this->request->getPost('firstName'),
            'lastName'      => $this->request->getPost('lastName'),
            'mobileNumber'  => $this->request->getPost('mobileNumber'),
            'email'         => $this->request->getPost('email'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
       
        ]);

        return redirect()->to('register/success');
    }

    public function success()
    {
        return "Registration successful!";
    }
}
