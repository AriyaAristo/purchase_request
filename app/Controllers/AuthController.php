<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            $pass = $user['password'];
            $auth = password_verify($password, $pass);
            if ($auth) {
                $ses_data = [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'role'     => $user['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                // Redirect based on role
                switch ($user['role']) {
                    case 'officer':
                        return redirect()->to('/officer');
                    case 'manager':
                        return redirect()->to('/manager');
                    case 'finance':
                        return redirect()->to('/finance');
                    default:
                        return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getVar('role')
        ];

        $userModel->insert($data);
        return redirect()->to('/login');
    }
}
