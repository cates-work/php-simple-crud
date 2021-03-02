<?php
class Database
{
    public function __construct()
    {
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "php_crud";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $this->conn = $conn;
    }
}
?>