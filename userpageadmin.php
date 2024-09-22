<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
        }

        a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            font-weight: bold;
        }

        a:hover {
            background-color: #4caf50;
            color: #fff;
        }

        #login-link {
            margin-right: 20px;
        }

        #logout-link {
            margin-left: 20px;
        }
    </style>
</head>
<body>

    <a href="adminhome.php" id="login-link" target="_blank">Login</a>
    <img src="logo.png" width="500" height="550">
    <a href="logout.php" id="logout-link" target="_blank">Logout</a>

</body>
</html>
