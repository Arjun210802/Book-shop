<?php
$conn=mysqli_connect('localhost','root','','books');
session_start();
if (isset($_POST["submit"])) {
    $username = $_POST['u'];
    $password = $_POST['p'];

    $qry = "SELECT usertype FROM book WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $qry);

    if ($res) {
        $rs = mysqli_fetch_assoc($res);

        if ($rs !== null) {
            $da = $rs["usertype"];
            echo $da;
            if ($da == "admin") {
                $_SESSION["ovname"] = $username;
                $ret = "SELECT * FROM book WHERE username='$username'";
                echo $ret;
                $re = mysqli_query($conn, $ret);

                $data = mysqli_fetch_assoc($re);
                $email = $data['email'];
                $name = $data['name'];
                $phone = $data['phone'];
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $name;
                $_SESSION["phone"] = $phone;
                header("Location: userpageadmin.php");
            }
            if ($da == "user") {
                $_SESSION["ovname"] = $username;
                $ret = "SELECT * FROM book WHERE username='$username'";
                echo $ret;
                $re = mysqli_query($conn, $ret);

                $data = mysqli_fetch_assoc($re);
                $email = $data['email'];
                $name = $data['name'];
                $phone = $data['phone'];
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $name;
                $_SESSION["phone"] = $phone;
                header("Location: userpage.php");
            } else {
                echo "<script>alert(\"INVALID USERNAME OR PASSWORD\");</script>";
            }
        } else {
            echo "<script>alert(\"Invalid Username or Password\");</script>";
        }
    } else {
        echo "<script>alert(\"Database Error\");</script>";
    }
}
?>
<html>
<form method="post">
<h1 align="middle">
<img src="logo.png" width=300 height=200><br>
<label>Username </label>
<input type="text" placeholder="Enter Username" name="u" required> <br><br>
<label>Password </label>
<input type="password" placeholder="Enter Password" name="p" required> <br><br>
<input type="submit" name="submit" value="Login">
</h1>
</form>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
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
            margin-bottom: 20px;
        }
    </style>
</html>