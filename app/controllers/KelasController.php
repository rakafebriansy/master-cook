<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\KelasMasak;

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
        $mkelas_masak = new KelasMasak();
        $kelas_masaks = $mkelas_masak->all();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('chef/kelas-memasak-aja',[
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
    }

}

?>