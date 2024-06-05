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
}

?>