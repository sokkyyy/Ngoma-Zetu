<?php

$db_host = "localhost";
$db_name = "ngomazetutrial";
$db_user = "root";
$db_pass = "moremoney88";


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

