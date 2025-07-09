<?php
namespace App\Controllers;
use App\Models\UserModel;

class Edit extends BaseController
{
   public function editProfile()
{
    $session = session();
    $userId = $session->get('id');

    $userModel = new UserModel();
    $user = $userModel->find($userId);

    if (!$user) {
        echo"('error', 'User not found for ID: ' . $userId)";
        return redirect()->to('/login')->with('error', 'User not found.');
    }
    if ($this->request->getMethod() === 'post') {
        if (!$this->validate([
            'firstName'     => 'required|min_length[2]|max_length[50]',
            'lastName'      => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|valid_email|max_length[100]',
            'mobileNumber'  => 'permit_empty|regex_match[/^[0-9]{10}$/]|max_length[10]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Please correct the form errors.');
        }

        $data = [
            'firstName'     => $this->request->getPost('firstName'),
            'lastName'      => $this->request->getPost('lastName'),
            'email'         => $this->request->getPost('email'),
            'mobileNumber'  => $this->request->getPost('mobileNumber'),
        ];
        $userId = $session->get('id');



 if ($user->update($userId, $data)) {
            echo" update successfull";
            // return redirect()->to('edit')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }

    return view('Edit_view', ['user' => $user]);
}
}