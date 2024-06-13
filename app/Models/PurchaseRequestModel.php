<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseRequestModel extends UserModel
{
    protected $primaryKey = 'id';
    protected $table = 'purchase_requests';
    protected $allowedFields = [
        'user_id', 'item_name', 'quantity', 'status',
        'unit_price', 'total_price', 'proof_of_payment', 'approved_by', 'rejection_reason'
    ];

    public function getRequestsByDateRange($startDate, $endDate)
    {
        return $this->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->findAll();
    }

    protected $useTimestamps = true;
}
