<?php

class Database
{
    private $pdo;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // INSERT
    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        echo $columns;
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        echo $placeholders;
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    //  UPDATE
    public function update($table, $data, $where) {
        // name = ?
        // email = ?
        // active = ?
        // for the SET clause
        $setClause = implode(", ", array_map(function($key) {
            return "$key = ?";
        }, array_keys($data)));
    
        // id = ?
        // for the WHERE clause
        $whereClause = implode(" AND ", array_map(function($key) {
            return "$key = ?";
        }, array_keys($where)));
    
        $sql = "UPDATE $table SET $setClause WHERE $whereClause";
        $stmt = $this->pdo->prepare($sql);
    
        // merge values for SET and WHERE clauses
        $params = array_merge(array_values($data), array_values($where));
    
        // execute the query with the parameters
        return $stmt->execute($params);
    }
    
}
