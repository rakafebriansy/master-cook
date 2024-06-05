<?php

namespace App;

class Database
{
    private string $driver = 'mysql';
    private string $host = 'localhost';
    private string $dbname = 'master_cook';
    private string $name = 'root';
    private string $password = '';
    protected \PDO|null $connection = null;

    private function connect(): void
    {
        try {
            $connection = new \PDO($this->driver . ':'.'host=' . $this->host .';dbname=' . $this->dbname, $this->name, $this->password);
            $this->connection = $connection;
        } catch (\PDOException $e) {
            throw $e;   
        }
    }
    private function close(): void
    {
        $this->connection = null;
    }
    public function executeQuery(string $sql, array $data = [], bool $fetch_all = false): array|bool
    {
        $this->connect();
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        if($fetch_all) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        $this->close();
        return $result;
    }
    public function executeNonQuery(string $sql, array $data = [], $get_id = false): bool|int
    {
        $this->connect();
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        if($get_id) {
            $result = intval($this->connection->lastInsertId());
        } else {
            $result = $statement->rowCount();
        }
        $this->close();
        return $result;
    }
    public function executeNoBind(string $sql, bool $fetch_all = false): array|bool
    {
        $this->connect();
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->query($sql);
        if($fetch_all) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        $this->close();
        return $result;
    }
    public function create(string $table, array $data, $get_id = false): bool|int
    {
        try {
            $columns_str = [];
            $bind_str = [];
            foreach ($data as $column => $value) {
                $columns_str[] = $column;
                $bind_str[] = ":$column";
            }
            $columns_str = implode(', ',$columns_str);
            $bind_str = implode(', ',$bind_str);
            $sql = "INSERT INTO $table ($columns_str) VALUES ($bind_str);";
            $result = $this->executeNonQuery($sql,$data,$get_id);
            return $result;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function update(string $table, array $data, int $id): bool
    {
        try {
            $query = [];
            foreach ($data as $column => $value) {
                $query[] = "$column = :$column";
            }
            $query_str = implode(', ',$query);
            $sql = "UPDATE $table SET ". $query_str ." WHERE id = :id;";
            $data['id'] = $id;
            $result = $this->executeNonQuery($sql,$data);
            return $result;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function delete(string $table, int $id): bool
    {
        try {
            $sql = "DELETE FROM $table WHERE id = :id";
            $data = ['id' => $id];
            $result = $this->executeNonQuery($sql,$data);
            return $result;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function readOne(string $table, array $condition = [], string $columns = '*'): array|false
    {
        try {
            $sql = "SELECT ". $columns ." FROM $table WHERE ". $condition[0] . " " . $condition[1] . " :" . $condition[0] ." ;";
            $data = [$condition[0] => $condition[2]];
            $result = $this->executeQuery($sql,$data);
            return $result?? null;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function readMany(string $table, array $condition = [], string $columns = '*'): array|null
    {
        try {
            $condition_str = count($condition) > 0 ? implode(' ',$condition) : '1 = 1';
            $sql = "SELECT ". $columns ." FROM $table WHERE $condition_str;";
            $result = $this->executeQuery($sql,fetch_all:true);
            return $result?? null;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}

?>