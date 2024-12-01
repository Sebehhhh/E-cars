<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\SaranaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Sarana extends BaseController
{
    protected $saranaModel;

    public function __construct()
    {
        $this->saranaModel = new SaranaModel();
    }

    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        
        $data['sarana'] = $this->saranaModel->findAll();
        return view('sarana/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll(); // Ambil semua kategori
        return view('sarana/tambah', $data);
    }

    public function simpan()
{
    if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
        // Jika tidak, redirect ke halaman login atau halaman lain
        return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
    }

    // Ambil data dari form
    $data = [
        'nama'       => $this->request->getPost('nama'),
        'kategori_id'=> $this->request->getPost('kategori_id'),
        'deskripsi'  => $this->request->getPost('deskripsi'),
    ];

    // Aturan validasi
    $rules = [
        'nama'       => 'required|max_length[255]',  // Nama wajib diisi dan maksimal 255 karakter
        'kategori_id'=> 'required|is_natural_no_zero', // Kategori ID wajib diisi dan harus angka > 0
        'deskripsi'  => 'required|max_length[500]',  // Deskripsi wajib diisi dan maksimal 500 karakter
    ];

    // Jika validasi gagal, kembalikan ke form dengan error
    if (! $this->validate($rules)) {
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll(); // Ambil semua kategori untuk dropdown

        return view('sarana/tambah', [
            'errors' => $this->validator->getErrors(),
            'data'   => $data, // Menjaga data inputan tetap ada di form
        ]);
    }

    // Jika validasi berhasil, simpan data sarana
    $this->saranaModel->save($data);

    return redirect()->to('/sarana')->with('success', 'Data sarana berhasil ditambahkan.');
}


    public function edit($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $data['sarana'] = $this->saranaModel->find($id);
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll(); // Ambil semua kategori
        return view('sarana/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        if ($this->saranaModel->update($id, $this->request->getPost())) {
            return redirect()->to('/sarana')->with('success', 'Data sarana berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->saranaModel->errors());
        }
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $this->saranaModel->delete($id);
        return redirect()->to('/sarana')->with('success', 'Data sarana berhasil dihapus.');
    }
}
