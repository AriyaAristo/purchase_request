<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('dashboard');
    }
}
