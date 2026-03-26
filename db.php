<?php
$conn = new mysqli("localhost", "root", "", "post");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>