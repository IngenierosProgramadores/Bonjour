<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;

class Users extends Controller{

    public function index () {
        $user = new User();
        $data['users'] = $user->orderBy('id','ASC')->findAll();
        echo json_encode($data);
    }

    public function create () {
        
    }
}