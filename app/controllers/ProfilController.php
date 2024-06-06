<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
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
        View::set('admin/profil-admin');
    }
    public function adminEditProfil()
    {
        View::set('admin/ubah-profil-admin');
    }
    public function chefProfil()
    {
        View::set('chef/profil-chef');
    }
    public function chefEditProfil()
    {
        View::set('chef/ubah-profil-chef');
    }
    public function penggunaProfil()
    {
        View::set('pengguna/profil-pengguna');
    }
    public function penggunaEditProfil()
    {
        View::set('pengguna/ubah-profil-pengguna');
    }
}

?>