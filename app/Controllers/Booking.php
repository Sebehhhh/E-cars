<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\SaranaModel;
use App\Models\KursiModel;
use App\Models\UserModel;

class Booking extends BaseController
{
    protected $bookingModel;
    protected $saranaModel;
    protected $kursiModel;
    protected $userModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->saranaModel = new SaranaModel();
        $this->kursiModel = new KursiModel();
        $this->userModel = new UserModel();
    }

    public function getKursi($saranaId)
{
    // Ambil kursi dengan status kosong
    $kursi = $this->kursiModel
                  ->where('sarana_id', $saranaId)
                  ->where('status_kursi', 'kosong')
                  ->findAll();

    return $this->response->setJSON($kursi);
}
public function batal($id)
{
    // Ambil data booking
    $booking = $this->bookingModel->find($id);

    if ($booking) {
        // Ubah status booking menjadi dibatalkan
        $this->bookingModel->update($id, ['status_booking' => 'dibatalkan']);

        // Ubah status kursi kembali menjadi kosong
        $this->kursiModel->update($booking['kursi_id'], ['status_kursi' => 'kosong']);

        return redirect()->to(base_url('booking'))->with('success', 'Booking berhasil dibatalkan.');
    }

    return redirect()->to(base_url('booking'))->with('error', 'Data booking tidak ditemukan.');
}

public function selesai($id)
{
    // Ambil data booking
    $booking = $this->bookingModel->find($id);

    if ($booking) {
        // Ubah status booking menjadi selesai
        $this->bookingModel->update($id, ['status_booking' => 'selesai']);

        return redirect()->to(base_url('booking'))->with('success', 'Booking berhasil ditandai selesai.');
    }

    return redirect()->to(base_url('booking'))->with('error', 'Data booking tidak ditemukan.');
}


    /**
     * Menampilkan daftar booking.
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Booking',
            'bookings' => $this->bookingModel->getBookings(),
        ];

        return view('booking/index', $data);
    }

    /**
     * Form untuk menambahkan booking baru.
     */
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Booking',
            'sarana' => $this->saranaModel->findAll(),
            'users' => $this->userModel->findAll(),
        ];

        return view('booking/tambah', $data);
    }

    /**
     * Menyimpan booking baru.
     */
    public function simpan()
{
    $saranaId = $this->request->getPost('sarana_id');
    $kursiId = $this->request->getPost('kursi_id');

    // Data booking
    $data = [
        'sarana_id' => $saranaId,
        'kursi_id' => $kursiId,
        'user_id' => session('user_id'), // Ambil user dari sesi
        'tanggal_booking' => $this->request->getPost('tanggal_booking'),
        'status_booking' => 'aktif',
        'keterangan' => $this->request->getPost('keterangan'),
    ];

    // Simpan booking
    $this->bookingModel->insert($data);

    // Perbarui status kursi menjadi terisi
    $this->kursiModel->update($kursiId, ['status_kursi' => 'terisi']);

    return redirect()->to(base_url('booking'))->with('success', 'Booking berhasil ditambahkan.');
}

    
}