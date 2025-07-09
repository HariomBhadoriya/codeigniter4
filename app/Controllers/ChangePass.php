<?php
namespace App\Controllers;
use App\Models\UserModel;
class ChangePass extends BaseController
{
    public function changePassword()
    {
        $session = session();
        if (!$session->get('user_id')) {
            return redirect()->to('/login')->with('error', 'Please log in to change your password.');
        }
        return view('ChangePassword_view');
    }

    public function changePasswordForm()
    {
        $session = session();
        $user_id = $session->get('user_id');

        if (!$user_id) {
            log_message('error', 'Session user_id not found in changePasswordForm');
            return redirect()->to('/login')->with('error', 'Please log in to change your password.');
        }
         $model = new UserModel();
        $user = $model->find($user_id);
        if (!$user) {
            log_message('error', 'User not found for ID: ' . $user_id);
            return redirect()->back()->with('error', 'User not found.');
        }

        if (!isset($user['password'])) {
            echo"('error', 'Password field not found in user data for ID: ' . $user_id)";
            return redirect()->back()->with('error', 'Password field not found in user data.');
        }
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            return redirect()->back()->with('error', 'All password fields are required.');
        }
        if (!password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'New passwords do not match.');
        }

         $updateResult = $model->update($user_id, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        if ($updateResult === false) {
            return redirect()->back()->with('error', 'Failed to update password.');
        }
    echo"Password changed successfully";
     return redirect()->back()->with('success', 'Password changed successfully.');

    }
}