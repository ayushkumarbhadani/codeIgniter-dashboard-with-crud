<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        //get the sorting parameters
        $sortBy = $this->request->getGet('sortBy');
        $sortOrder = $this->request->getGet('sortOrder');
        $search = $this->request->getGet('search');

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        // Retrieve the current user's role from the session
        $role = session()->get('userData')['role'];
        // Create an instance of the UserModel
        $userModel = new UserModel();

        if ($role === 'admin') {
            // Sort users if sortBy parameter is provided
            if ($sortBy) {
                if ($sortOrder === 'desc') {
                    // Descending order
                    $users = $userModel->orderBy($sortBy, 'DESC')->findAll();
                } else {
                    // Ascending order
                    $users = $userModel->orderBy($sortBy)->findAll();
                }
            }else{
                // If the user is an admin and sort condition is not provided then fetch all user details
                $users = $userModel->findAll();
            }

            if($search){
                $users = $userModel->like('username', $search)->findAll();
            }

            
        } else {
            // If the user is not an admin, fetch details of the current user
            $userId = session()->get('userData')['id'];
            $user = $userModel->find($userId);
            // Set $users as an array containing the single user
            $users = [$user];
        }


        // Pass user data to the view
        $data['users'] = $users;
        $data['sortBy'] = $sortBy;
        $data['sortOrder'] = $sortOrder;
        $data['search'] = $search;
        $data['user'] = session()->get('userData');

        // Load the dashboard view with user data
        return view('dashboard', $data);
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        if(session()->get('userData')['role']!=="admin"){
            return redirect()->to('/dashboard');
        }

       // Process form submission if it's a POST request
        if ($this->request->getMethod() === 'POST') {
            
            // Validation rules
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|valid_email',
                'role' => 'required'
            ];
            if ($this->validate($rules)) {
                // Retrieve form data
                $userData = [
                    // Retrieve form fields and their values
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role')
                ];

                // Update user detail in the database
                $userModel = new UserModel();
                $userModel->update($id, $userData);

                session()->setFlashdata('success', 'User details updated successfully');
                return redirect()->to('/dashboard');
            }
        }
        
        // Fetch user details from the database for editing
        if ($this->request->getMethod() === 'GET') {
            // Retrieve user details from the database
            $userModel = new UserModel();
            $user = $userModel->find($id);

            // Check if user exists
            if (!$user) {
                session()->setFlashdata('error', 'User not found');
                return redirect()->to('/edit');
            }

            // Pass user data to the view
            $data['user'] = $user;
        }
        // Load the edit view with user data
        return view('edit', $data);
    }
    public function blockUser($id, $action)
    {
        // Check if the user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('userData')['role'] !== 'admin') {
            // If not logged in or not an admin, redirect to home page or show error
            return redirect()->to('/');
        }

        // Create an instance of the UserModel
        $userModel = new UserModel();

        // Check if the user exists
        $user = $userModel->find($id);
        if (!$user) {
            // If the user doesn't exist, show error or redirect to appropriate page
            session()->setFlashdata('error', 'Error: User not found!');
            return redirect()->to('/dashboard');
        }

        // Block the user (Update user's is_active status)
        if($action === 'block' && $userModel->update($id, ['is_active' => 0])){
            session()->setFlashdata('success', 'User blocked successfully');
        }else if($action === 'unblock' && $userModel->update($id, ['is_active' => 1])){
            session()->setFlashdata('success', 'User unblocked successfully');
        }

        // Redirect to dashboard or appropriate page
        return redirect()->to('/dashboard');
    }


    public function deleteUser($id)
    {
        // Check if the user is logged in and is an admin
        if (!session()->get('isLoggedIn') || session()->get('userData')['role'] !== 'admin') {
            // If not logged in or not an admin, redirect to home page or show error
            return redirect()->to('/');
        }

        // Create an instance of the UserModel
        $userModel = new UserModel();

        // Check if the user exists
        $user = $userModel->find($id);
        if (!$user) {
            // If the user doesn't exist, show error or redirect to appropriate page
            session()->setFlashdata('error', 'Error: User not found!');
            return redirect()->to('/dashboard');
        }

        // Delete the user
        if($userModel->delete($id)){
            session()->setFlashdata('success', 'User deleted successfully');
        }

        // Redirect to dashboard or appropriate page
        return redirect()->to('/dashboard');
    }
}
