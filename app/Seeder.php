<?php

namespace App;
use App\Database;

class Seeder
{
    private Database $db;
    public function __construct(Database $db) 
    {
        $this->db = $db;
    }
    public function clear()
    {
        $this->db->executeNonQuery('DELETE FROM pendaftaran_kelas; ALTER TABLE pendaftaran_kelas AUTO_INCREMENT = 1');
        $this->db->executeNonQuery('DELETE FROM kelas_masak; ALTER TABLE kelas_masak AUTO_INCREMENT = 1');
        $this->db->executeNonQuery('DELETE FROM user; ALTER TABLE user AUTO_INCREMENT = 1');
    }
    public function new()
    {
        //USER
        $this->db->create('user',[
            'id' => 1,
            'username' => '@pacar_minggyu',
            'nama' =>  'Elvy Yunia',
            'no_telp' => '085649554149',
            'password' => 'Mas@kY0k!',
            'role' => 'pengguna',
            'status' => 1
        ]);
        $this->db->create('user',[
            'id' => 2,
            'username' => 'pengguna123',
            'nama' =>  'Pengguna',
            'no_telp' => '085649554141',
            'password' => '123',
            'role' => 'pengguna',
            'status' => 1
        ]);
        $this->db->create('user',[
            'id' => 3,
            'username' => 'admin123',
            'nama' =>  'Admin',
            'no_telp' => '085649554142',
            'password' => '123',
            'role' => 'admin',
            'status' => 1
        ]);
        $this->db->create('user',[
            'id' => 4,
            'username' => 'chef123',
            'nama' =>  'Chef',
            'no_telp' => '085649554143',
            'password' => '123',
            'role' => 'chef',
            'status' => 1
        ]);
        $this->db->create('user',[
            'id' => 5,
            'username' => 'jerry',
            'nama' =>  'Jerry Sainfeld',
            'no_telp' => '085619554141',
            'password' => '123',
            'role' => 'pengguna',
            'status' => 1
        ]);
        $this->db->create('user',[
            'id' => 6,
            'username' => 'koha',
            'nama' =>  'Kohaku Sino',
            'no_telp' => '085619554221',
            'password' => '123',
            'role' => 'pengguna',
            'status' => 1
        ]);
        $this->db->create('user',[
            'id' => 7,
            'username' => 'jiro',
            'nama' =>  'Jiro Shirogane',
            'no_telp' => '085655554221',
            'password' => '123',
            'role' => 'pengguna',
            'status' => 1
        ]);
        
        //KELAS_MASAK
        $this->db->create('kelas_masak',[
            'id' => 1,
            'judul' => 'Menu Sehat ala Chef Arnold',
            'ringkasan' => 'Kelas Memasak Sehat dan Praktis adalah solusinya! Yuk join kelas yang mau menjaga pola makan sehat tanpa mengorbankan rasa. Disini kalian akan belajar olahan salad yang penuh banyak varian.',
            'syarat_dan_ketentuan' => '
            1. Pendaftaran: Peserta harus mendaftar dan membayar biaya kelas di muka. Pendaftaran bisa dilakukan secara offline di tempat.
            2. Peserta diharapkan mengenakan pakaian yang nyaman dan sepatu tertutup untuk keamanan. 
            3. Semua peralatan dan bahan memasak akan disediakan. Peserta tidak perlu membawa peralatan pribadi.
            ',
            'poster' => 'card1.png',
            'pukul' => '13:50 - 16:10 WIB',
            'tanggal' => '21 Mei 2024',
            'lokasi' => 'Jember Town Square',
            'harga' => 150000,
            'id_user' => 4
        ]);
        $this->db->create('kelas_masak',[
            'id' => 2,
            'judul' => 'Menu Sehat ala Chef Juna',
            'ringkasan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, voluptatibus.',
            'syarat_dan_ketentuan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam facere sint optio illum. Assumenda distinctio explicabo fugit cupiditate quo laudantium ad saepe corrupti nihil tempora ipsum, natus, soluta consequatur nam.',
            'poster' => 'card2.png',
            'pukul' => '15:50 - 17:10 WIB',
            'tanggal' => '22 Mei 2024',
            'lokasi' => 'Jember Town Square',
            'harga' => 200000,
            'id_user' => 4
        ]);

        //PENDAFTARAN_KELAS
        $this->db->create('pendaftaran_kelas',[
            'id' => 1,
            'id_user' => 1,
            'id_kelas_masak' => 1,
            'tanggal_daftar' => date('Y-m-d H:i:s'),
        ]);
        $this->db->create('pendaftaran_kelas',[
            'id' => 2,
            'id_user' => 2,
            'id_kelas_masak' => 1,
            'tanggal_daftar' => date('Y-m-d H:i:s'),
        ]);
        $this->db->create('pendaftaran_kelas',[
            'id' => 3,
            'id_user' => 3,
            'id_kelas_masak' => 1,
            'tanggal_daftar' => date('Y-m-d H:i:s'),
        ]);
        $this->db->create('pendaftaran_kelas',[
            'id' => 5,
            'id_user' => 5,
            'id_kelas_masak' => 1,
            'tanggal_daftar' => date('Y-m-d H:i:s'),
        ]);
        $this->db->create('pendaftaran_kelas',[
            'id' => 6,
            'id_user' => 6,
            'id_kelas_masak' => 2,
            'tanggal_daftar' => date('Y-m-d H:i:s'),
        ]);
        $this->db->create('pendaftaran_kelas',[
            'id' => 7,
            'id_user' => 7,
            'id_kelas_masak' => 2,
            'tanggal_daftar' => date('Y-m-d H:i:s'),
        ]);
        
    }
    public function fresh()
    {
        try {
            $this->clear();
            $this->new();
            return true;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}

?>