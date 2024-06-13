<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchaseRequestsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'item_name'   => ['type' => 'VARCHAR', 'constraint' => '255'],
            'quantity'    => ['type' => 'INT'],
            'status'      => ['type' => 'ENUM("pending","approved","rejected","completed")', 'default' => 'pending'],
            'reason'      => ['type' => 'TEXT', 'null' => true],
            'proof'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'officer_id'  => ['type' => 'INT', 'unsigned' => true],
            'manager_id'  => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'finance_id'  => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'created_at'  => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'  => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('officer_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('manager_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('finance_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('purchase_requests');
    }

    public function down()
    {
        $this->forge->dropTable('purchase_requests');
    }
}
