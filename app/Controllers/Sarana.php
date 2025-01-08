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
        $kategoriModel = new KategoriModel(); // Model kategori
        $data['kategori'] = $kategoriModel->findAll(); // Ambil semua data kategori untuk dropdown
    
        // Aturan validasi
        $validationRules = [
            'kategori_id' => 'required|integer',
            'nama' => 'required|min_length[3]|max_length[100]',
            'no_pol' => 'required|max_length[15]',
            'kapasitas_kursi' => 'required|integer|greater_than[0]',
            'status' => 'required|in_list[aktif,nonaktif]',
            'keterangan' => 'permit_empty|max_length[255]'
        ];
    
        // Pesan error kustom
        $validationMessages = [
            'kategori_id' => [
                'required' => 'Kategori harus dipilih.',
                'integer' => 'Kategori tidak valid.'
            ],
            'nama' => [
                'required' => 'Nama sarana harus diisi.',
                'min_length' => 'Nama sarana minimal 3 karakter.',
                'max_length' => 'Nama sarana maksimal 100 karakter.'
            ],
            'no_pol' => [
                'required' => 'Nomor Polisi harus diisi.',
                'alpha_numeric' => 'Nomor Polisi hanya boleh berisi huruf dan angka.',
                'max_length' => 'Nomor Polisi maksimal 15 karakter.'
            ],
            'kapasitas_kursi' => [
                'required' => 'Kapasitas kursi harus diisi.',
                'integer' => 'Kapasitas kursi harus berupa angka.',
                'greater_than' => 'Kapasitas kursi harus lebih dari 0.'
            ],
            'status' => [
                'required' => 'Status harus dipilih.',
                'in_list' => 'Status tidak valid.'
            ],
            'keterangan' => [
                'max_length' => 'Keterangan maksimal 255 karakter.'
            ]
        ];
    
        // Validasi input
        if (!$this->validate($validationRules, $validationMessages)) {
            $data['errors'] = $this->validator->getErrors(); // Ambil error validasi
            return view('sarana/tambah', $data); // Kembali ke form dengan pesan error
        }
    
        // Jika validasi berhasil, simpan data
        $saranaModel = new SaranaModel(); // Model sarana
        $saranaModel->save([
            'kategori_id' => $this->request->getPost('kategori_id'),
            'nama' => $this->request->getPost('nama'),
            'no_pol' => $this->request->getPost('no_pol'),
            'kapasitas_kursi' => $this->request->getPost('kapasitas_kursi'),
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);
    
        return redirect()->to('/sarana')->with('success', 'Data sarana berhasil disimpan.'); // Redirect jika sukses
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
