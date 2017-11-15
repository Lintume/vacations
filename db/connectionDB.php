<?php

class connectionDB
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "test";
    public $conn;

    function __construct()
    {
// Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
// Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close()
    {
        mysqli_close($this->conn);
    }
}