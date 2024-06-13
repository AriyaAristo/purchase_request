<?php

namespace App\Controllers;

use App\Models\PurchaseRequestModel;
use CodeIgniter\Controller;

class ManagerController extends Controller
{
    public function index()
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data['requests'] = $purchaseRequestModel->where('status', 'pending')->findAll();
        return view('manager/index', $data);
    }

    public function approve($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data = [
            'status' => 'approved',
            'approved_by' => 'manager'
        ];

        session()->setFlashdata('success', 'Request has been approved.');
        $purchaseRequestModel->update($id, $data);

        return redirect()->to('/manager');
    }

    public function reject($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data['request'] = $purchaseRequestModel->find($id);

        session()->setFlashdata('error', 'Request has been rejected.');
        return view('manager/reject', $data);
    }

    public function storeRejection($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data = [
            'status' => 'rejected',
            'approved_by' => 'manager',
            'rejection_reason' => $this->request->getPost('reason')
        ];
        $purchaseRequestModel->update($id, $data);

        return redirect()->to('/manager');
    }

    public function approvedRequests()
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data['requests'] = $purchaseRequestModel->where('status', 'approved')->findAll();
        return view('manager/approved_requests', $data);
    }
}
