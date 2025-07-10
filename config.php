<?php
$host = 'localhost';
$user = 'root';
$pass = 'Khushahal@123';
$dbname = 'mom_foundation'; // Replace with your actual database name

$mysqli = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}
?>
