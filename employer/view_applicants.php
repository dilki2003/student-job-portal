<?php
session_start();

if(!isset($_SESSION['employer_id']))
{
    header("Location: ../employer_login.php");
}

include("../config.php");

$sql = "SELECT applications.id AS app_id,
        students.name, students.email,
        jobs.title, applications.status
        FROM applications
        JOIN students ON applications.student_id = students.id
        JOIN jobs ON applications.job_id = jobs.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Applicants</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">Job Applicants</h2>

<table class="table table-bordered bg-white text-center">

<tr>
<th>Student Name</th>
<th>Email</th>
<th>Job Title</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="update_status.php?id=<?php echo $row['app_id']; ?>&status=Approved"
   class="btn btn-success btn-sm">Approve</a>

<a href="update_status.php?id=<?php echo $row['app_id']; ?>&status=Rejected"
   class="btn btn-danger btn-sm">Reject</a>
</td>
</tr>
<?php
    }
}
else
{
?>
<tr>
<td colspan="5">No Applications Yet</td>
</tr>
<?php
}
?>

</table>

</div>
<?php include("../includes/footer.php"); ?>
</body>
</html>