<?php
session_start();

if(!isset($_SESSION['employer_id']))
{
    header("Location: ../employer_login.php");
}
?>
<?php
include("../config.php");

if(isset($_POST['postjob']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO jobs (title,description,location,salary,employer_id)
            VALUES ('$title','$description','$location','$salary',1)";

    if($conn->query($sql) === TRUE)
    {
        echo "<script>alert('Job Posted Successfully');</script>";
    }
    else
    {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Job</title>
</head>

<body>

<h2>Post a Job</h2>

<form method="post">

Job Title <br>
<input type="text" name="title" required>
<br><br>

Description <br>
<textarea name="description" required></textarea>
<br><br>

Location <br>
<input type="text" name="location" required>
<br><br>

Salary <br>
<input type="text" name="salary" required>
<br><br>

<button type="submit" name="postjob">Post Job</button>

</form>
<?php include("../includes/footer.php"); ?>
</body>
</html>