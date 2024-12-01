<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        
        $this->kategoriModel = new KategoriModel();
        
    }

    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        
        $data['kategoris'] = $this->kategoriModel->findAll();
        return view('kategori/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        return view('kategori/tambah');
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
            'deskripsi'  => $this->request->getPost('deskripsi'),
        ];
    
        // Aturan validasi
        $rules = [
            'nama'      => 'required|max_length[255]',  // Nama wajib diisi dan maksimal 255 karakter
            'deskripsi' => 'required|max_length[500]',  // Deskripsi wajib diisi dan maksimal 500 karakter
        ];
    
        // Jika validasi gagal, kembalikan ke form dengan error
        if (! $this->validate($rules)) {
            return view('kategori/tambah', [
                'errors' => $this->validator->getErrors(),
                'data'   => $data, // Menjaga data inputan tetap ada di form
            ]);
        }
    
        // Jika validasi berhasil, simpan data kategori
        $this->kategoriModel->save($data);
    
        return redirect()->to('/kategori-sarana')->with('success', 'Kategori berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $data['kategori'] = $this->kategoriModel->find($id);
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
    
        // Ambil data dari form
        $data = [
            'nama'       => $this->request->getPost('nama'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
        ];
    
        // Aturan validasi
        $rules = [
            'nama'      => 'required|max_length[255]',  // Nama wajib diisi dan maksimal 255 karakter
            'deskripsi' => 'required|max_length[500]',  // Deskripsi wajib diisi dan maksimal 500 karakter
        ];
    
        // Jika validasi gagal, kembalikan ke form dengan error
        if (! $this->validate($rules)) {
            return view('kategori/edit', [
                'errors' => $this->validator->getErrors(),
                'data'   => $data, // Menjaga data inputan tetap ada di form
                'kategori' => $this->kategoriModel->find($id), // Menjaga data kategori lama tetap tampil
            ]);
        }
    
        // Jika validasi berhasil, update data kategori
        $this->kategoriModel->update($id, $data);
    
        return redirect()->to('/kategori-sarana')->with('success', 'Kategori berhasil diperbarui.');
    }
    

    public function delete($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori-sarana');
    }
}
