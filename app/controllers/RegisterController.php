<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\User;

class RegisterController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function adminRegister()
    {
        $muser = new User();
        if($muser->create([
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'no_telp' => $_POST['telp'],
            'password' => $_POST['password'],
            'role' => 'admin',
            'status' => 1
        ])) {
            View::redirectTo($this->baseurl . 'login');
        }
        View::redirectTo($this->baseurl . 'admin-register');
    }
    public function penggunaRegister()
    {
        $muser = new User();
        if($muser->create([
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'no_telp' => $_POST['telp'],
            'password' => $_POST['password'],
            'role' => 'pengguna',
            'status' => 0
        ])) {
            View::redirectTo($this->baseurl . 'login');
        }
        View::redirectTo($this->baseurl . 'pengguna-register');
    }
    public function chefRegister()
    {
        $muser = new User();
        if($muser->create([
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'no_telp' => $_POST['telp'],
            'password' => $_POST['password'],
            'role' => 'chef',
            'status' => 0
        ])) {
            View::redirectTo($this->baseurl . 'login');
        }
        View::redirectTo($this->baseurl . 'chef-register');
    }
}

?>