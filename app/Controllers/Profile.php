<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login
            return redirect()->to('/auth/login'); // Ganti '/auth/login' dengan URL login Anda
        }
        $model = new UserModel();
        $data['user'] = $model->find(session()->get('user_id'));
        return view('profile/index', $data);
    }

    public function update()
{
    if (!session()->get('isLoggedIn')) {
        // Jika tidak, redirect ke halaman login
        return redirect()->to('/auth/login'); // Ganti '/auth/login' dengan URL login Anda
    }
    $model = new UserModel();
    $userId = session()->get('user_id');

    $data = [
        'nama' => $this->request->getPost('name'), // Menggunakan 'nama' dari tabel
        'nrp' => $this->request->getPost('nrp'),   // Menggunakan 'nrp' dari tabel
        'role' => $this->request->getPost('role'), // Menggunakan 'role' dari tabel
        'jabatan' => $this->request->getPost('jabatan'), // Menggunakan 'jabatan' dari tabel
        'kontak' => $this->request->getPost('kontak'),   // Menggunakan 'kontak' dari tabel
    ];

    $model->update($userId, $data);
    return redirect()->to('/profile')->with('success', 'Profile updated successfully');
}

public function changePassword()
{
    if (!session()->get('isLoggedIn')) {
        // Jika tidak, redirect ke halaman login
        return redirect()->to('/auth/login'); // Ganti '/auth/login' dengan URL login Anda
    }
    $model = new UserModel();
    $userId = session()->get('user_id');
    $currentPassword = $this->request->getPost('current_password');
    $newPassword = $this->request->getPost('new_password');
    $user = $model->find($userId);
    // dd($userId);

    if (password_verify($currentPassword, $user['password'])) {
        $model->update($userId, ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);
        return redirect()->to('/profile')->with('success', 'Password changed successfully');
    } else {
        return redirect()->to('/profile')->with('error', 'Current password is incorrect');
    }
}
}
