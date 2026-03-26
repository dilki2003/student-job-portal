<?php
session_start();
include("config.php");

if(!isset($_SESSION['student_id']))
{
    header("Location: login.php");
}

$job_id = $_GET['job_id'];
$student_id = $_SESSION['student_id'];

$sql = "INSERT INTO applications (student_id, job_id, status)
        VALUES ('$student_id', '$job_id', 'Pending')";

if($conn->query($sql) === TRUE)
{
    echo "<script>alert('Applied Successfully');</script>";
    echo "<a href='job_list.php'>Back to Jobs</a>";
}
else
{
    echo "Error: " . $conn->error;
}
?>