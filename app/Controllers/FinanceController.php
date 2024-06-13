<?php

namespace App\Controllers;

use App\Models\PurchaseRequestModel;
use CodeIgniter\Controller;

class FinanceController extends Controller
{
    protected $purchaseRequestModel;

    public function __construct()
    {
        $this->purchaseRequestModel = new PurchaseRequestModel();
    }

    public function index()
    {
        $data['requests'] = $this->purchaseRequestModel->findAll();
        return view('finance/index', $data);
    }

    public function approve($id)
    {
        $data['request'] = $this->purchaseRequestModel->find($id);

        session()->setFlashdata('success', 'Request has been approved.');
        return view('finance/approve', $data);
    }

    public function storeApproval($id)
    {
        $request = $this->request;
        $data = ['status' => 'approved', 'approved_by' => 'finance'];

        if ($file = $request->getFile('proof_of_payment')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                $data['proof_of_payment'] = $newName;
            }
        }

        $this->purchaseRequestModel->update($id, $data);
        return redirect()->to('/finance');
    }

    public function reject($id)
    {
        $data['request'] = $this->purchaseRequestModel->find($id);

        session()->setFlashdata('error', 'Request has been rejected.');
        return view('finance/reject', $data);
    }

    public function storeRejection($id)
    {
        $data = [
            'status' => 'rejected',
            'approved_by' => 'finance',
            'rejection_reason' => $this->request->getPost('reason')
        ];
        $this->purchaseRequestModel->update($id, $data);

        return redirect()->to('/finance');
    }

    public function report()
    {
        return view('report_form');
    }

    public function generateReport()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        $data['requests'] = $this->purchaseRequestModel->getRequestsByDateRange($startDate, $endDate);

        return view('report_view', $data);
    }
}
