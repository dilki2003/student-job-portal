<?php
session_start();
include("../config.php");

if(!isset($_SESSION['employer_id']))
{
    header("Location: ../employer_login.php");
}

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE applications SET status='$status' WHERE id='$id'";
$conn->query($sql);

header("Location: view_applicants.php");
?>
<?php include("../includes/footer.php"); ?>