<?php


session_set_cookie_params(0);
session_start();

require ('connect.php');

$query = "SELECT * FROM other_info";

$statement = $db->prepare($query);

$statement->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">

    <title>Welcome to my Blog!</title>
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
    </style>
    <script>
    $(function() {
        $("#ehe").autocomplete({
            source: names
        });
    });
    </script>
</head>

<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <div id="header">
            <h1>
                <a href="index.php">FootBall Scouting Agency</a>
            </h1>
        </div>

        <ul id="menu">
            <li>
                <a href="index.php">Home</a>
            </li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
            <li>
                <a href="create.php">New Post</a>
            </li>
            <?php endif; ?>
            <li>
                <a href="about.php">About</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
        </ul>
        <div class="box">
            <div id="posts">
                <?php while ($row = $statement->fetch()): ?>
                <li class="box">
                    <h1>Player Name: <?= $row['name'] ?></h1>
                    <div id="comment"><?= $row['comment'] ?></div>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <p> <small> <?= $row['date'] ?> </small><a href="edit.php?id=<?= $row['id'] ?>">Edit</a> <a
                            href="delete.php?id=<?= $row['id'] ?>">Delete</a></p>
                    <?php endif; ?>


                    <div id="normal_comment">
                        <h2>Comments</h2>
                        <?php if (!empty($row['normal_comment'])): ?>
                        <p><?= $row['normal_comment'] ?></p>
                        <?php else: ?>
                        <p>No comments yet.</p>
                        <?php endif; ?>
                        <form id="commentForm" method="post" action="comment.php?id=<?= $row['id'] ?>">
                            <textarea name="normal_comment" placeholder="Add a comment..."></textarea>
                            <div id="captchaDiv" style="display: none;">
                                <img src="captcha.php" alt="CAPTCHA">
                                <input type="text" name="captcha" placeholder="Enter CAPTCHA">
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </li>
                <?php endwhile ?>
            </div>
        </div>

        <ul id="menu">
            <li>
                <a href="Login.php">Log In</a>
            </li>
            <li>
                <a href="Register.php">Register</a>
            </li>
        </ul>
    </div>

    <script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var captchaDiv = document.getElementById('captchaDiv');
        if (captchaDiv.style.display === 'none') {
            // Show the CAPTCHA
            captchaDiv.style.display = 'block';
            // Refresh the CAPTCHA image
            captchaDiv.querySelector('img').src = 'captcha.php?' + new Date().getTime();
        } else {
            // Submit the form
            this.submit();
        }
    });
    </script>
</body>

</html>