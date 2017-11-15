<?php
require_once __DIR__ . '/../db/connectionDB.php';

class CreateRequestTable extends connectionDB
{
    public function createTable() // sql to create table
    {
        $sql = "CREATE TABLE requests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
         user_id INT(6) UNSIGNED NOT NULL, 
         vacation_request VARCHAR(30) NOT NULL,
         approved BOOLEAN DEFAULT FALSE,
         FOREIGN KEY (user_id) REFERENCES users(id) )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table requests created successfully ";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }

        $this->conn->close();
    }
}
