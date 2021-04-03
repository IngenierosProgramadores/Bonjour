<?php

namespace App\Controllers;
use Config\Services;
use App\Models\User;

class UsersController extends AuthController
{
    public $content = ['result' => false, 'message' => ['title' => 'Error!', 'content' => 'Internal Server Error.']];

	protected $model;

	public function __construct () {
		$auth = new Auth();
		$auth->permisos();
	}
	public function index()
	{

	}
    public function profile(){
        //$db = \Config\Database::connect();
		$user = new User();
        $auth = new Auth();
		$auth->permisos();
        $content = $this->content;
        $validUser = $auth->getUserData(Services::getSecretKey());

        $content['user'] = null;

        if ($validUser !== null) {
            $query = $user->query("SELECT id, name, email FROM users WHERE id = ".$validUser->id."");
            $user = $query->getRowArray();
            if($user){
                $content['user']['id'] = $user['id'];
                $content['user']['name'] = $user['name'];
                $content['user']['email'] = $user['email'];
                $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/public/assets/uploads/profile/';
                $content['result'] = true;
            }
        } else {
            $content['message'] = "El usuario no existe.";
        }
        return $this->respond($content);
    }

	public function getUsers () {
		$user = new User();
		$auth = new Auth();
		$auth->permisos();
        $data['users'] = $user->orderBy('id','ASC')->findAll();
        return $this->respond($data);
	}
	public function getUser ($id) {
		$user = new User();
        $data = $user->where('id',$id)->first();
        return $this->respond($data);
	}
	public function create () {
		$content['user'] = null;
		$auth = new Auth();
		$auth->permisos();
		$request = $this->request->getPost();
		//$user = new User();
		$data = [
			'name' => $request['name'],
			'surname' => $request['surname'],
			'email' => $request['email'],
			'birthdate' => $request['birthdate'],
			'password' => password_hash($request['password'], PASSWORD_BCRYPT, ['cost' => 10]),
			'country' => $request['country'],
			'gender' => $request['email']
		];
		$model = new User();
		if ($model->insert($data)){
			$content['result'] = true;
			$content['message'] = 'El usuario se ha creado exitosamente';
		} else {
			$content['result'] = false;
			$content['message'] = 'Ha ocurrido un error al intentar crear el usuario';
		}
		return $this->respond($content);
	}
	public function insertar () {
		$token = $this->request->getHeader('Authorization')->getValue();
		if($this->validateToken($token)){
			$data = [
				'titulo' => $this->request->getPost('titulo'),
				'descripcion' => $this->request->getPost('descripcion')
			];
			$this->model->insert($data);
			return $this->respond(['data' => 'creado'], 200);
		} else {
			return $this->respond(['message' => 'Token Invalido'], 401);
		}
	}
	public function getUsers_2 () {
		if ($this->request->getHeader('Authorization')->getValue() != null) {
			
		}else {
			$token =  "";
		}
		$token = ($this->request->getHeader('Authorization')->getValue() != null) ? $this->request->getHeader('Authorization')->getValue() : "";

		if ($this->validateToken($token)) {
			return $this->respond($this->model->findAll());
		}else {
			return $this->respond(['message' => 'Token Invalido'], 401);
		}
	}
	public function eliminar () {
		$id = $this->request->getPost('id');
		$res = $this->model->delete($id);
		echo json_encode('msg' -> $rest);
	}
	public function buscar () {
		$id = $this->request->getPost('id');
		echo json_encode($this->model->find($id));
	}
	public function editar () {
		$id = $this->request->getPost('id');
		$data = [
			'titulo' => $this->request->getPost('titulo'),
			'descripcion' => $this->request->getPost('descripcion')
		];
		$res = $this->model->update($id, $data);
		echo json_encode('msg' -> $res);
	}
}
