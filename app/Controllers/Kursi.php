<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KursiModel;
use App\Models\SaranaModel; // Pastikan Anda mengimpor model Sarana
use CodeIgniter\HTTP\ResponseInterface;

class Kursi extends BaseController
{
    protected $kursiModel;
    protected $saranaModel; // Tambahkan properti untuk model Sarana

    public function __construct()
    {
        $this->kursiModel = new KursiModel();
        $this->saranaModel = new SaranaModel(); // Inisialisasi model Sarana
    }

    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $data['kursi'] = $this->kursiModel->getKursiWithSarana();
        // var_dump($data);
        return view('kursi/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $data['sarana'] = $this->saranaModel->findAll(); // Ambil semua data sarana
        return view('kursi/tambah', $data); // Kirim data sarana ke view
    }

    public function store()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $this->kursiModel->save([
            'sarana_id' => $this->request->getPost('sarana_id'),
            'nomor_kursi' => $this->request->getPost('nomor_kursi'),
            'status_kursi' => $this->request->getPost('status_kursi'),
        ]);

        return redirect()->to('/kursi')->with('success', 'Kursi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $data['kursi'] = $this->kursiModel->find($id);
        $data['sarana'] = $this->saranaModel->findAll(); // Ambil semua data sarana
        return view('kursi/edit', $data); // Kirim data sarana ke view
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $this->kursiModel->update($id, [
            'sarana_id' => $this->request->getPost('sarana_id'),
            'nomor_kursi' => $this->request->getPost('nomor_kursi'),
            'status_kursi' => $this->request->getPost('status_kursi'),
        ]);

        return redirect()->to('/kursi')->with('success', 'Kursi berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $this->kursiModel->delete($id);
        return redirect()->to('/kursi')->with('success', 'Kursi berhasil dihapus.');
    }
}