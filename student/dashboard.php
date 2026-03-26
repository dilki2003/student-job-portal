<?php
if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}
include("../config.php");

if(!isset($_SESSION['student_id']))
{
    header("Location: ../login.php");
}

$student_id = $_SESSION['student_id'];

$sql = "SELECT jobs.title, jobs.location, jobs.salary, applications.status
        FROM applications
        JOIN jobs ON applications.job_id = jobs.id
        WHERE applications.student_id = '$student_id'";

$result = $conn->query($sql);
$pic_sql = "SELECT profile_pic FROM students WHERE id='$student_id'";
$pic_res = $conn->query($pic_sql);
$pic_row = $pic_res->fetch_assoc();
$photo = $pic_row['profile_pic'];

$count_sql = "SELECT COUNT(*) AS total FROM applications WHERE student_id='$student_id'";
$count_result = $conn->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_applied = $count_row['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/style.css">

</head>

<body class="bg-light">

<?php include("../includes/navbar.php"); ?>

<div class="container mt-5" style="max-width:900px;">

<div class="glass-panel">

<div class="text-center mb-3">
    <img src="../uploads/<?php echo $photo; ?>"
         style="width:120px;height:120px;border-radius:50%;object-fit:cover;border:4px solid white;box-shadow:0 4px 15px rgba(0,0,0,0.2);">
</div>

<div class="card mb-4 text-center shadow-sm">
    <div class="card-body">
        <h5 class="text-muted">Total Jobs Applied</h5>
        <h2 class="text-primary"><?php echo $total_applied; ?></h2>
    </div>
</div>

<div class="dashboard-header">
    <h2>Welcome <?php echo $_SESSION['student_name']; ?> 🎓</h2>
    <p class="mb-0">Track your applied part-time jobs</p>
</div>

<?php
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "<div class='card mb-4 job-card'>";
        echo "<div class='card-body'>";

        echo "<h4 class='text-primary'>".$row['title']."</h4>";
        echo "<p class='mb-1'> 🗺️".$row['location']."</p>";
        echo "<p class='mb-1'> 💵Rs ".$row['salary']."</p>";
       // echo "<span class='badge bg-success'>".$row['status']."</span>";
        $status = $row['status'];

        if($status == "Approved"){
            $color = "success";
        }
        elseif($status == "Rejected"){
            $color = "danger";
        }
        else{
            $color = "warning";
        }

        echo "<span class='badge bg-$color'>".$status."</span>";


        echo "</div>";
        echo "</div>";
    }
}
else
{
    echo "<p class='text-center'>No applications yet</p>";
}
?>

<div class="text-center mt-4">
<a href="../job_list.php" class="btn btn-primary">Browse Jobs</a>
</div>

</div>
</div>
<?php include("../includes/footer.php"); ?>
</body>
</html>