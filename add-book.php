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
    </nav><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Add a New Book</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        Title:
        <input type="text" name="title" required><br>
        Author:
        <input type="text" name="author" required><br>
        Description:
        <textarea name="description" rows="4" required></textarea><br>
        Category:
        <input type="text" name="category" required><br>
        Price:
        <input type="text" name="price" required><br>
        Cover Image:
        <input type="file" name="cover" accept="image/*" required><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'books');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    // Process file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cover"]["name"]);
    move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);

    $sql = "INSERT INTO books (title, author, description, category, cover, price) VALUES ('$title', '$author', '$description', '$category', '$target_file', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
