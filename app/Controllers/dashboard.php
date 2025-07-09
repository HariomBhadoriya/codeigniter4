<?php

namespace App\Controllers;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data = [
            'firstName' => session()->get('firstName'),
            'email' => session()->get('email'),
        ];

        return view('dashboard', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
