<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sarana extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kategori_id'   => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'nama'   => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_pol'        => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true,
            ],
            'kapasitas_kursi'=> [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'status' => [
                'type'    => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
            ],
            'keterangan'    => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sarana');
    }

    public function down()
    {
        $this->forge->dropTable('sarana');
    }
}
