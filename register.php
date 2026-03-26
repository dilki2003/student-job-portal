<?php
include("config.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $university = $_POST['university'];
    $password = $_POST['password'];

    $sql = "INSERT INTO students (name,email,university,password)
            VALUES ('$name','$email','$university','$password')";

    if($conn->query($sql) === TRUE)
    {
        echo "<script>alert('Registration Successful');</script>";
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
    <title>Student Register</title>

    <style>
h2{
    text-align: center;
    padding: 0.5em;
    font-size: 1.5em;
    margin-top: 1em;
   


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
<h2>Student Registration</h2>
</fieldset>

<fieldset>
<legend>Name *</legend>
<input type="text" name="name" required>
<br><br>
</fieldset>

<fieldset>
<legend>Email *</legend>
<input type="email" name="email" required>
<br><br>
</fieldset>

<fieldset>
<legend>University *</legend>
<input type="text" name="university" required>
<br><br>
</fieldset>

<fieldset>
<legend>Password *</legend>
<input type="password" name="password" required>
<br><br>
</fieldset>

<button type="submit" name="register">Register</button>

</form>

</body>
</html>