<?php

class MyDatabase
{
    public function ConnectToDatabase()
    {
        $servername = "localhost";
        $username = "root";
        $password = "123";
        $database = "DB_ND";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function DoQuery($sql)
    {
        $conn = $this->ConnectToDatabase();
        return $conn->query($sql);
    }
};