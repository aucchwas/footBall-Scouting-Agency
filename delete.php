<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['confirm'])) {
        $query = "DELETE FROM other_info WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        header("Location: index.php"); // redirect to index page after deletion
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Delete Post</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        #wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 10px;
            width: 40%;
            border: 2px solid #fff;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
        }

        #menu {
            display: flex;
            justify-content: space-around;
            padding: 10px;
            margin-top: 40px;
            width: 100%;
            list-style-type: none;
            background-color: #444;
            color: #fff;
            border-radius: 10px;
        }

        #menu li a {
            color: #fff;
        }

        #menu li a:hover {
            color: #bbb;
        }

        .box {
            flex: 1 1 auto;
            margin: 10px;
            padding: 20px;
            border: 1px solid #fff;
            border-radius: 10px;
            background-color: #444;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:visited {
            color: #bbb;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form input,
        form textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            background-color: #555;
            color: #fff;
        }

        form button {
            padding: 10px;
            border: none;
            background-color: #fff;
            color: #333;
            cursor: pointer;
        }

        form button:hover {
            background-color: #bbb;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>
                <a href="index.php">My blog</a>
            </h1>
        </div>

        <ul id="menu">
            <li>
                <a href="index.php" class="active">Home</a>
            </li>
            <li>
                <a href="create.php">New Post</a>
            </li>
            <li>
                <a href="about.php">About</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
        </ul>
        <form method="post" class="box">
            <h1>Are you sure you want to delete this post?</h1>
            <input type="submit" name="confirm" value="Yes">
            <a href="index.php">No, go back</a>
        </form>
    </div>
</body>

</html>