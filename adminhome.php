<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Shop</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #4caf50;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: #333;
        }

        h2 {
            margin-top: 20px;
        }

        img {
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Online Book Shop</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="viewuser.php">view users</a>
        <a href="viewbook.php">view Books</a>
        <a href="add-book.php">Add Book</a>
        <a href="logout.php">Logout</a>
    </nav>

    <?php
        session_start();
        $n = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    ?>

    <h2>Welcome Admin!!...<br></h2>
    <img src="jett-valorant.gif" width="1280" height="720">

</body>
</html>
