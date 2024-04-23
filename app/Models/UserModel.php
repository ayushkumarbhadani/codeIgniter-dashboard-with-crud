<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'email', 'password', 'role', 'created_at', 'is_active'];


    protected $dateFormat = 'datetime';

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect('default'); // Use the default connection
    }
}
