<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\User;
class ProfilController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function adminProfil()
    {
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('admin/profil-admin',['user' => $user]);
    }
    public function adminEditProfil()
    {
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('admin/ubah-profil-admin',['user' => $user]);
    }
    public function adminDoEditProfil()
    {
        $muser = new User();
        if($muser->update([
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'no_telp' => $_POST['telp'],
            'password' => $_POST['password'],
        ],$_SESSION['id'])) {
            View::redirectTo($this->baseurl . 'admin-profil');
        }
        View::redirectTo($this->baseurl . 'admin-edit-profil');
    }
    public function chefProfil()
    {
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('chef/profil-chef',['user' => $user]);
    }
    public function chefEditProfil()
    {
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('chef/ubah-profil-chef',['user' => $user]);
    }
    public function chefDoEditProfil()
    {
        $muser = new User();
        if($muser->update([
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'no_telp' => $_POST['telp'],
            'password' => $_POST['password'],
        ],$_SESSION['id'])) {
            View::redirectTo($this->baseurl . 'chef-profil');
        }
        View::redirectTo($this->baseurl . 'chef-edit-profil');
    }
    public function penggunaProfil()
    {
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('pengguna/profil-pengguna',['user' => $user]);
    }
    public function penggunaEditProfil()
    {
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('pengguna/ubah-profil-pengguna',['user' => $user]);
    }
    public function penggunaDoEditProfil()
    {
        $muser = new User();
        if($muser->update([
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'no_telp' => $_POST['telp'],
            'password' => $_POST['password'],
        ],$_SESSION['id'])) {
            View::redirectTo($this->baseurl . 'pengguna-profil');
        }
        View::redirectTo($this->baseurl . 'pengguna-edit-profil');
    }
}

?>