<?php
include("config.php");

if(isset($_POST['register']))
{
    $company = $_POST['company'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO employers (company_name, email, password)
            VALUES ('$company', '$email', '$password')";

    if($conn->query($sql))
    {
        echo "<script>alert('Employer Registered Successfully');</script>";
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
<title>Employer Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:500px;">

<h2 class="text-center mb-4">Employer Registration 🏢</h2>

<form method="post">

<input type="text" name="company" class="form-control mb-3" placeholder="Company Name" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button name="register" class="btn btn-success w-100">Register</button>

</form>

<br>
<a href="employer_login.php">Already have account? Login</a>

</div>
<?php include("../includes/footer.php"); ?>
</body>
</html>