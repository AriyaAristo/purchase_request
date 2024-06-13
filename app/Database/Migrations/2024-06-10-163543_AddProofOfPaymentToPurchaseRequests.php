<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProofOfPaymentToPurchaseRequests extends Migration
{
    public function up()
    {
        $this->forge->addColumn('purchase_requests', [
            'proof_of_payment' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('purchase_requests', 'proof_of_payment');
    }
}
