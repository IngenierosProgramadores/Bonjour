<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH.'controllers/CORSMiddlewares.php';
$cors = new CORSMiddlewares();
$cors->permisos();
class User extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        // Se carga el user_model y se le asigna el nombre de user para hacer uso de el
        $this->load->model('user_model','user');
         
       
    }
    public function index(){
    }
    // Metodos a utilizar 
     function showAll(){
         
       $query=  $this->user->showAll();
             if($query){
                   $result['users']  = $this->user->showAll();
             }
            echo json_encode($result['users']);
    }
     function addUser(){
		$config = array(
        array('field' => 'name',
              'label' => 'Name',
              'rules' => 'trim|required'
             ),
             array('field' => 'surname',
              'label' => 'Surname',
              'rules' => 'trim|required'
             ),
             array('field' => 'email',
              'label' => 'Email',
              'rules' => 'required'
             ),
             array('field' => 'birthdate',
              'label' => 'Birthdate',
              'rules' => 'trim|required'
             ),
             array('field' => 'country',
              'label' => 'Country',
              'rules' => 'trim|required'
             ),
               array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
               ),
            array(
                    'field' => 'gender',
                    'label' => 'Gender',
                    'rules' => 'trim|required'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim|required'
        )
);
$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = false;
            $result['msg'] = array(
                'name'=>form_error('name'),
                'surname'=>form_error('surname'),
                'gender'=>form_error('gender'),
                'birthday'=>form_error('birthday'),
                'email'=>form_error('email'),
                'password'=>form_error('password'),
                'phone'=>form_error('phone'),
                'country'=>form_error('country')
            );
            
        }else{
                $data = array(
                'name'=> $this->input->post('name'),
                'surname'=> $this->input->post('surname'),
                'gender'=> $this->input->post('gender'),
                'birthdate'=> $this->input->post('birthdate'),
                'email'=> $this->input->post('email'),
                'password'=> $this->input->post('password'),
                'country'=> $this->input->post('country'),
                'phone'=> $this->input->post('phone')
                
            );
            if($this->user->addUser($data)){
               $result['error'] = true;
                $result['msg'] ='Usuario registrado correctamente';
            }
        }
        echo json_encode($result);
    }

     function updateUser(){		
         $config = array(
        array('field' => 'firstname',
              'label' => 'Firstname',
              'rules' => 'trim|required'
             ),
             array('field' => 'lastname',
              'label' => 'Lastname',
              'rules' => 'trim|required'
             ),
             array('field' => 'gender',
              'label' => 'Gender',
              'rules' => 'required'
             ),
             array('field' => 'birthdate',
              'label' => 'Birthdate',
              'rules' => 'trim|required'
             ),
             array('field' => 'email',
              'label' => 'Email',
              'rules' => 'trim|required'
             ),
               array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'trim|required'
               ),
        array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required'
        )
);
$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                 'firstname'=>form_error('firstname'),
                'lastname'=>form_error('lastname'),
                'gender'=>form_error('gender'),
                'birthdate'=>form_error('birthdate'),
                'email'=>form_error('email'),
                'contact'=>form_error('contact'),
                'address'=>form_error('address')
            );
            
        }else{
          $id = $this->input->post('id');
          $data = array(
                   'firstname'=> $this->input->post('firstname'),
                'lastname'=> $this->input->post('lastname'),
                'gender'=> $this->input->post('gender'),
                'birthdate'=> $this->input->post('birthdate'),
                'email'=> $this->input->post('email'),
                'contact'=> $this->input->post('contact'),
                'address'=> $this->input->post('address')
            );
                if($this->user->updateUser($id,$data)){
                    $result['error'] = false;
                    $result['success'] = 'User updated successfully';
                }
       
    }
          echo json_encode($result);
     }
    function deleteUser(){
         $id = $this->input->post('id');
        if($this->user->deleteUser($id)){
             $msg['error'] = false;
            $msg['success'] = 'User deleted successfully';
        }else{
             $msg['error'] = true;
        }
        echo json_encode($msg);
         
    }
       function searchUser(){
         $value = $this->input->post('text');
          $query =  $this->user->searchUser($value);
           if($query){
               $result['users']= $query;
           }
           
        echo json_encode($result);
         
    }
}
    
