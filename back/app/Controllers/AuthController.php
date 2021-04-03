<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\HTTP\IncomingRequest;

class AuthController extends ResourceController
{

	protected $format = 'json';
	public $content = ['result' => false, 'message' => ['title' => 'Error!', 'content' => 'Internal Server Error.']];
	public function login () {
		$obj = new Auth();
		$obj->permisos();
		$request2 = service('request');
		try {
			$request = $this->request->getPost();
			 $email = $this->request->getPost('email');
			 $password = $this->request->getPost('password');
			// var_dump($request);
			if (isset($email) && isset($password)) {
				sleep(0.5);
				$userId = $obj->getUserId($email, $password);

				if ($userId > -1) {
					$data = ['id' => $userId];
					$jwt = $obj->createToken($request2->getServer('HTTP_HOST'),$data, Services::getSecretKey());
					$this->content['jwt'] = $jwt;
					$this->content['result'] = true;
					
				} else {
					$this->content['message']['content'] = 'El correo electrónico o la contraseña no coinciden con ningún usuario.';
				}
			} else {
				$this->content['message'] = 'Por favor escriba la cuenta de correo electrónico y contraseña.';
			}
		} catch (\Exception $e) {

		}
		
		return $this->respond($this->content);
	}
	public function create()
	{
		/**
		 * JWT claim types
		 * https://auth0.com/docs/tokens/concepts/jwt-claims#reserved-claims
		 */

		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		
		// add code to fetch through db and check they are valid
		// sending no email and password also works here because both are empty
		if ($email  === "edgar@ant.com.mx" && $password === "ingepro123") {
            $time = time();
			$key = Services::getSecretKey();
			$payload = [
                'iat' => $time,
                'exp' => $time + 60, // Hora de expiracion en segundos
                'data' => ['email' => 'admin@admin.com', 'name'=>'Peter'],
				// 'aud' => 'http://example.com',
				// 'iat' => 1356999524,
				// 'nbf' => 1357000000,
			];

			/**
			 * IMPORTANT:
			 * You must specify supported algorithms for your application. See
			 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
			 * for a list of spec-compliant algorithms.
			 */
			$jwt = JWT::encode($payload, $key);
			return $this->respond(['token' => $jwt], 200);
		}

		return $this->respond(['message' => 'Invalid login details'], 401);
	}
    public function validateToken($token) {
        try {
            $key = Services::getSecretKey();
            return JWT::decode($token, $key, array('HS256'));
        } catch (\Exception $e) {
            return false;
        }
    }
    public function verifyToken () {
        $key = Services::getSecretKey();
        $token = $this->request->getPost("token");
        if($this->validateToken($token) == false){
            return $this->respond(['message' => 'Token Invalido'], 401);
        } else {
            $data = JWT::decode($token, $key, array('HS256'));
            return $this->respond(['data' => $data], 200);
        }
        
    }
}