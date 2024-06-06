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
    public function adminLogin()
    {
        $muser = new User();
        $user = $muser->find($_POST['username'],'username');
        if($user && $user['role'] == 'admin' && $user['password'] == $_POST['password']) {
            $_SESSION['id'] = $user['id'];
            // if(isset($_POST['rememberme'])) {
            //     setcookie('rememberme','tamu',time() + 86400);
            // }
            View::redirectTo($this->baseurl . 'admin-dashboard');
        }
        View::redirectTo($this->baseurl . 'admin-login');
    }
    public function chefLogin()
    {
        $muser = new User();
        $user = $muser->find($_POST['username'],'username');
        if($user && $user['role'] == 'chef' && $user['password'] == $_POST['password']) {
            $_SESSION['id'] = $user['id'];
            // if(isset($_POST['rememberme'])) {
            //     setcookie('rememberme','tamu',time() + 86400);
            // }
            View::redirectTo($this->baseurl . 'chef-dashboard');
        }
        View::redirectTo($this->baseurl . 'chef-login');
    }
    public function penggunaLogin()
    {
        $muser = new User();
        $user = $muser->find($_POST['username'],'username');
        if($user && $user['role'] == 'pengguna' && $user['password'] == $_POST['password']) {
            $_SESSION['id'] = $user['id'];
            // if(isset($_POST['rememberme'])) {
            //     setcookie('rememberme','tamu',time() + 86400);
            // }
            View::redirectTo($this->baseurl . 'pengguna-dashboard');
        }
        View::redirectTo($this->baseurl . 'pengguna-login');
    }
    
}

?>