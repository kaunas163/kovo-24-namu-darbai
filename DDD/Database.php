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

//        if ($result = )
//        {
            return $conn->query($sql);
//        }



//        $result = $conn->query($sql);
//        $books = $result->fetch_all();
//
//        foreach ($books as $book)
//        {
//            $book->setAuthor = $book["autoriai"];
//        }
    }
};