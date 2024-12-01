<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): mixed // Ubah tipe kembalian menjadi mixed
    {
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login
            return redirect()->to('/auth/login'); // Ganti '/auth/login' dengan URL login Anda
        }
        return view('content/home');
    }
}
