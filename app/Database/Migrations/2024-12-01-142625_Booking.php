<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'sarana_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'kursi_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'tanggal_booking' => [
                'type' => 'DATETIME',
            ],
            'status_booking' => [
                'type'    => 'ENUM',
                'constraint' => ['aktif', 'dibatalkan', 'selesai'],
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('sarana_id', 'sarana', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kursi_id', 'kursi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('booking');
    }

    public function down()
    {
        $this->forge->dropTable('booking');
    }
}
