<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        // Data yang akan dimasukkan ke dalam tabel user
        $data = [
            [
                'nrp'       => '2200220022',
                'nama'      => 'John Doe',
                'role'      => 'admin',
                'jabatan'   => 'Manager',
                'kontak'    => '081234567890',
                'password'  => password_hash('password', PASSWORD_DEFAULT) // Password di-hash
            ]
        ];

        // Menyimpan data ke dalam tabel user
        foreach ($data as $user) {
            $this->db->table('user')->insert($user);
        }
    }
}
