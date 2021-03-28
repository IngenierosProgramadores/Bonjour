<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/CORSMiddlewares.php';
class Sesion extends CI_Controller{
     
    function __construct(){
        parent::__construct();
    }
    function index () {
        echo "HOLA";
    }
    public function mostrar () {
        echo "HOLA";
    }
}