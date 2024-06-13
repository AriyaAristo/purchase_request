<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddApprovedByToPurchaseRequests extends Migration
{
    public function up()
    {
        $this->forge->addColumn('purchase_requests', [
            'approved_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('purchase_requests', 'approved_by');
    }
}
