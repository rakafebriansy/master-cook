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
        ])) {
            View::redirectWith($this->baseurl . 'admin-login', 'Registrasi berhasil');
        }
        View::redirectWith($this->baseurl . 'admin-register', 'Registrasi gagal',true);
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
        ])) {
            View::redirectWith($this->baseurl . 'pengguna-login', 'Registrasi berhasil');
        }
        View::redirectWith($this->baseurl . 'pengguna-register', 'Registrasi gagal',true);
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
        ])) {
            View::redirectWith($this->baseurl . 'chef-login', 'Registrasi berhasil');
        }
        View::redirectWith($this->baseurl . 'chef-register', 'Registrasi gagal',true);
    }
}

?>