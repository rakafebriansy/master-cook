<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\User;

class LoginController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function login()
    {
        $muser = new User();
        $user = $muser->find($_POST['username'],'username');
        if($user && $user['password'] == $_POST['password']) {
            $_SESSION['id'] = $user['id'];
            // if(isset($_POST['rememberme'])) {
            //     setcookie('rememberme','tamu',time() + 86400);
            // }
            View::redirectTo($this->baseurl . $user['role'] . '-dashboard');
        }
        View::redirectTo($this->baseurl . 'admin-login');
    }
}

?>