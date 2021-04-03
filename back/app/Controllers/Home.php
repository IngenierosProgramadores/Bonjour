<?php

namespace App\Controllers;

class Home extends AuthController
{
	protected $model;

	public function __construct () {
		$this->model = new UserModel();
	}
	public function index()
	{
		return view('welcome_message');
	}
	public function hello () {
		$saludo = $this->request->getPost('saludo');
		echo $saludo;
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
	public function getUsers () {
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
