<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        // Menampilkan form login
        return view('auth/login');
    }

    public function loginSubmit()
    {
        $model = new UserModel();
        $session = session();
    
        $nrp = $this->request->getPost('nrp');
        $password = $this->request->getPost('password');
    
        // Validasi user
        $user = $model->where('nrp', $nrp)->first();
    
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Jika password valid, set session
                $session->set('isLoggedIn', true);
                $session->set('user_id', $user['id']);
                $session->set('user_name', $user['nama']);
                $session->set('role', $user['role']);
    
                return redirect()->to('/'); // Redirect ke halaman utama setelah login
            } else {
                // Password salah
                $session->setFlashdata('msg', 'NRP atau Password salah');
                return redirect()->to('/auth/login');
            }
        } else {
            // NRP tidak ditemukan
            $session->setFlashdata('msg', 'NRP atau Password salah');
            return redirect()->to('/auth/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth/login');
    }
}
