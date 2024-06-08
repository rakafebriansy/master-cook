<?php

namespace App\Controllers;
use App\Core\View;
use App\Database;
use App\Models\KelasMasak;
use App\Models\PendaftaranKelas;
use App\Models\User;

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
    public function chefLihatKelas($id)
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masak = $mkelas_masak->find($id);
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        $pendaftars = $this->db->executeNoBind('SELECT * FROM user JOIN pendaftaran_kelas ON user.id = pendaftaran_kelas.id_user WHERE pendaftaran_kelas.id_kelas_masak =' . $id,true);
        View::set('chef/lihat-kelas-chef',[
            'kelas_masak' => $kelas_masak,
            'user' => $user,
            'pendaftars' => $pendaftars,
        ]);
    }
    public function chefLihatPendaftar($id)
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masak = $mkelas_masak->find($id);
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('chef/lihat-kelas-chef-summary',[
            'kelas_masak' => $kelas_masak,
            'user' => $user
        ]);
    }
    public function chefEditKelas($id)
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masak = $mkelas_masak->find($id);
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('chef/ubah-kelas-chef',[
            'kelas_masak' => $kelas_masak,
            'user' => $user
        ]);
    }
    public function chefDoEditKelas()
    {
        $mkelas_masak = new KelasMasak();
        if($mkelas_masak->update([
            'ringkasan' => $_POST['ringkasan'],
            'syarat_dan_ketentuan' => $_POST['syarat_dan_ketentuan'],
            'pukul' => $_POST['pukul'],
            'tanggal' => $_POST['tanggal'],
            'lokasi' => $_POST['lokasi'],
            'harga' => $_POST['harga'],
        ],$_POST['id_kelas_masak']))
        {
            View::redirectTo($this->baseurl . 'chef-lihat-kelas/' . $_POST['id_kelas_masak']);
        }
        View::redirectTo($this->baseurl . 'chef-edit-kelas/' . $_POST['id_kelas_masak']);
    }
    
    public function penggunaKelasMemasak()
    {
        $id = $_SESSION['id'];
        $sql = <<<SQL
            SELECT kelas_masak.id AS id_kelas_masak, kelas_masak.judul, kelas_masak.ringkasan, kelas_masak.syarat_dan_ketentuan, kelas_masak.pukul, kelas_masak.tanggal, kelas_masak.lokasi, kelas_masak.harga, kelas_masak.poster, pendaftaran_kelas.id, pendaftaran_kelas.id_user FROM kelas_masak LEFT OUTER 
            JOIN pendaftaran_kelas ON (kelas_masak.id = pendaftaran_kelas.id_kelas_masak)
            WHERE pendaftaran_kelas.id_user IS NULL OR pendaftaran_kelas.id_user = 6;    
        SQL;
        $kelas_masaks = $this->db->executeNoBind($sql,true);
        $mkelas_masak = new KelasMasak();
        $chart_kelas_masak= $mkelas_masak->getChart();
        View::set('pengguna/cooking-class',[
            'kelas_masaks' => $kelas_masaks,
            'chart_kelas_masak' => json_encode($chart_kelas_masak)
        ]);
    }
    public function penggunaDaftar($id)
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masak = $mkelas_masak->find($id);
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('pengguna/daftar-kelas',[
            'kelas_masak' => $kelas_masak,
            'user' => $user
        ]);
    }
    public function penggunaDoDaftar()
    {
        $mpendaftaran_kelas = new PendaftaranKelas();
        if($mpendaftaran_kelas->create([
            'id_user' => $_SESSION['id'],
            'id_kelas_masak' => $_POST['id_kelas_masak'],
            'tanggal_daftar' => date('Y-m-d H:i:s'),
            'alamat' => $_POST['alamat'],
            'motivasi' => $_POST['motivasi']
        ])) {
            View::redirectTo($this->baseurl . 'pengguna-dashboard');
        }
        View::redirectTo($this->baseurl . 'pengguna-daftar/' . $_POST['id_kelas_masak']);
    }
    public function penggunaLihatKelas($id)
    {
        $mkelas_masak = new KelasMasak();
        $kelas_masak = $mkelas_masak->find($id);
        $muser = new User();
        $user = $muser->find($_SESSION['id']);
        View::set('pengguna/info-udah-daftar',[
            'kelas_masak' => $kelas_masak,
            'user' => $user
        ]);
    }
}

?>