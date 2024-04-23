<?php

namespace App\Controllers;

use App\Models\UserModel;

date_default_timezone_set('Asia/Kolkata');

class Auth extends BaseController
{
    public function register()
    {
        $model = new UserModel();
        if ($this->request->getMethod() === 'POST') {
            $validationRules = [
                'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[3]|max_length[255]'
            ];

            if ($this->validate($validationRules)) {
                $model->save([
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'role' => 'user', // Set default role for new users
                    'created_at' => date('Y-m-d H:i:s'), // Set current timestamp for created_at
                    'is_active' => 1, // Set default value for is_active
                ]);
                session()->setFlashdata('success', 'Registration successful');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', $this->validator->listErrors());
            }
        }

        return view('register');
    }

    public function login()
    {
        $model = new UserModel();
        if ($this->request->getMethod() === 'POST') {
            $validationRules = [
                'email' => 'required|valid_email',
                'password' => 'required'
            ];

            if ($this->validate($validationRules)) {
                $user = $model->where('email', $this->request->getVar('email'))->first();

                if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
                    session()->set('isLoggedIn', true);
                    session()->set('userData', $user);
                    return redirect()->to('/dashboard');
                } else {
                    session()->setFlashdata('error', 'Invalid email or password');
                }
            } else {
                session()->setFlashdata('error', $this->validator->listErrors());
            }
        }

        return view('login');
    }
    public function logout()
    {
        // Destroy session
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/');
    }
}
