<?php
$host = "localhost";
$user = "root";
$pass = "";  // leave blank unless you set a password
$db = "grading_portal";
$port = 3307; // custom MySQL port

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>


