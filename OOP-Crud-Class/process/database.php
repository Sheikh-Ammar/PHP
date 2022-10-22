<?php
class Database
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "blog";

    private $conn = false;
    public $mysqli = "";
    public $result = array();

    // CONNECT
    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->server, $this->user, $this->password, $this->db_name);
            $this->conn = true;

            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
            }
        }
    }

    // INSERT
    public function insert($table, $parameter = array())
    {
        if ($this->checkTable($table)) {
            $columns = implode(', ', array_keys($parameter));
            $values = implode("', '", $parameter);
            echo  $insertQuery = "INSERT INTO $table($columns)
                            VALUES('$values')";
            if ($this->mysqli->query($insertQuery)) {
                array_push($this->result, $this->mysqli->insert_id);
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        }
    }

    // UPDATE
    public function update($table, $parameter = array(), $where = null)
    {
        if ($this->checkTable($table)) {
            $arguments = array();
            foreach ($parameter as $key => $value) {
                $arguments[] = "$key = '$value'";
            }
            $updateQuery = "UPDATE $table SET " . implode(', ', $arguments);
            if ($where != null) {
                $updateQuery .= " WHERE $where";
            }
            if ($this->mysqli->query($updateQuery)) {
                array_push($this->result, $this->mysqli->affected_rows);
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        }
    }

    // DELETE
    public function delete($table, $where = null)
    {
        if ($this->checkTable($table)) {
            $deleteQuery = "DELETE FROM $table";
            if ($where != null) {
                $deleteQuery .= " WHERE $where";
            }
            if ($this->mysqli->query($deleteQuery)) {
                array_push($this->result, $this->mysqli->affected_rows);
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        }
    }

    // SELECT
    public function select($sql)
    {
        $getAll = $this->mysqli->query($sql);
        if ($getAll) {
            array_push($this->result, $getAll->fetch_all(MYSQLI_ASSOC));
        } else {
            array_push($this->result, $this->mysqli->error);
        }
    }


    // CHECK THAT TABLE EXISTS OR NOT
    private function checkTable($table)
    {
        $findTable = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tbaleInDb = $this->mysqli->query($findTable);
        if ($tbaleInDb && $tbaleInDb->num_rows == 1) {
            return true;
        } else {
            array_push($this->result, $table . " does not exists in this database.");
            return false;
        }
    }

    // SHOW RESULT
    public function getResult()
    {
        $resultStatement = $this->result;
        $this->result = array();
        return $resultStatement;
    }

    // DISCONNECT
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
            }
        }
    }
}
