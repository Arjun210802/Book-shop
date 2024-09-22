<?php
$conn=mysqli_connect('localhost','root','','books');
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<form method="POST">
    <h3 align=middle>
    <img src="logo.png" width=300 height=200><br>

    <div class="fi">
    <label>Enter your Name </label>
    <input type="text" name="name" placeholder="Name" required><br><br>
    <label>Enter your Username </label>
    <input type="text" name="username"placeholder="UserName" required> <br><br>
    <label> Enter your Email id </label>
    <input type="email" placeholder="xyz@gmail.com" name="email" required> <br><br>
    <label>Enter your Phone number  </label> 
    <input type="tel" placeholder="Phone number" name="phone" required> <br><br>
    <label>Password </label> 
    <input type="password" placeholder="Enter Password" name="password" required> <br><br>
    <input type="submit" name="submit" value="Register">
    </h3>
</div>
</form>
<style>


body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h3 {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 6px; /* Adjust this value to reduce the vertical spacing */
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px; /* Adjust this value to reduce the vertical spacing */
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

img {
    display: block;
    margin: 0 auto;
    margin-bottom: -10px; /* Adjust this value to move the image up */
}

/* Optional: Add some spacing around the form */
body {
    padding: 20px;
}


/* Optional: Add some spacing around the form */
body {
    padding: 20px;
}

    </style>
</html>
<?php
if (isset($_REQUEST["submit"]))
 {

    $Name = $_REQUEST["name"];

    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    // echo $email;

    $phone = $_REQUEST["phone"];
    // echo $phone;

    $password = $_REQUEST["password"];
    $a = "insert into book(name,username,email,phone,password,usertype) values('$Name','$username','$email','$phone','$password','user')";

    mysqli_query($conn, $a);
    echo "<script>alert('Registration Completed Successfully')</script>";
}
?>