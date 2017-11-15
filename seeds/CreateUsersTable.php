<?php
require_once  __DIR__.'/db/connectionDB.php';
class CreateUsersTable extends connectionDB
{
    public function createTable() // sql to create table
    {
        $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(30) NOT NULL,
        vacation_limit INT(6) NOT NULL
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table users created successfully ";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }

        $this->conn->close();
    }
}