<?php

class MyDatabase
{
    public function DoQuery($sql)
    {
        $servername = "localhost";
        $username = "root";
        $password = "123";
        $database = "DB_ND";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

//        if ($result = $conn->query($sql))
//        {
//            return $result->fetch_assoc();
//        }

        return $conn->query($sql);
    }
};