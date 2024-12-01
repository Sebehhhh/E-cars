<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sarana_id',
        'kursi_id',
        'user_id',
        'tanggal_booking',
        'status_booking',
        'keterangan',
    ];

    public function getBookings()
    {
        return $this->select('booking.*, sarana.nama as sarana_nama, user.nama as user_nama, kursi.nomor_kursi')
                    ->join('sarana', 'sarana.id = booking.sarana_id', 'left')
                    ->join('user', 'user.id = booking.user_id', 'left')
                    ->join('kursi', 'kursi.id = booking.kursi_id', 'left')
                    ->findAll();
    }

    /**
     * Ambil detail booking berdasarkan ID.
     *
     * @param int $id
     * @return array|null
     */
    public function getBookingById($id)
    {
        return $this->select('booking.*, sarana.nama as sarana_nama, user.nama as user_nama, kursi.nomor_kursi')
                    ->join('sarana', 'sarana.id = booking.sarana_id', 'left')
                    ->join('user', 'user.id = booking.user_id', 'left')
                    ->join('kursi', 'kursi.id = booking.kursi_id', 'left')
                    ->where('booking.id', $id)
                    ->first();
    }

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
