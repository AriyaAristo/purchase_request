<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUnitAndTotalPriceToPurchaseRequests extends Migration
{
    public function up()
    {
        $fields = [
            'unit_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
        ];
        $this->forge->addColumn('purchase_requests', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('purchase_requests', ['unit_price', 'total_price']);
    }
}
