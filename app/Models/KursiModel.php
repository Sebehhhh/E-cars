<?php

namespace App\Models;

use CodeIgniter\Model;

class KursiModel extends Model
{
    protected $table = 'kursi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sarana_id', 'nomor_kursi', 'status_kursi'];

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

    public function getAvailableSeats($sarana_id)
{
    return $this->where('sarana_id', $sarana_id)
                ->where('status', 'kosong')
                ->findAll();
}

public function getKursiWithSarana()
    {
        return $this->select('kursi.*, sarana.nama as nama_sarana')
                    ->join('sarana', 'sarana.id = kursi.sarana_id', 'left')
                    ->findAll();
    }
}
