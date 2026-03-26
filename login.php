<?php
session_start();
include("config.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students 
            WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['name'];

        header("Location: student/dashboard.php");
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
<style>
h2{
    text-align: center;
    padding: 0.5em;
    font-size: 1.5em;

}
   * {
box-sizing: border-box;
padding: 0;
margin: 0;
font-size: 11px;
}
body {
height: 100vh;
display: flex;
align-items: center;
justify-content: center;
font-family: sans-serif;
color: #fff;
text-shadow: 0 1px 2px #000;
background-color: #333;
}
form {
box-shadow: 0 0 10px #000;
padding: 30px 20px 35px 20px;
border-radius: 10px;
display: flex;
flex-direction: column;
gap: 2rem;
}
input {
padding: 0.5em 1em;
border: 0;
background-color: transparent;
color: #fff;
font-size: 1.2em;
width: 220px;
}
input:focus {
outline: 0;
}
fieldset {
padding: 0;
border: 2px solid #fff;
border-radius: 4px;
}
fieldset:focus-within {
border-color: #b02727;
}
legend {
margin-left: 0.75em;
padding-inline: 0.5em;
font-size: 1.25em;
}
button {
padding: 0.75em 1em;
border: 0;
background-color: #0e0d0d;
color: #fff;
font-size: 1.25em;
border-radius: 4px;
cursor: pointer;
}
 </style>


</head>

<body>

<form method="post">
<fieldset>
<h2>Student Login</h2>
</fieldset>

<fieldset>
<legend>Email *</legend>
<input type="email" name="email" required>
<br><br>
</fieldset>

<fieldset>
<legend>Password *</legend>
<input type="password" name="password" required>
<br><br>
</fieldset>

<button type="submit" name="login">Login</button>

</form>


</body>
</html>