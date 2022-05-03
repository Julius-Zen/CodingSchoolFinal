<?php

class Database
{
    private $server;
    private $dbUsername;
    private $dbPassword;
    private $dbName;
    private $connection;

    function __construct()
    {
        $this->server = "localhost";
        $this->dbUsername = "root";
        $this->dbPassword = "";
        $this->dbName = "final";

        $this->connect();
    }

    private function connect() {
        $this->connection = mysqli_connect($this->server, $this->dbUsername, $this->dbPassword, $this->dbName);
    }

    public function query($sql = "") {
        return mysqli_query($this->connection, $sql);
    }

    public function fetch($result) {
        return mysqli_fetch_assoc($result);
    }

    public function queryFetch($sql = "") {
        return $this->fetch($this->query($sql));
    }

    public function insertId() {
        return mysqli_insert_id($this->connection);
    }

    public function escapeData($data = []) {
        if (!is_array($data)) { 
            return $data;  
        }

        foreach ($data as $key => $value) {
            $data[$key] = mysqli_real_escape_string($this->connection, $value);
        }

        return $data;
    }
}
