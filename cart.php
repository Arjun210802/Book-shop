<html>
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
        <a href="userhome.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="logout.php">Logout</a>
    </nav>

</body>
</html>
<!DOCTYPE html>
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

        input[type="submit"]:hover {
            background-color: #45a049;
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleFormSubmission($conn);
            // Redirect to the same page to avoid form resubmission on refresh
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }

        function handleFormSubmission($conn) {
            if (isset($_POST['remove_from_cart'])) {
                $book_id = $_POST['book_id'];
        
                $quer = "DELETE FROM cart WHERE id = $book_id";
                if ($conn->query($quer) === TRUE) {
                    echo "<script>alert('Book removed from Cart.')</script>";
                } else {
                    echo "Error: " . $quer . "<br>" . $conn->error;
                }
            }
        }
        
        

        $ql = "SELECT * FROM cart";
        $res = $conn->query($ql);

        if ($res !== false && $res->num_rows > 0) {
            while ($ro = $res->fetch_assoc()) {
                $bid = $ro['id'];
                $sql = "SELECT * FROM books WHERE id = $bid";
                $result = $conn->query($sql);

                if ($result === null) {
                    // handle query error
                } else {
                    $row = $result->fetch_assoc();
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="book-card">
                            <img class="book-image" src="<?php echo $row['cover']; ?>" alt="Book Cover">
                            <h2><?php echo $row['title']; ?></h2>
                            <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
                            <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                            <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                            <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
                            <p><input type="submit" name="remove_from_cart" value="Remove from Cart"></p>
                            <input type="hidden" name="book_id" value="<?php echo $row['id']; ?>">
                        </div>
                    </form>

                    <?php
                }
            }
        } else {
            echo "<img src='cart.png'>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
