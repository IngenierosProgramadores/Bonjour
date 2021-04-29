<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;

class Auth extends ResourceController
{
    public function permisos() {  
        if (isset($_SERVER['HTTP_ORIGIN'])){
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
            header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
            header('Access-Control-Allow-Credentials: true');  
             
        }  
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
              header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
              header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
          exit(0);
        }
    }
    public static function getUserId (string $email, string $password) {
        $db = \Config\Database::connect();
        try {
            $query= $db->query("SELECT id, name, password FROM users WHERE email = '".$email."'");
            $user = $query->getRow();
            if (!empty($user)) {
                if (password_verify($password,$user->password)) {
                    $user->password_token = null;

                    return intval($user->id);
                } else {
                   
                }
            } else {
               
            }
        } catch (\Exception $e) {
            //throw $th;
        }
        return -1;
    }

    public static function getUserData ($config) {
        $headers = getallheaders();
        if(!isset($headers["Authorization"]) || empty($headers["Authorization"])) {
            return null;
        }
        $secretKey = base64_decode($config);
        $jwt = explode(" ", $headers["Authorization"]);
        $decoded_token = JWT::decode($jwt[1], $secretKey, array('HS512'));
        return isset($decoded_token->data) ? $decoded_token->data : null;
    }
	public static function createToken(string $serverName, array $data, string $jwtKey): string
	{
        $tokenId = base64_encode(random_bytes(32));
        $issuedAt = time();
        $notBefore = $issuedAt;         // Adding 10 seconds
        $expire = $notBefore + (60 * 60 * 5); // + 5 horas

        /*
         * Create the token as an array
         */
        $rawData = [
            'iat' => $issuedAt,         // Issued at: time when the token was generated
            'jti' => $tokenId,          // Json Token Id: an unique identifier for the token
            'iss' => $serverName,       // Issuer
            'nbf' => $notBefore,        // Not before
            'exp' => $expire,           // Expire
            'data' => $data             // Data related to the signer user
        ];

        $secretKey = base64_decode($jwtKey);

        $jwt = JWT::encode(
            $rawData,      // Data to be encoded in the JWT
            $secretKey,     // The signing key
            'HS512'         // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
        );

        return $jwt;
		// $email = $this->request->getPost('email');
		// $password = $this->request->getPost('password');
		
		// // add code to fetch through db and check they are valid
		// // sending no email and password also works here because both are empty
		// if ($email  === "edgar@ant.com.mx" && $password === "ingepro123") {
        //     $time = time();
		// 	$key = Services::getSecretKey();
		// 	$payload = [
        //         'iat' => $time,
        //         'exp' => $time + 60, // Hora de expiracion en segundos
        //         'data' => ['email' => 'admin@admin.com', 'name'=>'Peter'],
		// 		// 'aud' => 'http://example.com',
		// 		// 'iat' => 1356999524,
		// 		// 'nbf' => 1357000000,
		// 	];

		// 	$jwt = JWT::encode($payload, $key);
		// 	return $this->respond(['token' => $jwt], 200);
		// }

		// return $this->respond(['message' => 'Invalid login details'], 401);
	}

}