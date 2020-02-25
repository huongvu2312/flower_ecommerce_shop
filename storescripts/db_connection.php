<?php

$servername = "localhost";
$username = "root";
$password = "vthblumen";
$db = "vthblumen";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

mysqli_set_charset( $conn, 'utf8mb4');

?> 