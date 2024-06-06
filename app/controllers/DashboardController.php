<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;

class DashboardController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function adminDashboard()
    {
        View::set('admin/dashboard-admin');
    }
    public function chefDashboard()
    {
        View::set('chef/dashboard-chef');
    }
    public function penggunaDashboard()
    {
        View::set('pengguna/cooking-class');
    }
}

?>