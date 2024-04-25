<?php
session_set_cookie_params(0);
session_start(); // Start the session at the beginning of your script

$servername = "localhost";
$username = "ainogomi!";
$password = "ainogomi!";
$dbname = "football";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user_username);

    // Execute the statement
    $stmt->execute();

    // Bind the result to a variable
    $stmt->bind_result($db_password);

    // Fetch the result
    $stmt->fetch();

    // Check if the password matches
    if ($user_password == $db_password) {
        echo "User authenticated successfully.";
        $_SESSION['loggedin'] = true; // Set the session variable
    } else {
        echo "Invalid username or password. Please try again.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">

    <title>Login Page</title>
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
</head>

<body>
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
            <form method="post" action="">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
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
</body>

</html>