<?php

namespace App\Controllers;

use App\Models\PurchaseRequestModel;
use CodeIgniter\Controller;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $data['requests'] = $purchaseRequestModel->findAll();

        return view('officer/index', $data);
    }


    public function view($id)
    {
        $requestModel = new \App\Models\PurchaseRequestModel();
        $request = $requestModel->find($id);

        if (!$request) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Request with ID $id not found");
        }

        return view('view_request', ['request' => $request]);
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
            'rejection_reason' => null,
        ];

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
            'status' => 'pending', // Reset status to pending when resubmitted
            'approved_by' => null,
            'rejection_reason' => null,
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

    public function approve($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $purchaseRequestModel->update($id, [
            'status' => 'approved',
            'manager_comment' => $this->request->getPost('manager_comment')
        ]);
        return redirect()->to('/manager-requests');
    }

    public function reject($id)
    {
        $purchaseRequestModel = new PurchaseRequestModel();
        $purchaseRequestModel->update($id, [
            'status' => 'rejected',
            'manager_comment' => $this->request->getPost('manager_comment')
        ]);
        return redirect()->to('/manager-requests');
    }

    public function report()
    {
        $model = new RequestModel();

        $startDate = $this->request->getGet('start_date');
        $endDate = $this->request->getGet('end_date');

        if ($startDate && $endDate) {
            $requests = $model->where('created_at >=', $startDate)
                ->where('created_at <=', $endDate)
                ->paginate(10);
            $pager = $model->pager;
        } else {
            $requests = [];
            $pager = null;
        }

        return view('purchase_request/report', [
            'requests' => $requests,
            'pager' => $pager
        ]);
    }

    public function downloadProof($filename)
    {
        $filepath = WRITEPATH . 'uploads/' . $filename;

        if (file_exists($filepath)) {
            return $this->response->download($filepath, null)->setFileName($filename);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
