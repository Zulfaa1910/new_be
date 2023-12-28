<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRegistrasiTable extends Migration
{
    public function up()
    {
        // Table structure
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'   => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            // Add other fields as needed
        ]);

        // Primary key
        $this->forge->addPrimaryKey('id');

        // Create the table
        $this->forge->createTable('registrasi', true);
    }

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('registrasi', true);
    }
}

