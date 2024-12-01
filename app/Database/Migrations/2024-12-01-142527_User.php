<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nrp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true,
                'null'       => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'role' => [
                'type'    => 'ENUM',
                'constraint' => ['karyawan', 'admin'],
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'kontak' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'password' => [ // Menambahkan kolom password
                'type' => 'VARCHAR',
                'constraint' => '255', // Panjang maksimal untuk password hash
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
