<?php

/*******w******** 
    
    Name:Arnob Das Ucchwas
    Date: 03/03/2024
    Description: This is the edit page of the blog post. It allows the user to edit the name and comment of the blog post.

****************/

require ('connect.php');


$query = "SELECT * FROM other_info WHERE id = :id LIMIT 1";
$statement = $db->prepare($query);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch();

if ($_POST && isset($_POST['name']) && isset($_POST['comment']) && isset($_POST['id'])) {



    //Filter and sanitize the input from the form
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    echo $name;
    echo "";
    echo $comment;
    echo "";
    echo $id;

    //Prepare an SQL query to update the blog post with the given ID
    $query = "UPDATE other_info SET name = :name, comment = :comment WHERE id = :id";
    $statement = $db->prepare($query);

    //Bind the form values to the SQL query parameters
    $statement->bindValue(':name', $name);
    $statement->bindValue(':comment', $comment);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    //Execute the SQL query
    $statement->execute();


    // Redirect the user back to the index page for the blog post
    header("Location: index.php? id={$id}");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" comment="IE=edge">
    <meta name="viewport" comment="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
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
    <!-- Remember that alternative syntax is good and html inside php is bad -->
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
        <?php if ($id): ?>
            <form method="post" class="box">

                <input type="hidden" name="id" value=" <?= $row['id'] ?> ">

                <label for="name"></label>
                <input id="name" placeholder="name" name="name" value=" <?= $row['name'] ?> ">

                <label for="comment"></label>
                <input id="comment" name="comment" placeholder="comment" value=" <?= $row['comment'] ?> ">

                <input type="submit">
            </form>
        <?php endif ?>
    </div>
</body>

</html>