<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;

class LoginController
{
    private $baseurl = '/stay-ease/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function setLogin()
    {
        if(isset($_COOKIE['rememberme']) && str_contains($_COOKIE['rememberme'],'tamu')) {
            View::redirectTo($this->baseurl . 'tamu-beranda');
        }
        View::set('pages/tamu-login');
    }
}

?>