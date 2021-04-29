<?php 
namespace App\Models;

use CodeIgniter\Model;

class Courses extends Model{
    protected $table      = 'courses';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = []; // Esto contiene los atributos de la tablade cursos
}