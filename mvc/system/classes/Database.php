<?php

// DATABSE CLASS 
class Database
{
    // DB CONNECT VARIABLES DELECRE IN CONFIG.PHP 
    public $host = HOST;
    public  $user = USER;
    public  $password = PASSWORD;
    public  $database = DBNAME;

    public $conn;
    public $result;

    // MAKE CONNECTION
    public function __construct()
    {
        try {
            return $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Databse connection error " . $e->getMessage();
        }
    }

    // QUERY FUNCTION
    public function Query($query, $params = [])
    {
        // WHEN 0 PARAMERTERS
        if (empty($params)) {
            $this->result  = $this->conn->prepare($query);
            return  $this->result->execute();
        } else {
            $this->result  = $this->conn->prepare($query);
            return  $this->result->execute($params);
        }
    }

    // CHECK ROWS OF TABLE
    public function rowCount()
    {
        return  $this->result->rowCount();
    }

    // GET ALL DATA
    public function getAllData()
    {
        return  $this->result->fetchAll(PDO::FETCH_OBJ);
    }

    // GET SINGLE DATA
    public function getSingleData()
    {
        return  $this->result->fetch(PDO::FETCH_OBJ);
    }
}
