<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\User;

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
        $muser = new User();
        $users = $muser->all('pengguna');
        View::set('admin/melihat-akun-member',['users' => $users]);
    }
    public function adminDataChef()
    {
        $muser = new User();
        $users = $muser->all('chef');
        View::set('admin/melihat-akun-member',['users' => $users]);
    }
    public function adminVerifikasiPengguna()
    {
        $muser = new User();
        $users = $muser->findNotVerified('pengguna');
        View::set('admin/verify-akun-member',['users' => $users]);
    }
    public function adminVerifikasiChef()
    {
        $muser = new User();
        $users = $muser->findNotVerified('chef');
        View::set('admin/verify-akun-chef',['users' => $users]);
    }
    public function adminHapusChefFromVerifikasi()
    {
        $muser = new User();
        if($muser->delete($_POST['id_chef'])) {
            View::redirectTo($this->baseurl . 'admin-verifikasi-chef');
            }
        View::redirectTo($this->baseurl . 'admin-verifikasi-chef');
    }
    public function adminHapusPenggunaFromVerifikasi()
    {
        $muser = new User();
        if($muser->delete($_POST['id_pengguna'])) {
            View::redirectTo($this->baseurl . 'admin-verifikasi-pengguna');
            }
        View::redirectTo($this->baseurl . 'admin-verifikasi-pengguna');
    }
    public function adminDoVerifikasiPengguna()
    {
        $muser = new User();
        if($muser->update([
            'status' => 1
        ],$_POST['id_pengguna'])) {
            View::redirectTo($this->baseurl . 'admin-verifikasi-pengguna');
            }
        View::redirectTo($this->baseurl . 'admin-verifikasi-pengguna');
    }
    public function adminDoVerifikasiChef()
    {
        $muser = new User();
        if($muser->update([
            'status' => 1
        ],$_POST['id_chef'])) {
            View::redirectTo($this->baseurl . 'admin-verifikasi-chef');
            }
        View::redirectTo($this->baseurl . 'admin-verifikasi-chef');
    }
}

?>