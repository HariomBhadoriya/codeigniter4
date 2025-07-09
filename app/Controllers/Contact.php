<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('contact_view');
    }

    public function store()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'     => 'required|min_length[2]',
            'subject'      => 'required|min_length[2]',
            'mobile'  => 'required|numeric|min_length[10]',
            'email'         => 'required|valid_email|is_unique[contact.email]',
            'message'      => 'required|min_length[6]',
            
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('contact_view', ['validation' => $validation]);
        }

        $model = new ContactModel();

        $model->save([
            'name'     => $this->request->getPost('name'),
            'subject'      => $this->request->getPost('subject'),
            'mobile'  => $this->request->getPost('mobile'),
            'email'         => $this->request->getPost('email'),
            'message'      => $this->request->getPost('message'),
            'submitted_at' => date('Y-m-d H:i:s')

        ]);

        return redirect()->to('contact/success');
    }

    public function success()
    {
        return "Thank you for your response!";
    }
}
