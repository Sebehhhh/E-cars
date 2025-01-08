<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('pengguna/index', $data);
    }

    public function tambah()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }  // Cek apakah pengguna sudah login dan memiliki role admin
        return view('pengguna/tambah');
    }

    public function simpan()
    {
        // Memeriksa apakah pengguna sudah login dan memiliki role admin
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
    
        // Ambil model UserModel
        $model = new UserModel();
    
        // Ambil data dari form
        $data = [
            'nrp'     => $this->request->getPost('nrp'),
            'nama'    => $this->request->getPost('nama'),
            // 'role'    => $this->request->getPost('role'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kontak'  => $this->request->getPost('kontak'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
    
        // Validasi data
        $rules = [
            'nrp'     => 'required|is_unique[user.nrp]',
            'nama'    => 'required|max_length[255]',
            // 'role'    => 'required|in_list[admin,karyawan]',
            'jabatan' => 'required|max_length[255]',
            'kontak'  => 'required|max_length[255]',
            'password' => 'required|min_length[6]', // Minimal panjang password
        ];
    
        // Jika validasi gagal, kembalikan ke form dengan error
        if (! $this->validate($rules)) {
            return view('pengguna/tambah', [
                'errors' => $this->validator->getErrors(),
                'data' => $data, // Menjaga data inputan tetap ada di form
            ]);
        }
    
        // Jika validasi berhasil, simpan data pengguna
        $model->save($data);
    
        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->to('/pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }  // Cek apakah pengguna sudah login dan memiliki role admin
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('pengguna/edit', $data);
    }
    public function update($id)
    {
        // Memeriksa apakah pengguna sudah login dan memiliki role admin
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }
    
        // Ambil model UserModel
        $model = new UserModel();
    
        // Ambil data pengguna yang akan diperbarui
        $user = $model->find($id);
        if (!$user) {
            // Jika pengguna tidak ditemukan
            return redirect()->to('/pengguna')->with('error', 'Pengguna tidak ditemukan.');
        }
    
        // Ambil data dari form
        $data = [
            'nrp'     => $this->request->getPost('nrp'),
            'nama'    => $this->request->getPost('nama'),
            // 'role'    => $this->request->getPost('role'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kontak'  => $this->request->getPost('kontak'),
        ];
    
        $rules = [
            'nrp'     => 'required|is_unique[user.nrp,id,' . $id . ']', // Memastikan NRP unik kecuali untuk yang sedang diedit
            'nama'    => 'required|max_length[255]',
            // 'role'    => 'required|in_list[admin,karyawan]',
            'jabatan' => 'required|max_length[255]',
            'kontak'  => 'required|max_length[255]',
        ];
        

    
        // Jika validasi gagal, kembalikan ke form dengan error
        if (! $this->validate($rules)) {
            return view('pengguna/edit', [
                'errors' => $this->validator->getErrors(),
                'data'   => $data, // Menjaga data inputan tetap ada di form
                'user'   => $user, // Menjaga data pengguna lama tetap tampil
            ]);
        }
    
        // Jika password diisi, tambahkan password baru
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }
    
        // Update data pengguna
        $model->update($id, $data);
    
        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->to('/pengguna')->with('success', 'Pengguna berhasil diperbarui.');
    }
    

    public function hapus($id)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->to('/'); // Ganti '/auth/login' dengan URL login Anda
        }  // Cek apakah pengguna sudah login dan memiliki role admin
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
