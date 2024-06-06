<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;

class AkunController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function adminDataAkun()
    {
        View::set('admin/melihat-data-akun');
    }
    public function adminVerifikasiAkun()
    {
        View::set('admin/verify-akun');
    }
    public function adminDataPengguna()
    {
        View::set('admin/melihat-akun-member');
    }
    public function adminDataChef()
    {
        View::set('admin/melihat-akun-chef');
    }
    public function adminVerifikasiPengguna()
    {
        View::set('admin/verify-akun-member');
    }
    public function adminVerifikasiChef()
    {
        View::set('admin/verify-akun-chef');
    }
}

?>