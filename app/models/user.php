<?php

namespace App\Models;
use App\Database;

class User
{ 
    private $db;
    private $table = 'user';
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
    public function all($role = null)
    {
        if(isset($role)) {
            $sql = "SELECT * FROM user WHERE role = '$role' AND status = 1;";
            return $this->db->executeNoBind($sql,true);
        }
        return $this->db->readMany($this->table);
    }
    public function findNotVerified($role)
    {
        $sql = "SELECT * FROM user WHERE role = '$role' AND status = 0;";
        return $this->db->executeNoBind($sql,true);
    }
}

?>