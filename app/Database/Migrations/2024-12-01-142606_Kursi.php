<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kursi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'sarana_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'nomor_kursi'=> [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'status_kursi' => [
                'type'    => 'ENUM',
                'constraint' => ['kosong', 'terisi'],
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('sarana_id', 'sarana', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kursi');
    }

    public function down()
    {
        $this->forge->dropTable('kursi');
    }
}
