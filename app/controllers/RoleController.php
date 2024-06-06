<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;

class RoleController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function index()
    {
        View::set('landing');
    }
    public function role()
    {
        View::set('role');
    }
    public function adminRegister()
    {
        if(isset($_COOKIE['rememberme']) && str_contains($_COOKIE['rememberme'],'user-admin')) {
            View::redirectTo($this->baseurl . 'admin-login');
        }
        View::set('admin/register');
    }
    public function chefRegister()
    {
        if(isset($_COOKIE['rememberme']) && str_contains($_COOKIE['rememberme'],'user-chef')) {
            View::redirectTo($this->baseurl . 'chef-login');
        }
        View::set('chef/register');
    }
    public function penggunaRegister()
    {
        if(isset($_COOKIE['rememberme']) && str_contains($_COOKIE['rememberme'],'user-pengguna')) {
            View::redirectTo($this->baseurl . 'pengguna-login');
        }
        View::set('pengguna/register');
    }
    public function login()
    {
        if(isset($_COOKIE['rememberme']) && str_contains($_COOKIE['rememberme'],'id')) {
            View::redirectTo($this->baseurl . 'login');
        }
        View::set('login');
    }
    public function logout()
    {
        session_destroy();
        View::redirectTo($this->baseurl);
    }
}

?>