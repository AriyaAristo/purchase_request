<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRejectionReasonToPurchaseRequests extends Migration
{
    public function up()
    {
        $this->forge->addColumn('purchase_requests', [
            'rejection_reason' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('purchase_requests', 'rejection_reason');
    }
}
