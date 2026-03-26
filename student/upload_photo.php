<?php
session_start();
include("../config.php");

if(!isset($_SESSION['student_id']))
{
    header("Location: ../login.php");
}

if(isset($_POST['upload']))
{
    $file = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    $path = "../uploads/" . $file;

    if(move_uploaded_file($tmp, $path))
    {
        $id = $_SESSION['student_id'];

        $sql = "UPDATE students SET profile_pic='$file' WHERE id='$id'";
        $conn->query($sql);

        echo "<script>alert('Photo Uploaded Successfully');</script>";
    }
    else
    {
        echo "Upload Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Profile Photo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/style.css">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:500px;">

<div class="glass-panel text-center">

<h3 class="mb-4">Upload Profile Photo 📷</h3>

<form method="post" enctype="multipart/form-data">

<input type="file" name="photo" class="form-control mb-3" required>

<button name="upload" class="btn btn-primary">Upload Photo</button>

</form>

<br>
<a href="dashboard.php" class="btn btn-dark">Back to Dashboard</a>

</div>
</div>
<?php include("../includes/footer.php"); ?>
</body>
</html>