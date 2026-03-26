<?php
session_start();
include("../config.php");

// Check if student is logged in
if(!isset($_SESSION['student_id'])){
    header("Location: ../login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch applied jobs
/*$sql = "SELECT applications.status, applications.applied_at, jobs.title, jobs.company_name, jobs.location, jobs.salary 
        FROM applications
        JOIN jobs ON applications.job_id = jobs.id
        WHERE applications.student_id = '$student_id'
        ORDER BY applications.applied_at DESC";*/

$sql = "SELECT applications.*, jobs.title, jobs.location, jobs.salary, employers.company_name
        FROM applications
        JOIN jobs ON applications.job_id = jobs.id
        JOIN employers ON jobs.employer_id = employers.id
        WHERE applications.student_id = '$student_id'";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Applied Jobs</title>
</head>
<body>

<h1>My Applied Jobs</h1>
<a href="dashboard.php">Back to Dashboard</a> | 
<a href="jobs.php">View All Jobs</a> | 
<a href="logout.php">Logout</a>
<hr>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<h3>".$row['title']."</h3>";
        echo "<p><strong>Company:</strong> ".$row['company_name']."</p>";
        echo "<p><strong>Location:</strong> ".$row['location']."</p>";
        echo "<p><strong>Salary:</strong> ".$row['salary']."</p>";
        echo "<p><strong>Status:</strong> ".$row['status']."</p>";
        echo "<p><strong>Applied On:</strong> ".$row['applied_at']."</p>";
        echo "<hr>";
    }
} else {
    echo "<p>You have not applied for any jobs yet.</p>";
}
?>
<?php include("../includes/footer.php"); ?>

</body>
</html>