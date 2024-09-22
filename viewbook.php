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
    <br>
    <br>
    <br><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .book-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .book-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
            transition: transform 0.3s ease-in-out;
        }

        .book-card:hover {
            transform: scale(1.05);
        }

        .book-image {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="book-container">
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'books');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

                <div class="book-card">
                <img class="book-image" src="<?php echo $row['cover']; ?>" alt="Book Cover">
                    <h2><?php echo $row['title']; ?></h2>
                    <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
                    <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                    <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                    <p><strong>price:</strong> <?php echo $row['price']; ?></p>
                  
                </div>

                <?php
            }
        } else {
            echo "No books found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
