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
        $mkelas_masak = new KelasMasak();
        $kelas_masaks = $mkelas_masak->all();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('chef/kelas-memasak-aja',[
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
    }
    public function chefBuatKelas()
    {
        View::set('chef/buat-kelas-chef');
    }
    public function chefDoBuatKelas()
    {
        $file = $_FILES['poster'];

        $nama_baru = uniqid();
        $nama_gambar = stripslashes(htmlspecialchars($file['name']));
        $ekstensi_gambar = explode('.',$nama_gambar);
        move_uploaded_file($file['tmp_name'],'image/kelas/'.$nama_baru.$ekstensi_gambar);

        $mkelas_masak = new KelasMasak();
        
        if($mkelas_masak->create([
            'judul' => $_POST['judul'],
            'ringkasan' => $_POST['ringkasan'],
            'syarat_dan_ketentuan' => $_POST['syarat_dan_ketentuan'],
            'pukul' => $_POST['pukul'],
            'tanggal' => $_POST['tanggal'],
            'lokasi' => $_POST['lokasi'],
            'harga' => $_POST['harga'],
            'poster' => $nama_baru,
            'id_user' => $_SESSION['id']
        ])) {
            View::redirectTo($this->baseurl . 'chef-dashboard');
        }
        View::redirectTo($this->baseurl . 'chef-buat-kelas');
        ;
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