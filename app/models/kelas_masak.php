<?php

namespace App\Models;
use App\Database;

class KelasMasak
{ 
    private $db;
    private $table = 'kelas_masak';
    public function __construct() {
        $this->db = new Database();
    }
    public function create($requests)
    {
        return $this->db->create($this->table,$requests);
    }
    public function update($requests, $id)
    {
        return $this->db->update($this->table,$requests,$id);
    }
    public function delete($id)
    {
        return $this->db->delete($this->table,$id);
    }
    public function find($value,$column = 'id')
    {
        return $this->db->readOne($this->table,[$column,'=',$value]);
    }
    public function all()
    {
        return $this->db->readMany($this->table);
    }
    public function getChart()
    {
        $sql = "SELECT COUNT(u.id) AS jumlah, km.judul FROM pendaftaran_kelas pk JOIN user u ON (u.id = pk.id_user) JOIN kelas_masak km ON (km.id = pk.id_kelas_masak) GROUP BY pk.id_kelas_masak ORDER BY jumlah DESC LIMIT 5;";
        $jumlah = $this->db->executeNoBind($sql,true);
        return $jumlah;
    }
}

?>