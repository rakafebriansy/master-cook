<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\KelasMasak;

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
        $mkelas_masak = new KelasMasak();
        $kelas_masaks = $mkelas_masak->all();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('admin/dashboard-admin', [
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
    }
    public function chefDashboard()
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masaks = $mkelas_masak->all();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('chef/dashboard-chef',[
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
    }
    public function penggunaDashboard()
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masaks = $mkelas_masak->all();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('pengguna/cooking-class',[
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
    }
}

?>