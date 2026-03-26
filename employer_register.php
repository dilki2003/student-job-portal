<?php
include("config.php");

if(isset($_POST['register']))
{
    $company = $_POST['company'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO employers (company_name,email,password)
            VALUES ('$company','$email','$password')";

    if($conn->query($sql))
        echo "Employer Registered";
    else
        echo "Error";
}
?>

<form method="post">
<input type="text" name="company" placeholder="Company Name" required><br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>

<button name="register">Register</button>
</form>