<?php
/**
 * Created by PhpStorm.
 * User: ieva
 * Date: 16.4.5
 * Time: 18.06
 */

$servername = "localhost";
$username = "root";
$password = "123";
$database = "DB_ND";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}