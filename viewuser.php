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
            max-width: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Online Book Shop</h1>
    </header>

    <nav>
        <a href="adminhome.php">Home</a>
        <a href="viewuser.php">view users</a>
        <a href="viewbook.php">view Books</a>
        <a href="add-book.php">Add Book</a>
        <a href="logout.php">Logout</a>
    </nav>
    
    
    <?php
$conn = mysqli_connect('localhost', 'root', '', 'books');
$sql = "SELECT username, email, phone FROM book WHERE usertype = 'user'";
$result = $conn->query($sql);
?>

<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin: 0;
        }
    </style>
</head>

<body>

    <h2>User Information</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Username</th><th>Email</th><th>Phone</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found</p>";
    }
    $conn->close();
    ?>

</body>

</html>
