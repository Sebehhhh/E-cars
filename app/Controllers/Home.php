<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): mixed
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }
    
        // Mengambil jumlah sarana & kursi yang tersedia
        $saranaModel = new \App\Models\SaranaModel();
        $kursiModel = new \App\Models\KursiModel();
    
        $data = [
            'total_sarana' => $saranaModel->countAll(), // Menghitung total sarana
            'total_kursi' => $kursiModel->where('status_kursi', 'kosong')->countAllResults() // Menghitung kursi tersedia
        ];
    
        return view('content/home', $data);
    }
    
}
