<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\KelasMasak;
use App\Seeder;

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
        $mkelas_masak = new KelasMasak();
        $kelas_masaks = $mkelas_masak->all();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('landing',[
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
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
    public function fresh()
    {
        $seeder = new Seeder($this->db);
        if($seeder->fresh()) {
            echo 'FRESH';exit;
            }
        echo 'NOT FRESH';exit;

    }
}

?>