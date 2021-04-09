<?php

namespace App\Controllers;
use Config\Services;
use App\Models\User;

class UsersController extends AuthController
{
    public $content = ['result' => false, 'message' => ['title' => 'Error!', 'content' => 'Internal Server Error.']];

	// protected $model;

	public function __construct () {
		$auth = new Auth();
		$auth->permisos();
	}
	public function index()
	{
		echo "HOLA";
	}
	public function updateUser ($id) {
		// $request = \Config\Services::request();
		$request = $this->request->getPost();
		$data = [
			'name' => $request['name'],
			'surname' => $request['surname'],
			'email' => $request['email'],
			'birthdate' => $request['birthdate'],
			'country' => $request['country'],
			'gender' => $request['email']
		];
		$model = new User();
		if ($model->update($id, $data)){
			$content['result'] = true;
			$content['message'] = 'El usuario se ha actualizado exitosamente';
		} else {
			$content['result'] = false;
			$content['message'] = 'Ha ocurrido un error al intentar crear el usuario';
		}
		// return $this->respond($content); // el respond es para retornar los datos
	}

	public function uploadPhoto (){
		$request = $this->request->getPost();
		$user = new User();
		$db      = \Config\Database::connect();
		$builder = $db->table('users');
        // $query = $user->query("SELECT id, name,img FROM users WHERE id=".$request['id'].";");
		// $data = $query->getRowArray();
		$upload_dir1 = $_SERVER["DOCUMENT_ROOT"] . '/Bonjour/back/public/assets/profiles/'; //Directorio de carga
		$img1 = null;
		$fullpath1 = '';
		$validate = '';
		$file = $this->request->getFile('imagen');
		if (!is_dir($upload_dir1))  {
			mkdir($upload_dir1, 0777, true);
		}
		$defaultkey1='perfil_'.$request['id'];//Nombre con el que se va a guardar el archivo
		// if (file_exists($data['img'])) {
		// 	unlink($data['img']);
		// }
		$fullPath1 = 'assets/profiles/perfil_'.$request['id'].'.png';
		$file->move($upload_dir1);
		$data = [
			'img' => $fullPath1,
		];
		$builder->where('id', $request['id']);
		$builder->update($data);

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

        $query = $user->query("SELECT *, DATE_FORMAT(birthdate, '%w/%m/%y') as birthdate FROM users WHERE id=".$id.";");
		$data = $query->getRowArray();
        return $this->respond($data);
	}

	public function create () {
		$content['user'] = null;
		// Auth es un controlador que se manda a llamar para invocar los permisos de CORS
		$request = $this->request->getPost();
		//$user = new User();

		// Los de la izquierda son los atributos de la base de datos
		// => $request es un arreglo y ['dato'] 
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
		// $model ya es el modelo   y ->insert($data) es un metodo de CI para insertar datos a la BD
		if ($model->insert($data)){
			$content['result'] = true;
			$content['message'] = 'El usuario se ha creado exitosamente';
		} else {
			$content['result'] = false;
			$content['message'] = 'Ha ocurrido un error al intentar crear el usuario';
		}
		return $this->respond($content); // el respond es para retornar los datos
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





	// public function getUsers_2 () {
	// 	if ($this->request->getHeader('Authorization')->getValue() != null) {
			
	// 	}else {
	// 		$token =  "";
	// 	}
	// 	$token = ($this->request->getHeader('Authorization')->getValue() != null) ? $this->request->getHeader('Authorization')->getValue() : "";

	// 	if ($this->validateToken($token)) {
	// 		return $this->respond($this->model->findAll());
	// 	}else {
	// 		return $this->respond(['message' => 'Token Invalido'], 401);
	// 	}
	// }
	// public function eliminar () {
	// 	$id = $this->request->getPost('id');
	// 	$res = $this->model->delete($id);
	// 	echo json_encode('msg' -> $rest);
	// }
	// public function buscar () {
	// 	$id = $this->request->getPost('id');
	// 	echo json_encode($this->model->find($id));
	// }
	// public function editar () {
	// 	$id = $this->request->getPost('id');
	// 	$data = [
	// 		'titulo' => $this->request->getPost('titulo'),
	// 		'descripcion' => $this->request->getPost('descripcion')
	// 	];
	// 	$res = $this->model->update($id, $data);
	// 	echo json_encode('msg' -> $res);
	// }
}
