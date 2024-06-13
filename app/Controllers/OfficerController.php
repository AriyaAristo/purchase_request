<?php

namespace App\Controllers;

use App\Models\PurchaseRequestModel;
use CodeIgniter\Controller;

class OfficerController extends Controller
{
    public function index()
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data['requests'] = $purchaseRequestModel->findAll();
        return view('officer/index', $data);
    }

    public function dashboard()
    {
        $model = new PurchaseRequestModel();

        $approvedByManager = $model->where(['status' => 'approved', 'approved_by' => 'manager'])->countAllResults();
        $rejectedByManager = $model->where(['status' => 'rejected', 'approved_by' => 'manager'])->countAllResults();
        $approvedByFinance = $model->where(['status' => 'approved', 'approved_by' => 'finance'])->countAllResults();
        $rejectedByFinance = $model->where(['status' => 'rejected', 'approved_by' => 'finance'])->countAllResults();

        return view('officer/dashboard', [
            'approvedByManager' => $approvedByManager,
            'rejectedByManager' => $rejectedByManager,
            'approvedByFinance' => $approvedByFinance,
            'rejectedByFinance' => $rejectedByFinance
        ]);
    }

    public function create()
    {
        return view('officer/create');
    }

    public function store()
    {
        $purchaseRequestModel = new PurchaseRequestModel();

        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity'),
            'unit_price' => $this->request->getPost('unit_price'),
            'total_price' => $this->request->getPost('quantity') * $this->request->getPost('unit_price'),
            'status' => 'pending',
            'approved_by' => null,
            'proof_of_payment' => null,
        ];

        $session = session();
        $session->setFlashdata('success', 'Purchase request has been created successfully.');

        $purchaseRequestModel->save($data);

        return redirect()->to('/officer');
    }

    public function edit($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data['request'] = $purchaseRequestModel->find($id);
        return view('officer/edit', $data);
    }

    public function update($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();

        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'quantity' => $this->request->getPost('quantity'),
            'unit_price' => $this->request->getPost('unit_price'),
            'total_price' => $this->request->getPost('quantity') * $this->request->getPost('unit_price'),
        ];
        $session = session();
        $session->setFlashdata('success', 'Purchase request has been updated successfully.');
        $purchaseRequestModel->update($id, $data);

        return redirect()->to('/officer');
    }

    public function handleReject()
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $id = $this->request->getPost('id');
        $comment = $this->request->getPost('comment');

        $data = [
            'status' => 'rejected',
            'approved_by' => $this->session->get('user_role'), // Assuming you store the role in session
            'rejection_reason' => $comment,
        ];

        $purchaseRequestModel->update($id, $data);

        return redirect()->to('/officer');
    }

    public function delete($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $purchaseRequestModel->delete($id);
        return redirect()->to('/officer');
    }
}
