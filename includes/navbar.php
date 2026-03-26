<?php

if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>
<?php
include(__DIR__ . "/../config.php");

$nav_photo = "";

if(isset($_SESSION['student_id']))
{
    $sid = $_SESSION['student_id'];

    $sql = "SELECT profile_pic FROM students WHERE id='$sid'";
    $res = $conn->query($sql);

    if($res && $res->num_rows > 0)
    {
        $row = $res->fetch_assoc();
        $nav_photo = $row['profile_pic'];
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="/student-job-portal/">🎓 JobPortal</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">

      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link" href="/student-job-portal/job_list.php">Jobs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/student-job-portal/student/dashboard.php">Dashboard</a>
        </li>

      </ul>

      <!--<span class="navbar-text text-white me-3"> -->
        <div class="d-flex align-items-center text-white me-3">

        <?php if(isset($nav_photo) && $nav_photo != "") { ?>
        <img src="/student-job-portal/uploads/<?php echo $nav_photo; ?>"
            style="width:40px;height:40px;border-radius:50%;object-fit:cover;margin-right:10px;">
        <?php } ?>
        
        <span class="me-3">
        Welcome <?php echo $_SESSION['student_name'] ?? ""; ?>
        </span>

        </div>
        <?php 
        if(isset($_SESSION['student_name']))
        {
            echo "Welcome " . $_SESSION['student_name'];
        }
        ?>
      </span>

      <a href="/student-job-portal/student/logout.php" class="btn btn-danger">
        Logout
      </a>

    </div>
  </div>
</nav>