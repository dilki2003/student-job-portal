<?php
$servername = "localhost";
$username = "root";
$password = "Cdn2003$"; // if your MySQL root has a password, put it here
$dbname = "student_job_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>