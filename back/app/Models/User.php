<?php 
namespace App\Models;

use CodeIgniter\Model;

class User extends Model{
    protected $table      = 'users';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','surname','email','birthdate','password','country','gender'];
}