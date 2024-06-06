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
        View::set('role');
    }
    public function adminRegister()
    {
        View::set('admin/register');
    }
    public function chefRegister()
    {
        View::set('chef/register');
    }
    public function penggunaRegister()
    {
        View::set('pengguna/register');
    }
}

?>