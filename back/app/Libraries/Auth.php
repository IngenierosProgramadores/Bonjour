<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;

class Auth extends ResourceController
{
    public static function getUserId (string $email, string $password) {
        echo "Entramos";
        try {
            $db->query("SELECT id, name, password FROM users WHERE email = ".$email.";");
            $user = $query->getRow();
            var_dump($user);
            if (!empty($user)) {
                if (password_verify($password,$user->password)) {
                    $user->password_token = null;
                    // if ($user->) {

                    // }
                }
            }
        } catch (\Exception $e) {
            //throw $th;
        }
    }

}