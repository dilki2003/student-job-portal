<?php
session_start();
include("config.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employers
            WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $_SESSION['employer_id'] = $row['id'];
        $_SESSION['company'] = $row['company_name'];

        header("Location: employer/dashboard.php");
    }
    else
    {
        echo "Invalid Login";
    }
}
?>

<form method="post">
<input type="email" name="email" placeholder="Email"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>

<button name="login">Login</button>
</form>