<?php
session_start();

if(!isset($_SESSION['employer_id']))
{
    header("Location: ../employer_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Employer Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!--<div class="container mt-5 text-center">-->

<div class="container mt-5 dashboard-box">

<h1>Welcome <?php echo $_SESSION['company']; ?> 🏢</h1>

<div class="mt-4">

<a href="post_job.php" class="btn btn-primary m-2">Post New Job</a>

<a href="view_applicants.php" class="btn btn-success m-2">View Applicants</a>

<a href="../index.php" class="btn btn-dark m-2">Home</a>

<a href="logout.php" class="btn btn-danger m-2">Logout</a>

</div>

</div>

</body>
</html>