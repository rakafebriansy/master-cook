<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;

class KelasController
{
    private $baseurl = '/master-cook/'; 

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function chefKelasMemasak()
    {
        View::set('chef/kelas-memasak-aja');
    }
    public function penggunaKelasMemasak()
    {
        View::set('chef/kelas-memasak-aja');
    }

}

?>